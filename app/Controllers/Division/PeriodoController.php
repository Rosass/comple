<?php namespace App\Controllers\Division;
use App\Controllers\BaseController;

class PeriodoController extends BaseController
{

	protected $periodoService;

    function __construct()
    {
        $this->periodoService =  new \App\Services\Division\PeriodoService();
	}

	public function index()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
			$periodos = $this->periodoService->getPeriodos();

			echo view('Includes/header');
			echo view('Division/navbar', ["activo" => "periodos"]);
			echo view('Division/Periodos/listar', ["periodos" => $periodos]);
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
		$reglas = $this->validation->getRuleGroup('periodoReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('division/periodos')->withInput();
        }
        else
        {   
			if($this->request->getPost("periodo") == ENE_JUN)
				$descripcion = "ENE-JUN/".date('Y');
			else if($this->request->getPost("periodo") == VERANO)
				$descripcion = "VERANO/".date('Y');
			else 
				$descripcion = "AGO-DIC/".date('Y');

            $datos = [
				"periodo" => strtoupper($this->request->getPost("periodo")),
				"descripcion" => $descripcion,
				"fecha_inicio" => $this->request->getPost("fecha_inicio"),
				"fecha_final" => $this->request->getPost("fecha_final")
			];

            $respuesta =  $this->periodoService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/periodos');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('division/periodos')->withInput();;
            }
        }
	}
	
	public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
            $periodo = urldecode($this->request->uri->getSegment(4));
			$periodo_aux = $this->periodoService->getPeriodoPorPeriodo($periodo);

            if($periodo_aux != NULL)
            {
                echo view('Includes/header');
                echo view('Division/navbar', ["activo" => "periodos"]);
                echo view('Division/Periodos/editar', ["periodo" => $periodo_aux]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('division/periodos');
            }
		}
        else
        {
			return redirect("/");
		}
	}
	
	public function actualizar()
    {
		$reglas = $this->validation->getRuleGroup('periodoReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('division/periodos')->withInput();
        }
        else
        {   
			$periodo = $this->request->getPost("periodo");

			$datos = [
				"fecha_inicio" => $this->request->getPost("fecha_inicio"),
				"fecha_final" => $this->request->getPost("fecha_final")
			];

            $respuesta =  $this->periodoService->actualizar($periodo, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/periodos');
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
       
        $periodo = $this->request->getPost('periodo');
        $respuesta = $this->periodoService->cambiarEstatus($periodo);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
             $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('division/periodos');
    }
}
