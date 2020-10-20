<?php namespace App\Controllers\Responsable;;
use App\Controllers\BaseController;

class CalificacionController extends BaseController
{
    protected $calificacionService;  
    protected $alumnoModel;
    
        function __construct()
        {
            $this->calificacionService = new \App\Services\Responsable\CalificacionService();
            $this->alumnoModel =  new \App\Models\AlumnoModel();
        }

	public function index()
	{  
       
        {
            $rfc_responsable = $this->calificacionService->getResponsablePorRfc(true);
           // $alumnos = $this->alumnoService->getAlumnosPorNum_control(true);
			
			
		

            echo view('Includes/header');
            echo view('Responsable/navbar',  ["activo" => "actividades"]);
            echo view('Responsable/calificaciones/listar', [				
                'rfc_responsable' => $rfc_responsable,	
                //'alumnos' => $alumnos,			           			
                ]);
            echo view('Includes/footer');
		}
        
    }
}