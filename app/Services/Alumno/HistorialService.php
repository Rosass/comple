<?php
namespace App\Services\Alumno;

class HistorialService
{

    protected $HistorialModel;

    function __construct()
    {
        $this->historialModel = new \App\Models\Alumno\HistorialModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividadesPorCalificacion($alumnos)
	{   
       return $this->historialModel->getActividadesPorCalificacion($alumnos);
    }
}