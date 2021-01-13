<?php namespace App\Controllers\Alumno;
use App\Controllers\BaseController;

class InicioController extends BaseController
{
    protected $inicioService;
    protected $HistorialService;
    protected $tipoActividadService;
    protected $responsableService;
    
	
    
    
    function __construct()
    {      
        $this->HistorialService =  new \App\Services\Alumno\HistorialService();
        $this->inicioService =  new \App\Services\Alumno\ActividadesService();	
        $this->tipoActividadService =  new \App\Services\Division\TipoActividadService();
		$this->responsableService =  new \App\Services\Division\ResponsableService();
	}

    public function index()
	{  

        if($this->session->loginalumno && $this->session->usuario_logueado)
        { 
            
            if($alumno = $this->session->usuario_logueado->num_control)
            {
            $num_control2 = $this->session->usuario_logueado->num_control;
            $actividades = $this->HistorialService->getActividades_no_calificadas($alumno);
            $numeroActividades = $this->HistorialService-> getActividadesCalificacion( $num_control2 ); 
            $act = $this->HistorialService->getActividades($alumno); 
            $alumnos = $this->HistorialService->get_actividad_alumno( $alumno, true); 
            //var_dump($actividades);
            $tipos_actividades = $this->tipoActividadService->getTiposPorEstatus(true);
            $responsables = $this->responsableService->getResponsablesPorEstatus(true);
            
            echo view('Includes/header');
            echo view('Alumno/navbar', ["activo" => "actividades"]);
            echo view('Alumno/Inicio/Actividades', [				
                'actividades' => $actividades,
                'act' => $act,
                'tipos_actividades' => $tipos_actividades,
                "numeroActividades" => $numeroActividades->creditos,
				'responsables' => $responsables				           			
                ]);
            echo view('Includes/footer');
		
            }
            else
            {
                return redirect("/");
            }
        }   
        else
        {
        return redirect("/");
        }
    }
}