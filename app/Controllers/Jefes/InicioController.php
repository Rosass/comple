<?php namespace App\Controllers\Jefes;;
use App\Controllers\BaseController;

class InicioController extends BaseController
{
    protected $inicioService;
	
    
    
    function __construct()
    {      
		$this->inicioService =  new \App\Services\Jefes\InicioService();	
	}

    public function index()
	{  
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
        {
            $actividades = $this->inicioService->getActividadesPorJefe(true); 

            echo view('Includes/header');
            echo view('Jefes/navbar', ["activo" => "Inicio"]);
            echo view('Jefes/listar', [		              	
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