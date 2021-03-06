<?php
namespace App\Services\Responsable;

class InscripcionService
{

    protected $inscripcionModel;
    protected $alumnoModel;

    function __construct()
    {
        $this->inscripcionModel = new \App\Models\Responsable\CalificacionModel();
        $this->alumnoModel = new \App\Models\AlumnoModel();
    }

    /**
     * Obtiene las inscripciónes por estatus de la BD
     * @return object
     */
    public function getInscripcionesPorEstatus($estatus)
	{   
       return $this->inscripcionModel->getInscripcionesPorEstatus($estatus);
    }
    
    /**
     * Esta función obtiene inscripciones filtradas por actividad
     * 
     * @param int $id_actividad
     * @param bool $estatus
     * @return string
     */
    public function getInscripcionesPorActividadYEstatus($id_actividad, $estatus)
    {
        
        // El id_actividad 0 significa que se selecciono "TODAS LAS ACTIVIDADES"
        if($id_actividad == 0)
        {
            // Se obtienen las inscripciones
            $inscripciones = $this->inscripcionModel->getInscripcionesPorEstatus($estatus);
        }
        else
        {
            // Se obtienen las inscripciones
            $inscripciones = $this->inscripcionModel->getInscripcionesPorActividadYEstatus($id_actividad, $estatus);
        }
        
        // Se unen las inscripciones con los datos del alumno obtenidos de la BD "alumnos"
        $inscripciones_aux = $this->unirRegistros($inscripciones);

        // Se crea el html de respuesta
        $inscripciones_html = '';
        
        foreach ($inscripciones_aux as $key => $inscripcion)
        {

            $inscripciones_html .= '<tr>' .
                                        '<th scope="row">' . ($key + 1) . '</th>' .
                                        '<td>' . $inscripcion->num_control . '</td>' .
                                        '<td style="width:30%;">' . $inscripcion->nombre . " " . $inscripcion->ap_paterno . " " . $inscripcion->ap_materno . '</td>' .
                                        '<td>' . $inscripcion->carrera . '</td>' .
                                        '<td>' . $inscripcion->semestre . '</td>' .
                                        '<td>' . $inscripcion->descripcion_periodo . '</td>' .
                                        '<td>' . $inscripcion->nombre_actividad . '</td>' .
                                        '<td>' . $inscripcion->telefono . '</td>' .
                                        '<td>' . $inscripcion->fecha_inscripcion . '</td>' .
                                        '<td style="width:15%;">' .
                                            '<div class="d-flex flex-column">' .
                                                '<!--  Editar inscripción -->' .
                                                '<a class="btn btn-warning btn-sm btn-block mb-1" href="' . base_url("division/inscripciones/editar/" . $inscripcion->id_inscripcion) . '"><i class="fas fa-pen"></i> Editar</a>' .
                                                '<!-- Eliminar inscripción -->' .
                                                '<form action="' . base_url('division/inscripciones/cambiar-estatus') . '" method="POST">' .
                                                    '<input type="hidden" name="id_inscripcion" value="' . $inscripcion->id_inscripcion . '">' .
                                                    '<button type="submit" class="btn btn-danger btn-sm btn-block btnEnviarFormulario" data-no_control="' . $inscripcion->num_control . '" ><i class="fas fa-trash"></i> Eliminar</button>' .
                                                '</form>' .
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
                return ["exito" => true, "msj" => "Datos actualizados con exito."];
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

    public function cambiarEstatus($id_inscripcion)
    {
        $inscripcion = $this->inscripcionModel->getInscripcionPorId($id_inscripcion);

        $nuevo_estatus = ($inscripcion->estatus == true) ? false : true;
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
}