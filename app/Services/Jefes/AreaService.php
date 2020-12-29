<?php
namespace App\Services\Jefes;

class AreaService
{

    protected $areaModel;

    function __construct()
    {
        $this->areaModel = new \App\Models\Jefes\AreaModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividadPorIdarea($id_area, $true)
	{   
       return $this->areaModel->getActividadPorIdarea($id_area, $true);
    }
    
}