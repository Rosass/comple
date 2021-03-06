<?php
namespace App\Services\Division;

class InscripcionService
{

    protected $inscripcionModel;
    protected $alumnoModel;

    function __construct()
    {
        $this->inscripcionModel = new \App\Models\Division\InscripcionModel();
        $this->alumnoModel = new \App\Models\AlumnoModel();
    }

    /**
     * Obtiene las inscripciónes por estatus de la BD
     * @return object
     */
    public function getInscripciones()
	{   
    return $this->inscripcionModel->getInscripciones();
    }

    public function get_alumno($no_control)
	{   
        $alumno =  $this->inscripcionModel->get_alumno($no_control);
        
        if (!empty($alumno))
        {
            return ["alumno" => $alumno, "encontrado" => true];
        }
        else
        {
            return ["msj" => "Alumno no encontrado", "encontrado" => false];
        }
    }

    public function getPeriodo()
	{   
        return $this->inscripcionModel->getPeriodo();
    }

    public function getActividadPorIdareaPeriodo($perido)
	{   
        return $this->inscripcionModel->getActividadPorIdareaPeriodo($perido);
    }
    
    
    /**
     * Esta función obtiene inscripciones filtradas por actividad
     * 
     * @param int $id_actividad
     * @param bool $estatus
     * @return string
     */
    public function getInscripcionesPorActividadYEstatus($id_actividad)
    {
        
        // El id_actividad 0 significa que se selecciono "TODAS LAS ACTIVIDADES"
        if($id_actividad == 0)
        {
            // Se obtienen las inscripciones
            $inscripciones = $this->inscripcionModel->getInscripciones();
        }
        else
        {
            // Se obtienen las inscripciones
            $inscripciones = $this->inscripcionModel->getInscripcionesPorActividadYEstatus($id_actividad);
        }
        
        // Se unen las inscripciones con los datos del alumno obtenidos de la BD "alumnos"
        $inscripciones_aux = $this->unirRegistros($inscripciones);

        // Se crea el html de respuesta
        $inscripciones_html = '';
        
        foreach ($inscripciones_aux as $key => $inscripcion)
        {
            if($inscripcion->estatus == 1)
            {
                $estatus= '<span class="bg-warning p-1 rounded small">Solicitada</span>';
            }    
            if($inscripcion->estatus == 2) 
            {
                $estatus= '<span class="bg-success p-1 rounded small">Aceptada</span>';  
            }
            
            if($inscripcion->estatus == 0) 
            {
                $estatus= '<span class="bg-danger p-1 rounded small">Rechazada</span>';
            }
            if($inscripcion->estatus == true) 
            {
                $editar = '<a class="btn btn-warning btn-sm btn-block mb-1" href="' . base_url("division/inscripciones/editar/". $inscripcion->id_inscripcion) . '"><i class="fas fa-pen"></i> Editar</a>';
            }

            $inscripciones_html .= '<tr>' .
                                        '<th scope="row">' . ($key + 1) . '</th>' .
                                        '<td>' . $inscripcion->num_control . '</td>' .
                                        '<td>' . $inscripcion->nombre . " " . $inscripcion->ap_paterno . " " . $inscripcion->ap_materno . '</td>' .
                                        '<td>' . $inscripcion->carrera . '</td>' .
                                        '<td>' . $inscripcion->semestre . '</td>' .
                                        '<td>' . $inscripcion->descripcion_periodo . '</td>' .
                                        '<td>' . $inscripcion->nombre_actividad . '</td>' .
                                        '<td>' . $inscripcion->telefono . '</td>' .
                                        '<td>' . $inscripcion->fecha_inscripcion . '</td>' .
                                        '<td>' . $inscripcion->nota . '</td>' .  
                                        '<td class="text-white">' . $estatus . '</td>' . 
                                        '<td style="width:9%;">' .
                                            '<div class="d-flex flex-column">' .
                                            '<!--  Editar inscripción -->' . $editar .
                                            '<!-- Aceptar inscripción -->' .
                                            '<form action="' . base_url('division/inscripciones/cambiar-estatus-aceptar').'" method="POST">' .
                                                '<input type="hidden" name="id_inscripcion" value="'. $inscripcion->id_inscripcion .'">' .
                                                '<button type="submit" class="btn btn-success btn-sm btn-block mb-1 btnEnviarFormulario" data-no_control="' . $inscripcion->num_control . '" ><i class="fas fa-check"></i> Aceptar</button>' .
                                            '</form>' .
                                            '<!-- Rechazar inscripción -->' .
                                            '<form action="'. base_url('division/inscripciones/cambiar-estatus-rechazar') . '" method="POST">' .
                                                '<input type="hidden" name="id_inscripcion" value="'. $inscripcion->id_inscripcion . '">' .
                                                '<button type="submit" class="btn btn-danger btn-sm btn-block btnEnviarFormulario" data-no_control="' . $inscripcion->num_control . '" ><i class="fas fa-ban"></i> Rechazar</button>' .
                                            '</form>' .
                                            '</div>' .
                                        '</td>' .
                                    '</tr>';
        }
        return $inscripciones_html;
    }

