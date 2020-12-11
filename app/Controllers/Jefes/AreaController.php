<?php namespace App\Controllers\Jefes;
use App\Controllers\BaseController;

class AreaController extends BaseController
{

	protected $areaService;
	//protected $actividadService;

    function __construct()
    {
		$this->areaService =  new \App\Services\Jefes\AreaService();
		//$this->actividadService =  new \App\Services\Division\ActividadService();
	}
	
	public function index()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
        {
			$id_area = $this->session->usuario_logueado;
			//$id_area = $this->areaService->getActividadPorIdarea($usuario);
		    $actividades = $this->areaService->getActividadPorIdarea(true);

			echo view('Includes/header');
			echo view('Jefes/navbar', ["activo" => "actividades"]);
			echo view('Jefes/Actividades/listar', [				
				'actividades' => $actividades,
				'areas' => $id_area,
			]);
			echo view('Includes/footer');
		}
		else
		{
			return redirect("/");
		}
	}
	
}
