<?php namespace App\Controllers\Alumno;
use App\Controllers\BaseController;

class InicioController extends BaseController
{
    protected $inicioService;
    protected $tipoActividadService;
    protected $responsableService;
    
	
    
    
    function __construct()
    {      
        $this->inicioService =  new \App\Services\Alumno\ActividadesService();	
        $this->tipoActividadService =  new \App\Services\Division\TipoActividadService();
		$this->responsableService =  new \App\Services\Division\ResponsableService();
	}

    public function index()
	{  
        if($alumno = $this->session->usuario_logueado->num_control)
        {
            $actividades = $this->inicioService->getActividadesPorAlumno($alumno); 
            $tipos_actividades = $this->tipoActividadService->getTiposPorEstatus(true);
			$responsables = $this->responsableService->getResponsablesPorEstatus(true);

            echo view('Includes/header');
            echo view('Alumno/navbar', ["activo" => "actividades"]);
            echo view('Alumno/Inicio/Actividades', [				
                'actividades' => $actividades,
                'tipos_actividades' => $tipos_actividades,
				'responsables' => $responsables				           			
                ]);
            echo view('Includes/footer');
		
        }
       else

       {
         return redirect("/");
       }
    }
}