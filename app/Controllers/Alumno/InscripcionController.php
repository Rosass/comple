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
            $periodos = $this->inscripcionService->getPeriodosPorEstatus(true);

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
        $periodo_activo = $this->inscripcionService->getPeriodosPorEstatus(true);
        

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('alumno/inscripciones')->withInput();
        }
        else
        {   
            $datos = [
                "num_control" => trim($this->session->usuario_logueado->num_control),
                "periodo" => $periodo_activo->periodo,
                "id_actividad" => $this->request->getPost("id_actividad"),
                "telefono" => $this->request->getPost("telefono") 
            ];
 
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