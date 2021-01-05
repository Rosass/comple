<?php
namespace App\Services\Responsable;

class AsistenciaService
{
    protected $asistenciaModel;
    

    function __construct()
    {
        $this->asistenciaModel = new \App\Models\Responsable\AsistenciaModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function get_actividad_alumno($id_actividad, $true)
	{   
       return $this->asistenciaModel->get_actividad_alumno($id_actividad, $true);
    }

     /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function get_actividad($id_actividad)
	{   
    return $this->asistenciaModel->get_actividad($id_actividad);
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function get_responsable($rfc_responsable)
	{   
    return $this->asistenciaModel->get_responsable($rfc_responsable);
    }

    
}