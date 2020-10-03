<?php
namespace App\Services;

class AreaService
{

    protected $areaModel;

    function __construct()
    {
        $this->areaModel = new \App\Models\AreaModel();
    }

    /**
     * Obtiene las áreas de la BD
     * @return object
     */
    public function getAreasPorEstatus($estatus)
	{   
       return $this->areaModel->getAreasPorEstatus($estatus);
    }

}