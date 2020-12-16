<?php
namespace App\Services\Jefes;

class AlumnoService
{
    protected $alumnoModel;
    

    function __construct()
    {
        $this->alumnoModel = new \App\Models\Jefes\AlumnoModel();
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