    /**
     * Guarda una nueva inscripción en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        $alumno = $this->alumnoModel->getAlumnoPorNoControl($datos['num_control']);

        if($alumno != NULL)
        {
            $inscripcion = $this->inscripcionModel->getInscripcionPorNoControlPeriodoYActividad($datos['num_control'], $datos['periodo'], $datos['id_actividad']);

            if($inscripcion == NULL)
            {
                if ($this->inscripcionModel->guardar($datos))
                    return ["exito" => true, "msj" => "Inscripción agregada con exito."];
                else
                    return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
            }
            else 
            {
                return ["exito" => false, "msj" => "Ya se encuentra registrada una inscripción con la actividad selecionada!."];
            }
        }
        else
        {
            return ["exito" => false, "msj" => "No se encontro el número de control proporcionado."];
        }

    }

    /**
     * Actualiza los datos de una inscripción en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($id_inscripcion, $datos)
    {
        $inscripcion = $this->inscripcionModel->getInscripcionPorId($id_inscripcion);

        if($inscripcion != NULL)
        {
            
            // Si la actividad sigue siendo la misma (que no se cambió) se elimina de los datos a actualizar
            if ($inscripcion->id_actividad == $datos['id_actividad'])
            {
                unset($datos['id_actividad']);
            }
            else
            {
                $inscripcion_aux = $this->inscripcionModel->getInscripcionPorNoControlPeriodoYActividad($inscripcion->num_control, $datos['periodo'], $datos['id_actividad']);

                if($inscripcion_aux != NULL)
                {   
                    return ["exito" => false, "msj" => "Ya se encuentra registrada una inscripción con la actividad selecionada!."];
                }
            } 

            // Se actualizan los datos
            if ($this->inscripcionModel->actualizar($id_inscripcion, $datos))
            {
                return ["exito" => true, "msj" => "Inscripción actualizada con exito."];
            }
            else
            {
                return ["exito" => false, "msj" => "No se actualizó ningun campo."];
            }
            
        }
        else 
        {
            return ["exito" => false, "msj" => "Id de actividad no válido!."];
        }
    
    }

    public function cambiarEstatusAceptar($id_inscripcion)
    {
        $inscripcion = $this->inscripcionModel->getInscripcionPorId($id_inscripcion);

        $nuevo_estatus = ($inscripcion->estatus == 1) ? 2 : 2;
        $datos = [ 'estatus' => $nuevo_estatus ];
        if ($this->inscripcionModel->actualizar($id_inscripcion, $datos))
            return ["exito" => true, "msj" => "Datos actualizados con exito."];
        else
            return ["exito" => false, "msj" => "No se actualizó ningun campo."]; 
    }

    public function cambiarEstatusRechazar($id_inscripcion)
    {
        $inscripcion = $this->inscripcionModel->getInscripcionPorId($id_inscripcion);

        $nuevo_estatus = ($inscripcion->estatus == 1) ? 3 : 3;
        $datos = [ 'estatus' => $nuevo_estatus ];
        if ($this->inscripcionModel->actualizar($id_inscripcion, $datos))
            return ["exito" => true, "msj" => "Datos actualizados con exito."];
        else
            return ["exito" => false, "msj" => "No se actualizó ningun campo."]; 
    }

    public function getInscripcionPorId($id_inscripcion)
    {
        return $this->inscripcionModel->getInscripcionPorId($id_inscripcion);
    }

    /**
     * Esta función une registros de 2 BD mediante el numero de control del alumno
     * @param $array1
     * @param $array2
     * @return array
     */
    function unirRegistros($inscripciones)
    {
        if(count($inscripciones) > 0)
        {
            for($r = 0; $r < count($inscripciones); $r++)
            {
                $array1 = (array) $this->alumnoModel->getAlumnoPorNoControl($inscripciones[$r]->num_control);
                $array2 = (array) $inscripciones[$r];
                $array_merge[$r] = (object) array_merge($array1, $array2);
            }
            return $array_merge;
        }
        else
        {
            return $inscripciones;
        }
    }

    //* -------------------------------------------------------
//* select de actividades por periodo----en agregar
public function get_actividad_por_periodo( $periodo )
{
    return $this->inscripcionModel->get_actividad_por_periodo( $periodo );
}

  //* -------------------------------------------------------
//* select de actividades por periodo-----en lista
public function get_actividad_por_periodo1( $periodo )
{
    return $this->inscripcionModel->get_actividad_por_periodo1( $periodo );
}

}