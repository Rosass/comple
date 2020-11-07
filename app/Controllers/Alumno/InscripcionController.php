<?php namespace App\Controllers\Alumno;
use App\Controllers\BaseController;

class InscripcionController extends BaseController
{
    protected $inscripcionService;
	
    
    
    function __construct()
    {      
		$this->inscripcionService =  new \App\Services\Alumno\InscripcionService();	
	}

    public function index()
	{  
        if($alumno = $this->session->usuario_logueado->num_control)
        {
            $actividades = $this->inscripcionService->getActividadesPorAlumno(true);

            echo view('Includes/header');
            echo view('Alumno/navbar', ["activo" => "inscripciones"]);
            echo view('Alumno/Inscripcion/listar', [				
                'actividades' => $actividades,				           			
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
        $reglas = $this->validation->getRuleGroup('inscripcionReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('division/inscripciones')->withInput();
        }
        else
        {   
            $datos = [
                "num_control" => mb_strtoupper($this->request->getPost("num_control"), 'utf-8'),
                "periodo" => $this->request->getPost("periodo"),
                "id_actividad" => $this->request->getPost("id_actividad"),
                "telefono" => $this->request->getPost("telefono")
            ];

            $respuesta =  $this->inscripcionService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/inscripciones');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('division/inscripciones')->withInput();;
            }
        }
	}

}