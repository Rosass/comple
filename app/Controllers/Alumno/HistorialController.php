<?php namespace App\Controllers\Alumno;
use App\Controllers\BaseController;

class HistorialController extends BaseController
{
    protected $HistorialService;
    protected $tipoActividadService;
    protected $responsableService;
   
    
	
    
    
    function __construct()
    {      
        $this->HistorialService =  new \App\Services\Alumno\HistorialService();	
        $this->tipoActividadService =  new \App\Services\Division\TipoActividadService();
		$this->responsableService =  new \App\Services\Division\ResponsableService();
       
	}

    public function index()
	{  
        if($alumno = $this->session->usuario_logueado->num_control)
        {
            $actividades = $this->HistorialService->getActividadesPorCalificacion($alumno); 
            $tipos_actividades = $this->tipoActividadService->getTiposPorEstatus(true);
			$responsables = $this->responsableService->getResponsablesPorEstatus(true);

            echo view('Includes/header');
            echo view('Alumno/navbar', ["activo" => "Historial"]);
            echo view('Alumno/Historial/listar', [				
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