<?php namespace App\Controllers\Responsable;
use App\Controllers\BaseController;

class EvaluacionController extends BaseController
{
    protected $evaluacionService;


    function __construct()
    {
		$this->evaluacionModel   =  new \App\Models\Responsable\EvaluacionModel();
		$this->evaluacionService =  new \App\Services\Responsable\EvaluacionService();
	}
   


    public function index()

	{

        $num_control = urldecode($this->request->uri->getSegment(3));
        $id_inscripcion = urldecode($this->request->uri->getSegment(4));
        $id_actividad = urldecode($this->request->uri->getSegment(5));
        $alumno = $this->evaluacionModel->get_alumno( $num_control );


            echo view('Includes/header');
            echo view('Responsable/navbar', ["activo" => "actividades"]);
            echo view('Responsable/Evaluacion/listar', [
                'alumno' => $alumno,
                'id_inscripcion' => $id_inscripcion,
                'id_actividad' => $id_actividad
                ]);
            echo view('Includes/footer');
    }

/**
 *
 * @param none $name
*/
    public function guardar()
    {
        $reglas = $this->validation->getRuleGroup('evaluacionRules');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $id_inscripcion = $this->request->getPost("id_inscripcion");
        $id_actividad   = $this->request->getPost("id_actividad");

        $radio1 = $this->get_valor_criterio( $this->request->getPost("radio1") );
        $radio2 = $this->get_valor_criterio( $this->request->getPost("radio2") );
        $radio3 = $this->get_valor_criterio( $this->request->getPost("radio3") );
        $radio4 = $this->get_valor_criterio( $this->request->getPost("radio4") );
        $radio5 = $this->get_valor_criterio( $this->request->getPost("radio5") );
        $radio6 = $this->get_valor_criterio( $this->request->getPost("radio6") );
        $radio7 = $this->get_valor_criterio( $this->request->getPost("radio7") );

        $observaciones = $this->request->getPost("observaciones");

        //$nivel = $this->request->getPost("nivel-desempeno");
        
        $promedio = ( $radio1 + $radio2 + $radio3 + $radio4 + $radio5 + $radio6 + $radio7 ) / 7;
        
        //round(0.2234, 2); // devolvería el valor numérico 0.22
        $data = [
            'id_inscripcion' => $id_inscripcion,
            'criterio1'      => $radio1,
            'criterio2'      => $radio2,
            'criterio3'      => $radio3,
            'criterio4'      => $radio4,
            'criterio5'      => $radio5,
            'criterio6'      => $radio6,
            'criterio7'      => $radio7,
            'observaciones'  => $observaciones,
            'valor_numerico' => $promedio,
            //'nivel_desempenio'=>$nivel,
        ];
        $respuesta = $this->evaluacionService->guardar( $data );

        if($respuesta["exito"])
        {
            $this->session->setFlashData("success", $respuesta["msj"]);
            return redirect()->to(base_url("responsables/calificaciones/$id_actividad"));
        }
        else
        {
            $this->session->setFlashData("error", $respuesta["msj"]);
            return redirect()->to(base_url("responsables/calificaciones/$id_actividad"));
        }
    }

    protected function get_valor_criterio( $criterio )
    {
        $valor = 0;
        switch ( $criterio ) {
            case 'insuficiente': $valor = 0;
                break;
            case 'suficiente': $valor = 1;
                break;
            case 'bueno': $valor = 2;
                break;
            case 'notable': $valor = 3;
                break;
            case 'excelente': $valor = 4;
                break;
            default: $valor = 0;
                break;
        }
        return $valor;

	

	//--------------------------------------------------------------------
    }
}