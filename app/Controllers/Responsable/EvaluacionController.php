<?php namespace App\Controllers\Responsable;;
use App\Controllers\BaseController;

class EvaluacionController extends BaseController
{
    protected $inicioService;
	
    
    
    function __construct()
    {      
		$this->evaluacionService =  new \App\Services\Responsable\EvaluacionService();	
	}

    public function index()
	{  
        if($rfc_responsable = $this->session->usuario_logueado->rfc_responsable)
        {
            //$evaluacion = $this->evaluacionService->getEvaluacion_desempenio( ); 

            echo view('Includes/header');
            echo view('Responsable/navbar', ["activo" => "actividades"]);
            echo view('Responsable/Evaluacion/listar', [				
                //'evaluacion' => $evaluacion,				           			
                ]);
            echo view('Includes/footer');
		
        }
       else

       {
         return redirect("/");
       }
    }

	//--------------------------------------------------------------------
    function get_ponderacion( $string )
    {
        switch ($string){
            case 'insuficiente';
                $valor = 0;
                break;
            case 'suficiente';
                $valor = 1;
                break;
            case 'bueno';
                $valor = 2;
                break;
            case 'notable';
                $valor = 3;
                break;
            case 'excelente';
                $valor = 4;
                break;
           
        }
        return $valor;
    }
	 function guardar()
    {
        $ponderacion1 = get_ponderacion( $this->input->post('valorRadio1'));
        $ponderacion2 = get_ponderacion( $this->input->post('valorRadio2'));
        $ponderacion3 = get_ponderacion( $this->input->post('valorRadio3'));
        $ponderacion4 = get_ponderacion( $this->input->post('valorRadio4'));
        $ponderacion5 = get_ponderacion( $this->input->post('valorRadio5'));
        $ponderacion6 = get_ponderacion( $this->input->post('valorRadio6'));
        $ponderacion7 = get_ponderacion( $this->input->post('valorRadio7'));
    }
}