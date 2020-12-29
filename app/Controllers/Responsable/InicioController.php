<?php namespace App\Controllers\Responsable;;
use App\Controllers\BaseController;

class InicioController extends BaseController
{
    protected $inicioService;
	
    
    
    function __construct()
    {      
		$this->inicioService =  new \App\Services\Responsable\InicioService();	
	}

    public function index()
	{  
        if($rfc_responsable = $this->session->usuario_logueado->rfc_responsable)
        {
            $actividades = $this->inicioService->getActividadesPorResponsable( $rfc_responsable, true ); 

            echo view('Includes/header');
            echo view('Responsable/navbar', ["activo" => "actividades"]);
            echo view('Responsable/Actividades/listar', [				
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