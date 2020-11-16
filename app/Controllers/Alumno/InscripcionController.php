<?php namespace App\Controllers\Alumno;
use App\Controllers\BaseController;

class InscripcionController extends BaseController
{
    protected $inscripcionService;
	
    
    
    function __construct()
    {      
        $this->inscripcionService =  new \App\Services\Alumno\InscripcionService();
        $this->periodoService =  new \App\Services\Division\PeriodoService();	
	}

    public function index()
	{  
        if($num_control = $this->session->usuario_logueado->num_control)
        {
            $num_control = $this->inscripcionService->getInscripcionPorAlumno($num_control);
            $actividades = $this->inscripcionService->getActividadesPorAlumno(true);           
            $periodos = $this->periodoService->getPeriodosPorEstatus(true);
           
			

            echo view('Includes/header');
            echo view('Alumno/navbar', ["activo" => "inscripciones"]);
            echo view('Alumno/Inscripciones/listar', [
                'alumnos' => $num_control,				
                'actividades' => $actividades,	
                "periodos" => $periodos		           			
                ]);
            echo view('Includes/footer');
		
        }
       else

       {
         return redirect("/");
       }
    }

    public function guardar()
    {
        $reglas = $this->validation->getRuleGroup('inscripcionesReglas');
        // $n = mb_strtoupper($this->request->getPost("num_control"), 'utf-8');
        // echo $n;
        // return ;

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('alumno/inscripciones')->withInput();
        }
        else
        {   
            $periodo = $this->inscripcionService->periodo_activo();
            $datos = [
                // "num_control" => mb_strtoupper($this->request->getPost("num_control"), 'utf-8'),
                "num_control" => mb_strtoupper($this->session->usuario_logueado->num_control, 'utf-8'),
                "periodo" => 20203,
                "id_actividad" => $this->request->getPost("id_actividad"),
                "telefono" => $this->request->getPost("telefono") 
            ];

            // var_dump($datos);
            // echo '<pre>';
            // var_dump($periodo);
            // echo '</pre>';
            // return;
            $respuesta =  $this->inscripcionService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('alumno/inscripciones');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('alumno/inscripciones')->withInput();;
            }
        }
    }
    
    


    
	

}