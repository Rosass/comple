<?php
namespace App\Services\Responsable;

class InicioService
{

    protected $inicioModel;

    function __construct()
    {
        $this->inicioModel = new \App\Models\Responsable\InicioModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividadesPorResponsable($responsable)
	{   
       return $this->inicioModel->getActividadesPorResponsable($responsable);
    }

}