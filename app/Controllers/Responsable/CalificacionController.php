<?php namespace App\Controllers\Responsable;
use App\Controllers\BaseController;

class CalificacionController extends BaseController
{
    protected $calificacionModel;

    function __construct()
    {
        $this->calificacionModel = new \App\Models\Responsable\CalificacionModel();
	}

	public function index()
	{
        $id_actividad = urldecode($this->request->uri->getSegment(3));
        $alumnos = $this->calificacionModel->get_actividad_alumno( $id_actividad );
        



        echo view('Includes/header');
        echo view('Responsable/navbar', ["activo" => "actividades"]);
        echo view('Responsable/Calificaciones/listar', [				
            'alumnos' => $alumnos,				           			
            ]);
        echo view('Includes/footer');
	}
	
}