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
        if($this->session->loginalumno && $this->session->usuario_logueado->num_control)
        {
        
            $num_control2 = $this->session->usuario_logueado->num_control;
            $num_control = $this->inscripcionService->getInscripcionPorAlumno($num_control2);
            $actividades = $this->inscripcionService->getActividadesPorAlumno(true);
            $periodos = $this->inscripcionService->getPeriodosPorEstatus(true);
            $numeroActividades = $this->inscripcionService-> getActividadesPorCalificacion( $num_control2 );

            if ( $periodos )
            {
                $fecha_inicio = $periodos->fecha_inicio_inscripcion;
                $fecha_fin    = $periodos->fecha_final_inscripcion;
                $fecha_valida = $this->valida_fecha( $fecha_inicio, $fecha_fin );
            } else {
                $fecha_valida = false;
            }

            // echo $numeroActividades->creditos;
            echo view('Includes/header');
            echo view('Alumno/navbar', ["activo" => "inscripciones"]);
            echo view('Alumno/Inscripciones/listar', [
                'alumnos' => $num_control,
                'actividades' => $actividades,
                "fecha_valida" => $fecha_valida,
                "numeroActividades" => $numeroActividades->creditos
                ]);
            echo view('Includes/footer');
		
        }
        else
        {
            return redirect("/");
        }
    }

    protected function valida_fecha( $fecha_inicio, $fecha_fin )
    {
        date_default_timezone_set('America/Mexico_City');
        $fecha_servidor = date('Y-m-d');

        //* Para la comparaciĂłn las fechas deben tener el mismo formato
        if (( $fecha_servidor >= $fecha_inicio) && ($fecha_servidor <= $fecha_fin) ) {
            return true;
        }
        return false;
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