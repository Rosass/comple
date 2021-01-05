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
            $rfc_responsable = $this->session->usuario_logueado->rfc_responsable;
            $actividades = $this->inicioService->getActividadesPorResponsable( $rfc_responsable, true );
            $periodo = $this->inicioService->getPeriodo(); 

            echo view('Includes/header');
            echo view('responsable/navbar', ["activo" => "actividades"]);
            echo view('responsable/Actividades/listar', [				
                'actividades' => $actividades,	
                'periodos' => $periodo			           			
                ]);
            echo view('Includes/footer');
		
        }
    else

    {
        return redirect("/");
    }
    
    }

    public function periodo()
	{
		$periodoPost =  $this->request->getPost("periodo");

		// if ( empty($periodoPost)

		if ( empty($periodoPost) || $periodoPost == '0') return redirect('responsables/inicio');

		$rfc_responsable = $this->session->usuario_logueado->rfc_responsable;
		$actividades = $this->inicioService->getActividadPorIdareaPeriodo($rfc_responsable, $periodoPost);
		$periodo = $this->inicioService->getPeriodo();
		
		echo view('Includes/header');
		echo view('responsable/navbar', ["activo" => "actividades"]);
		echo view('responsable/Actividades/listar', [				
			'actividades' => $actividades,
			'responsables' => $rfc_responsable,
			'periodos' => $periodo
		]);
		echo view('Includes/footer');
	}
}