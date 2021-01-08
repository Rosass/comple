<?php namespace App\Controllers\Jefes;
use App\Controllers\BaseController;

class AreaController extends BaseController
{

	protected $areaService;
	//protected $actividadService;

    function __construct()
    {
		$this->areaService =  new \App\Services\Jefes\AreaService();

	}
	
	public function index()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
        {
			$id_area = $this->session->usuario_logueado->id_area;
			$actividades = $this->areaService->getActividadPorIdarea($id_area, true);
			$periodo = $this->areaService->getPeriodo();

			$responsables = $this->areaService->get_responsable_area_y_sin_asignar($id_area);
			
			echo view('Includes/header');
			echo view('Jefes/navbar', ["activo" => "actividades"]);
			echo view('Jefes/Actividades/listar', [				
				'actividades' => $actividades,
				'areas' => $id_area,
				'responsables' => $responsables,
				'periodos' => $periodo
			]);
			echo view('Includes/footer');
		}
		else
		{
			return redirect("/");
		}
	}

	public function periodo()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
    		{
	             
		$periodoPost =  $this->request->getPost("periodo");

		// if ( empty($periodoPost)

		if ( empty($periodoPost) || $periodoPost == '0') return redirect('jefes/actividades');

		$id_area = $this->session->usuario_logueado->id_area;
		$actividades = $this->areaService->getActividadPorIdareaPeriodo($id_area, $periodoPost);
		$periodo = $this->areaService->getPeriodo();

		$responsables = $this->areaService->get_responsable_area_y_sin_asignar($id_area);
		
		echo view('Includes/header');
		echo view('Jefes/navbar', ["activo" => "actividades"]);
		echo view('Jefes/Actividades/listar', [				
			'actividades' => $actividades,
			'areas' => $id_area,
			'responsables' => $responsables,
			'periodos' => $periodo
		]);
		echo view('Includes/footer');
	
			}
			else
			{
				return 
				redirect('/');
				
			}

    }


	public function guardar()
	{

		$id_area = $this->session->usuario_logueado->id_area;

		$id_actividad = $this->request->getPost("id_actividad");
		$datos = [
			'rfc_responsable' => $this->request->getPost("rfc_responsable")
		];

		$respuesta =  $this->areaService->actualizar($id_actividad, $datos, $id_area);

		if($respuesta["exito"])
		{
			$this->session->setFlashData("success", $respuesta["msj"]);
			return redirect('jefes/actividades');
		}
		else
		{
			$this->session->setFlashData("error", $respuesta["msj"]);
			return redirect()->back()->withInput();;
		}
	}
	
}