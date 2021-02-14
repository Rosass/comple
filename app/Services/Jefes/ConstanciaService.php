<?php namespace App\Services\Jefes;

class ConstanciaService
{

    protected $constanciaModel;

    function __construct()
    {
        $this->constanciaModel = new \App\Models\Jefes\ConstanciaModel();
    }

    
    public function getAlumnoPorNoControl($no_control)
	{   
        $alumno = $this->constanciaModel->getAlumnoPorNoControl($no_control);
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
    public function getActividad($control, $id_actividad)
	{   
    return $this->constanciaModel->getActividad($control, $id_actividad);
    } 

    public function  getArea($id_area)
	{   
    return $this->constanciaModel->getArea($id_area);
    }
} 