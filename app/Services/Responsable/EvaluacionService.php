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
    public function getEvaluacio_desempenio()
	{   
       return $this->evaluacionModel->getEvaluacio_desempenio();
    }

    /**
     * Obtiene las actividades por estatus de la BD
     * @return object
     */
    public function getEvaluacion_desempenioPorId($id_inscripcion)
	{   
       return $this->evaluacionModel-> getEvaluacion_desempenioPorId($id_inscripcion);
    }
}