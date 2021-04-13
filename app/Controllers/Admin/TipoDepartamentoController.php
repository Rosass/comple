<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class TipoDepartamentoController extends BaseController
{
	protected $tipoDepartamentoService;

    function __construct()
    {
        $this->tipoDepartamentoService =  new \App\Services\Admin\TipoDepartamentoService();
	}
	
	public function index()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ADMIN)
        {
            $tipo_departamento = $this->tipoDepartamentoService->getTipos();
            
			echo view('Includes/header');
			echo view('Admin/navbar', ["activo" => "tipo-departamento", "tipo_departamento" => $tipo_departamento]);
			echo view('Admin/TipoDepartamento/listar');
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
        if ($this->request->getPost("tipo_departamento") == NULL)
        {
            $this->session->setFlashData("error", "El campo nombre es requerido.");
            return redirect('admin/tipo-departamento')->withInput();
        }
        else
        {   
            $datos = [
                "tipo_departamento" => mb_strtoupper($this->request->getPost("tipo_departamento"), 'utf-8'),
                "id" => $this->request->getPost("id"),
        
        ];

            $respuesta =  $this->tipoDepartamentoService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/tipo-departamento');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('admin/tipo-departamento')->withInput();;
            }
        }
	}
	
    
	public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ADMIN)
        {
            $id = urldecode($this->request->uri->getSegment(4));
			$tipo_departamento = $this->tipoDepartamentoService->getTipoDepartamentoPorId($id);

            if($tipo_departamento != NULL)
            {
                echo view('Includes/header');
                echo view('Admin/navbar', ["activo" => "tipo-departamento"]);
                echo view('Admin/TipoDepartamento/editar', ["tipo_departamento" => $tipo_departamento]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('admin/tipo-departamento');
            }
		}
        else
        {
			return redirect("/");
		}
	}
	
	public function actualizar()
    {
		if ($this->request->getPost("id") == NULL || $this->request->getPost("tipo_departamento")  == NULL)
        {
            $this->session->setFlashData("error", "Todos los campos son requeridos.");
            return redirect()->back()->withInput();
        }
        else
        {   
            $id = $this->request->getPost("id");
			$tipo_departamento = $this->request->getPost("tipo_departamento");

            $datos = [
                "tipo_departamento" => mb_strtoupper($tipo_departamento, 'utf-8'),
                "id" => $this->request->getPost("id"),
            ];

            $respuesta =  $this->tipoDepartamentoService->actualizar($id, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/tipo-departamento');
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
    
        $id = $this->request->getPost('id');
        $respuesta = $this->tipoDepartamentoService->cambiarEstatus($id);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
            $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('admin/tipo-departamento');
    } 

}
