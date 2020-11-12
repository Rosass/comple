<?php namespace App\Controllers\Responsable;;
use App\Controllers\BaseController;

class EvaluacionController extends BaseController
{
    protected $evaluacionService;
	
    
    
    function __construct()
    {      
		$this->evaluacionModel =  new \App\Models\Responsable\EvaluacionModel();	
	}
   

    public function index()
	{  
        
        $num_control = urldecode($this->request->uri->getSegment(2));
        $alumnos = $this->evaluacionModel->get_evaluacion_alumno( $num_control );
        echo '<pre>';
        var_dump($num_control);
        echo '</pre>'; 

            echo view('Includes/header');
            echo view('Responsable/navbar', ["activo" => "actividades"]);
            echo view('Responsable/Evaluacion/listar', [				
                'alumnos' => $alumnos,				           			
                ]);
            echo view('Includes/footer');
		
        
      
    }

	//--------------------------------------------------------------------
}
