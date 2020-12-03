<?php
namespace App\Services\Jefes;

class ActividadService
{

    protected $actividadModel;

    function __construct()
    {
        $this->actividadModel = new \App\Models\Jefes\ActividadModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividadesPorId_area($id_area)
	{   
       return $this->actividadModel->getActividadesPorId_area($id_area);
    }

}