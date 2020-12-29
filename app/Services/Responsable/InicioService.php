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
    public function getActividadesPorResponsable($responsable, $true)
	{   
       return $this->inicioModel->getActividadesPorResponsable($responsable, $true);
    }

}