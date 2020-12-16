<?php namespace App\Controllers\Jefes;
use App\Controllers\BaseController;

class AlumnoController extends BaseController
{
    protected $alumnoModel;

    function __construct()
    {
        $this->alumnoModel = new \App\Models\Jefes\AlumnoModel();
	}

	public function index()
	{
        $id_actividad = urldecode($this->request->uri->getSegment(3));
        $alumnos = $this->alumnoModel->get_actividad_alumno( $id_actividad );

        echo view('Includes/header');
        echo view('Jefes/navbar', ["activo" => "actividades"]);
        echo view('Jefes/Alumnos/lista', [
            'alumnos' => $alumnos,
            'id_actividad' => $id_actividad
            ]);
        echo view('Includes/footer');
	}

}