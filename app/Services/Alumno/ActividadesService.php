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
<<<<<<< HEAD
        return $this->alumnoModel->getActividadesPorAlumno($alumnos);
=======
       return $this->alumnoModel->getActividadesPorAlumno();
>>>>>>> 432087bf7288a049b0e587601b264f1e6545661b
    }


}