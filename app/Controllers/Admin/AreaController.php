<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class AreaController extends BaseController
{

	protected $areaService;
	protected $jefeService;

    function __construct()
    {
		$this->areaService =  new \App\Services\Admin\AreaService();
		$this->jefeService =  new \App\Services\Admin\JefeService();
	}
	
	public function index()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ADMIN)
        {
			$areas = $this->areaService->getAreas();
			$jefes = $this->jefeService->getJefesPorEstatus(true);

			echo view('Includes/header');
			echo view('Admin/navbar', ["activo" => "areas"]);
			echo view('Admin/Areas/listar', [				
				'areas' => $areas,
				'jefes' => $jefes
			]);
			echo view('Includes/footer');
		}
		else
		{
			return redirect("/");
		}
	}

	//----------------------------------------------------------------------

	public function guardar()
    {
        $reglas = $this->validation->getRuleGroup('areaReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('admin/areas')->withInput();
        }
        else
        {   
            $datos = [
                "nombre_area" => mb_strtoupper($this->request->getPost("nombre_area"), 'utf-8'),
				"rfc_jefe" => $this->request->getPost("rfc_jefe"),
				
            ];

            $respuesta =  $this->areaService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/areas');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('admin/areas')->withInput();;
            }
        }
	}

	public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ADMIN)
        {
            $id_area = urldecode($this->request->uri->getSegment(4));
			$area = $this->areaService->getAreaPorId($id_area);

            if($area != NULL)
            {
				
				$jefes = $this->jefeService->getJefesPorEstatus(true);


                echo view('Includes/header');
                echo view('Admin/navbar', ["activo" => "areas"]);
                echo view('Admin/Areas/editar', [
					'area' => $area,
					'jefes' => $jefes
				]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('admin/areas');
            }
		}
        else
        {
			return redirect("/");
		}
    }

	public function actualizar()
    {
        $reglas = $this->validation->getRuleGroup('editarAreaReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        else
        {   
            $id_area = $this->request->getPost("id_area");

			$datos = [
                "nombre_area" => mb_strtoupper($this->request->getPost("nombre_area"), 'utf-8'),
				"rfc_jefe" => $this->request->getPost("rfc_jefe"),
				
            ];

            $respuesta =  $this->areaService->actualizar($id_area, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/areas');
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

        $id_area = $this->request->getPost('id_area');
        $respuesta = $this->areaService->cambiarEstatus($id_area);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
            $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('admin/areas');
    }
}
