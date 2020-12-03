<?php namespace App\Services\Escolares;

class ActividadService
{

    protected $actividadModel;

    function __construct()
    {
        $this->actividadModel = new \App\Models\Escolares\ActividadModel();
    }

    
    public function getAlumnoPorNoControl($no_control)
	{   
        $alumno = $this->actividadModel->getAlumnoPorNoControl($no_control);
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
    public function actividades_alumno_calificadas($no_control)
	{   
        $actividades = $this->actividadModel->get_actividades_alumno_calificadas($no_control);
        if (!empty($actividades))
        {
            return ['data' => $actividades];
        }
        else
        {
            return ["error" => 'No Hay actividades'];
        }
        
    }

} 