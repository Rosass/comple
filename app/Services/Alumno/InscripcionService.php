<?php
namespace App\Services\Alumno;

class InscripcionService
{

    protected $inscripcionModel;

    function __construct()
    {
        $this->inscripcionModel = new \App\Models\Alumno\InscripcionModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividadesPorAlumno($alumnos)
	{   
       return $this->inscripcionModel->getActividadesPorAlumno($alumnos);
    }

}