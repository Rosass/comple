<?php namespace App\Controllers\Alumno;
use App\Controllers\BaseController;

class InscripcionController extends BaseController
{
    protected $inscripcionService;
	
    
    
    function __construct()
    {      
		$this->inscripcionService =  new \App\Services\Alumno\InscripcionService();	
	}

    public function index()
	{  
        if($alumno = $this->session->usuario_logueado->num_control)
        {
            $actividades = $this->inscripcionService->getActividadesPorAlumno($alumno);

            echo view('Includes/header');
            echo view('Alumno/navbar', ["activo" => "inscripciones"]);
            echo view('Alumno/Inscripcion/listar', [				
                'actividades' => $actividades,				           			
                ]);
            echo view('Includes/footer');
		
        }
       else

       {
         return redirect("/");
       }
    }


    
	

}