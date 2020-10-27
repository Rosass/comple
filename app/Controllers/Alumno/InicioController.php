<?php namespace App\Controllers\Alumno;
use App\Controllers\BaseController;

class InicioController extends BaseController
{
    protected $inicioService;
	
    
    
    function __construct()
    {      
		$this->inicioService =  new \App\Services\Alumno\ActividadesService();	
	}

    public function index()
	{  
        if($alumno = $this->session->usuario_logueado->num_control)
        {
            $actividades = $this->inicioService->getActividadesPorAlumno( $alumno); 

            echo view('Includes/header');
            echo view('Alumno/navbar', ["activo" => "actividades"]);
            echo view('Alumno/Inicio/Actividades', [				
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