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
    public function getAlumnos($num_control)
	{   
       return $this->inicioModel->getAlumnos($num_control);
    }

    
}