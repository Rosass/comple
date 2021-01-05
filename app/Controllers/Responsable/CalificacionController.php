<?php namespace App\Controllers\Responsable;
use App\Controllers\BaseController;

class CalificacionController extends BaseController
{
    protected $calificacionService;

    function __construct()
    {
        $this->calificacionService = new \App\Services\Responsable\CalificacionService();
	}

	public function index()
	{
        $id_actividad = urldecode($this->request->uri->getSegment(3));
        $alumnos = $this->calificacionService->get_actividad_alumno( $id_actividad );
        $HM = $this->calificacionService->total_hombres_mujeres( $id_actividad );

        echo view('Includes/header');
        echo view('Responsable/navbar', ["activo" => "actividades"]);
        echo view('Responsable/Calificaciones/listar', [
            'alumnos' => $alumnos,
            'id_actividad' => $id_actividad,
            'hombres' => $HM['hombres'],
            'mujeres' => $HM['mujeres'],
            ]);
        echo view('Includes/footer');
	}

}