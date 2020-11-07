<?php
namespace App\Services\Responsable;

class CalificacionService
{
    protected $calificacionModel;
    

    function __construct()
    {
        $this->calificacionModel = new \App\Models\Responsable\CalificacionModel();
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
