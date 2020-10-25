<?php
namespace App\Services\Responsable;

class ActividadService
{

    protected $actividadModel;

    function __construct()
    {
        $this->actividadModel = new \App\Models\Responsable\ActividadModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividades()
	{   
       return $this->actividadModel->getActividades();
    }

    /**
     * Obtiene las actividades por estatus de la BD
     * @return object
     */
    public function getActividadesPorNombre($nombre)
	{   
       return $this->actividadModel-> getActividadesPorNombre($nombre);
    }
}