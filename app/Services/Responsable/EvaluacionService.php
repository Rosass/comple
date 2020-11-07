<?php
namespace App\Services\Responsable;

class EvaluacionService
{

    protected $evaluacionModel;

    function __construct()
    {
        $this->evaluacionModel = new \App\Models\Responsable\EvaluacionModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function get_ponderacion()
	{   
      // return $this->actividadModel->getActividades();
    }
}