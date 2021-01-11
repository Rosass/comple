<?php namespace App\Controllers\Division;
use App\Controllers\BaseController;

class InscripcionController extends BaseController
{
	protected $inscripcionService;
	protected $periodoService;
	protected $actividadService;
	protected $alumnoModel;

    function __construct()
    {
		$this->inscripcionService = new \App\Services\Division\InscripcionService();
		$this->periodoService =  new \App\Services\Division\PeriodoService();
		$this->actividadService =  new \App\Services\Division\ActividadService();
		$this->alumnoModel =  new \App\Models\AlumnoModel();
	}

	public function index()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
			$inscripciones = $this->inscripcionService->getInscripciones();
			$periodos = $this->periodoService->getPeriodosPorEstatus(true);
			$actividades = $this->actividadService->getActividadesPorEstatus(true);
			$inscripciones_aux = $this->inscripcionService->unirRegistros($inscripciones);

			echo view('Includes/header');
			echo view('Division/navbar', ["activo" => "inscripciones"]);
			echo view('Division/Inscripciones/listar', ["inscripciones" => $inscripciones_aux, "periodos" => $periodos, "actividades" => $actividades]);
			echo view('Includes/footer');
		}
		else
		{
			return redirect("/");
		}
	}
	
	/**
     * Esta función obtiene inscripciones filtradas por actividad
     * 
     * @return json
     */
    public function getInscripcionesPorActividadYEstatus()
    {
        $id_actividad = $this->request->getPost("id_actividad");
        $inscripciones = $this->inscripcionService->getInscripcionesPorActividadYEstatus($id_actividad);
    
		// Se devuelve el resultado en formato JSON
		return json_encode($inscripciones);
    }

	//--------------------------------------------------------------------
	
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
                "telefono" => $this->request->getPost("telefono"),
                "nota" => $this->request->getPost("nota") 
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

	public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
            $id_inscripcion = urldecode($this->request->uri->getSegment(4));
			$inscripcion = $this->inscripcionService->getInscripcionPorId($id_inscripcion);

            if($inscripcion != NULL)
            {
				$periodos = $this->periodoService->getPeriodosPorEstatus(true);
				$actividades = $this->actividadService->getActividadesPorEstatus(true);

                echo view('Includes/header');
                echo view('Division/navbar', ["activo" => "inscripciones"]);
                echo view('Division/Inscripciones/editar', [
					"inscripcion" => $inscripcion, 
					"periodos" => $periodos, 
					"actividades" => $actividades
				]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('division/inscripciones');
            }
		}
        else
        {
			return redirect("/");
		}
	}
	
	public function actualizar()
    {
        $reglas = $this->validation->getRuleGroup('editarInscripcionReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        else	
        {   
            $id_inscripcion = $this->request->getPost("id_inscripcion");

            $datos = [
                "periodo" => $this->request->getPost("periodo"),
                "id_actividad" => $this->request->getPost("id_actividad"),
                "telefono" => $this->request->getPost("telefono"),
            ];

            $respuesta =  $this->inscripcionService->actualizar($id_inscripcion, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/inscripciones');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect()->back();
            }
        }
    }

	public function cambiarEstatusAceptar()
    {
       
		$id_inscripcion = $this->request->getPost('id_inscripcion');
		
       	$respuesta = $this->inscripcionService->cambiarEstatusAceptar($id_inscripcion);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
             $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('division/inscripciones');
    }

	public function cambiarEstatusRechazar()
    {
       
		$id_inscripcion = $this->request->getPost('id_inscripcion');
		
       	$respuesta = $this->inscripcionService->cambiarEstatusRechazar ($id_inscripcion);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
             $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('division/inscripciones');
    }
}
