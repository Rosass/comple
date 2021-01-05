<?php namespace App\Controllers\Jefes;
use App\Controllers\BaseController;

class AlumnoController extends BaseController
{
    protected $alumnoService;
    

    function __construct()
    {
        $this->alumnoService = new \App\Services\Jefes\AlumnoService();
	}

	public function index()
	{
        $id_actividad = urldecode($this->request->uri->getSegment(3));
        $alumnos = $this->alumnoService->get_actividad_alumno( $id_actividad );
        $HM = $this->alumnoService->total_hombres_mujeres( $id_actividad );

        echo view('Includes/header');
        echo view('Jefes/navbar', ["activo" => "actividades"]);
        echo view('Jefes/Alumnos/lista', [
            'alumnos' => $alumnos,
            'id_actividad' => $id_actividad,
            'hombres' => $HM['hombres'],
            'mujeres' => $HM['mujeres'],
            ]);
        echo view('Includes/footer');
	}

}