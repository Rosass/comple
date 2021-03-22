<?php
namespace App\Services\Division;

class ActividadService
{

    protected $actividadModel;

    function __construct()
    {
        $this->actividadModel = new \App\Models\Division\ActividadModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividades()
	{   
        return $this->actividadModel->getActividades();
    }

    public function getPeriodo()
	{   
    return $this->actividadModel->getPeriodo();
    }

    public function getActividadPorIdareaPeriodo($perido)
	{   
        return $this->actividadModel->getActividadPorIdareaPeriodo($perido);
    }
    

    /**
     * Obtiene las actividades por estatus de la BD
     * @return object
     */
    public function getActividadesPorEstatus($estatus)
	{   
        return $this->actividadModel->getActividadesPorEstatus($estatus, true);
    }
    public function getTiposPorEstatus($id_area)
	{   
        return $this->actividadModel->getTiposPorEstatus($id_area);
    }
    
    /**
     * Guarda una nueva actividad en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        $actividad = $this->actividadModel->getActividadPorNombre($datos['nombre_actividad'],$datos['periodo']);

        if($actividad == NULL)
        {
            if ($this->actividadModel->guardar($datos))
                return ["exito" => true, "msj" => "Actividad agregada con exito."];
            else
                return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
        }
        else 
        {
            return ["exito" => false, "msj" => "La actividad <strong>" . $datos['nombre_actividad'] . "</strong> ya se encuentra registrada en este periodo!."];
        }
    }

    /**
     * Actualiza los datos de un responsable en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($id_actividad, $datos)
    {
        $actividad = $this->actividadModel->getActividadPorId($id_actividad);

        if($actividad != NULL)
        {
            if ($this->actividadModel->actualizar($id_actividad, $datos))
                return ["exito" => true, "msj" => "Datos actualizados con exito."];
            else
                return ["exito" => false, "msj" => "No se actualizó ningun campo."];
        }
        else 
        {
            return ["exito" => false, "msj" => "Id de actividad no válido!."];
        } 
    }

    public function cambiarEstatus($id_actividad)
    {
        $actividad = $this->actividadModel->getActividadPorId($id_actividad);

        $nuevo_estatus = ($actividad->estatus == true) ? false : true;
        $datos = [ 'estatus' => $nuevo_estatus ];
        return $this->actualizar($actividad->id_actividad, $datos);
    }

    public function getActividadPorId($id_actividad)
    {
        return $this->actividadModel->getActividadPorId($id_actividad);
    }

    public function getAlumnos($num_control)
	{   
        return $this->inicioModel->getAlumnos($num_control);
    }
//*---------------------------------------------
    public function getArea()
	{   
        return $this->actividadModel->getArea();
    }

     //* -------------------------------------------------------
    //* select de area por tipo de actividad
    public function get_tipo_actividad_por_area( $id_area )
    {
        return $this->actividadModel->get_tipo_actividad_por_area( $id_area );
    }

}