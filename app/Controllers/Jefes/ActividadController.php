<?php namespace App\Controllers\Jefes;
use App\Controllers\BaseController;

class ActividadController extends BaseController
{
    protected $actividadService;
    
    
	
    
    
    function __construct()
    {      
        $this->actividadService =  new \App\Services\Jefes\ActividadService();
      
       	
	} 

    public function index()
	{  
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
        {
            $actividades = $this->actividadService->getActividadesPorId_area(true);
           
 
			

            echo view('Includes/header');
            echo view('Jefes/navbar', ["activo" => "actividades"]);
            echo view('Jefes/Actividades/listar', [				
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