<?php namespace App\Services\Escolares;

class GenerarService
{

    protected $generarModel;

    function __construct()
    {
        $this->generarModel = new \App\Models\Escolares\GenerarModel();
    }

    
    public function getAlumnoPorNoControl($no_control)
	{   
        $alumno = $this->generarModel->getAlumnoPorNoControl($no_control);
        // $html = '';

        if (!empty($alumno))
        {
            return ['data' => $alumno];
        }
        else
        {
            return ['error' => "Alumno no encontrado!"];
        }
        
    }
     /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividad($control)
	{   
       return $this->generarModel->getActividad($control);
    }

} 