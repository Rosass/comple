<?php namespace App\Controllers\Responsable;
use App\Controllers\BaseController;

class CalificacionController extends BaseController
{
    protected $calificacionService;
    protected $inscripcionService;
	protected $alumnoModel;
    //protected $inscripcionModel;
    protected $calificacionModel;

    function __construct()
    {
        $this->calificacionService = new \App\Services\Responsable\CalificacionService();
        //$this->inscripcionModel = new \App\Models\Responsable\CalificacionModel();
       // $this->calificacionModel = new \App\Models\Responsable\CalificacionModel();
        $this->inicioModel = new \App\Models\Responsable\CalificacionModel();
	}

	public function index()
	{
        echo "<h1>Hey</h1>";
        //$insc = $this->inscripcionModel->get_inscripciones();
         $alumno = $this->calificacionModel->getAlumnos();
        echo '<pre>';
        var_dump($alumno);
        echo '</pre>';

        $actividades = $this->inicioService->getActividadesPorResponsable(  ); 

        echo view('Includes/header');
        echo view('Responsable/navbar', ["activo" => "actividades"]);
        echo view('Responsable/Calificacion/listar', [				
            'actividades' => $actividades,				           			
            ]);
        echo view('Includes/footer');
	}
	


	//--------------------------------------------------------------------
	
}