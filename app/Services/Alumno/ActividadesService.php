<?php
namespace App\Services\Alumno;

class ActividadesService
{

    protected $alumnoModel;

    function __construct()
    {
        $this->alumnoModel = new \App\Models\Alumno\ActividadesModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividadesPorAlumno()
	{   
        return $this->alumnoModel->getActividadesPorAlumno($alumnos);
    }


}