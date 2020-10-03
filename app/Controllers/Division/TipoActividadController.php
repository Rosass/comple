<?php namespace App\Controllers\Division;
use App\Controllers\BaseController;

class TipoActividadController extends BaseController
{
	protected $tipoActividadService;

    function __construct()
    {
        $this->tipoActividadService =  new \App\Services\Division\TipoActividadService();
	}
	
	public function index()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
			$tipos_actividades = $this->tipoActividadService->getTipos();

			echo view('Includes/header');
			echo view('Division/navbar', ["activo" => "tipos-actividades", "tipos_actividades" => $tipos_actividades]);
			echo view('Division/TiposActividades/listar');
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
        if ($this->request->getPost("nombre") == NULL)
        {
            $this->session->setFlashData("error", "El campo nombre es requerido.");
            return redirect('division/tipos-actividades')->withInput();
        }
        else
        {   
            $datos = ["nombre" => mb_strtoupper($this->request->getPost("nombre"), 'utf-8'),];

            $respuesta =  $this->tipoActividadService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/tipos-actividades');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('division/tipos-actividades')->withInput();;
            }
        }
	}
	
	public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
            $id_tipo_actividad = urldecode($this->request->uri->getSegment(4));
			$tipo_actividad = $this->tipoActividadService->getTipoActividadPorId($id_tipo_actividad);

            if($tipo_actividad != NULL)
            {
                echo view('Includes/header');
                echo view('Division/navbar', ["activo" => "tipos-actividades"]);
                echo view('Division/TiposActividades/editar', ["tipo_actividad" => $tipo_actividad]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('division/tipos-actividades');
            }
		}
        else
        {
			return redirect("/");
		}
	}
	
	public function actualizar()
    {
		if ($this->request->getPost("id_tipo_actividad") == NULL || $this->request->getPost("nombre")  == NULL)
        {
            $this->session->setFlashData("error", "Todos los campos son requeridos.");
            return redirect('division/tipos-actividades')->withInput();
        }
        else
        {   
            $id_tipo_actividad = $this->request->getPost("id_tipo_actividad");
			$nombre = $this->request->getPost("nombre");

            $datos = [
                "nombre" => mb_strtoupper($nombre, 'utf-8'),
            ];

            $respuesta =  $this->tipoActividadService->actualizar($id_tipo_actividad, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/tipos-actividades');
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
       
        $id_tipo_actividad = $this->request->getPost('id_tipo_actividad');
        $respuesta = $this->tipoActividadService->cambiarEstatus($id_tipo_actividad);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
             $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('division/tipos-actividades');
    }

}
