<?php namespace App\Controllers\Responsable;;
use App\Controllers\BaseController;

class EvaluacionController extends BaseController
{
    protected $evaluacionService;
	
    
    
    function __construct()
    {      
		$this->evaluacionService =  new \App\Services\Responsable\EvaluacionService();	
	}

    public function index()
	{  
        $id_inscripcion = urldecode($this->request->uri->getSegment(3));
        $evaluacion_desempenio = $this->evaluacionService->getEvaluacion_desempenioPorId($id_inscripcion); 
        {
           

            echo view('Includes/header');
            echo view('Responsable/navbar', ["activo" => "actividades"]);
            echo view('Responsable/Evaluacion/listar', [				
                'evaluacion_desempenio' => $evaluacion_desempenio,				           			
                ]);
            echo view('Includes/footer');
		
        }
      
    }

	//--------------------------------------------------------------------
  
}