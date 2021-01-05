<?php
namespace App\Services\Jefes;

class AsistenciaService
{
    protected $asistenciaModel;
    

    function __construct()
    {
        $this->asistenciaModel = new \App\Models\Responsable\AsistenciaModel();
    }


    
}