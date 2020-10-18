<?php namespace App\Controllers\Division;
use App\Controllers\BaseController;

class ActividadController extends BaseController
{

	protected $actividadService;
	protected $areaService;
	protected $periodoService;
	protected $tipoActividadService;
	protected $responsableService;

    function __construct()
    {
		$this->actividadService = new \App\Services\Division\ActividadService();
		$this->areaService =  new \App\Services\AreaService();
		$this->periodoService =  new \App\Services\Division\PeriodoService();
		$this->tipoActividadService =  new \App\Services\Division\TipoActividadService();
		$this->responsableService =  new \App\Services\Division\ResponsableService();
	}
	
	public function index()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
            
			$actividades = $this->actividadService->getActividades();
			$areas = $this->areaService->getAreasPorEstatus(true);
			$periodos = $this->periodoService->getPeriodosPorEstatus(true);
			$tipos_actividades = $this->tipoActividadService->getTiposPorEstatus(true);
			$responsables = $this->responsableService->getResponsablesPorEstatus(true);

			echo view('Includes/header');
			echo view('Division/navbar', ["activo" => "actividades"]);
			echo view('Division/Actividades/listar', [
				'actividades' => $actividades,
				'areas' => $areas,
				'periodos' => $periodos,
				'tipos_actividades' => $tipos_actividades,
				'responsables' => $responsables
			]);
			echo view('Includes/footer');
		}
		else
		{
			return redirect("/");
		}
	}

	//--------------------------------------------------------------------

	public function guardar()
    {
        $reglas = $this->validation->getRuleGroup('actividadReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('division/actividades')->withInput();
        }
        else
        {   
            $datos = [
                "nombre_actividad" => mb_strtoupper($this->request->getPost("nombre"), 'utf-8'),
                "numero_dictamen" => $this->request->getPost("dictamen"),
                "creditos" => $this->request->getPost("creditos"),
                "capacidad" => $this->request->getPost("capacidad"),
                "id_area" => $this->request->getPost("id_area"),
                "periodo" => $this->request->getPost("periodo"),
				"id_tipo_actividad" => $this->request->getPost("id_tipo_actividad"),
				"rfc_responsable" => $this->request->getPost("rfc_responsable"),
				"horas" => $this->request->getPost("horas"),
                "horario" =>  mb_strtoupper($this->request->getPost("horario"), 'utf-8')
            ];

            $respuesta =  $this->actividadService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/actividades');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('division/actividades')->withInput();;
            }
        }
	}

	public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
            $id_actividad = urldecode($this->request->uri->getSegment(4));
			$actividad = $this->actividadService->getActividadPorId($id_actividad);

            if($actividad != NULL)
            {
				$areas = $this->areaService->getAreasPorEstatus(true);
				$periodos = $this->periodoService->getPeriodosPorEstatus(true);
				$tipos_actividades = $this->tipoActividadService->getTiposPorEstatus(true);
				$responsables = $this->responsableService->getResponsablesPorEstatus(true);


                echo view('Includes/header');
                echo view('Division/navbar', ["activo" => "actividades"]);
                echo view('Division/Actividades/editar', [
					"actividad" => $actividad,
					'areas' => $areas,
					'periodos' => $periodos,
					'tipos_actividades' => $tipos_actividades,
					'responsables' => $responsables
				]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('division/actividades');
            }
		}
        else
        {
			return redirect("/");
		}
    }

	public function actualizar()
    {
        $reglas = $this->validation->getRuleGroup('actividadReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('division/actividades')->withInput();
        }
        else
        {   
            $id_actividad = $this->request->getPost("id_actividad");

			$datos = [
                "nombre_actividad" => mb_strtoupper($this->request->getPost("nombre"), 'utf-8'),
                "numero_dictamen" => $this->request->getPost("dictamen"),
                "creditos" => $this->request->getPost("creditos"),
                "capacidad" => $this->request->getPost("capacidad"),
                "id_area" => $this->request->getPost("id_area"),
                "periodo" => $this->request->getPost("periodo"),
				"id_tipo_actividad" => $this->request->getPost("id_tipo_actividad"),
				"rfc_responsable" => $this->request->getPost("rfc_responsable"),
				"horas" => $this->request->getPost("horas"),
                "horario" =>  mb_strtoupper($this->request->getPost("horario"), 'utf-8')
            ];

            $respuesta =  $this->actividadService->actualizar($id_actividad, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/actividades');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect()->back()->withInput();;
            }
        }
    }
	
	public function cambiarEstatus()
    {
       
        $id_actividad = $this->request->getPost('id_actividad');
        $respuesta = $this->actividadService->cambiarEstatus($id_actividad);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
             $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('division/actividades');
    }
}
