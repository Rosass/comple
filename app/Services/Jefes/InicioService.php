<?php
namespace App\Services\Jefes;

class InicioService
{

    protected $inicioModel;

    function __construct()
    {
        $this->inicioModel = new \App\Models\Jefes\InicioModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividadesPorJefe($responsable)
	{   
       return $this->inicioModel->getActividadesPorJefe($responsable);
    }

}