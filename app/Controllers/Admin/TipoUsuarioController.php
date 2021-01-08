<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class TipoUsuarioController extends BaseController
{
	protected $tipoUsuarioService;

    function __construct()
    {
        $this->tipoUsuarioService =  new \App\Services\Admin\TipoUsuarioService();
	}
	
	public function index()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ADMIN)
        {
            $tipos_usuarios = $this->tipoUsuarioService->getTipos();
            
			echo view('Includes/header');
			echo view('Admin/navbar', ["activo" => "tipos-usuarios", "tipos_usuarios" => $tipos_usuarios]);
			echo view('Admin/TiposUsuarios/listar');
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
        if ($this->request->getPost("nombre_tipo") == NULL)
        {
            $this->session->setFlashData("error", "El campo nombre es requerido.");
            return redirect('admin/tipos-usuarios')->withInput();
        }
        else
        {   
            $datos = [
                "nombre_tipo" => mb_strtoupper($this->request->getPost("nombre_tipo"), 'utf-8'),
                "id_tipo_usuario" => (int) $this->tipoUsuarioService->getTipo() + 1
        
        ];

            $respuesta =  $this->tipoUsuarioService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/tipos-usuarios');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('admin/tipos-usuarios')->withInput();;
            }
        }
	}
	
	public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ADMIN)
        {
            $id_tipo_usuario = urldecode($this->request->uri->getSegment(4));
			$tipo_usuario = $this->tipoUsuarioService->getTipoUsuarioPorId($id_tipo_usuario);

            if($tipo_usuario != NULL)
            {
                echo view('Includes/header');
                echo view('Admin/navbar', ["activo" => "tipos-usuarios"]);
                echo view('Admin/TiposUsuarios/editar', ["tipo_usuario" => $tipo_usuario]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('admin/tipos-usuarios');
            }
		}
        else
        {
			return redirect("/");
		}
	}
	
	public function actualizar()
    {
		if ($this->request->getPost("id_tipo_usuario") == NULL || $this->request->getPost("nombre_tipo")  == NULL)
        {
            $this->session->setFlashData("error", "Todos los campos son requeridos.");
            return redirect()->back()->withInput();
        }
        else
        {   
            $id_tipo_usuario = $this->request->getPost("id_tipo_usuario");
			$nombre_tipo = $this->request->getPost("nombre_tipo");

            $datos = [
                "nombre_tipo" => mb_strtoupper($nombre_tipo, 'utf-8'),
                "id_tipo_usuario" => $this->request->getPost("id_tipo_usuario"),
            ];

            $respuesta =  $this->tipoUsuarioService->actualizar($id_tipo_usuario, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/tipos-usuarios');
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
    
        $id_tipo_usuario = $this->request->getPost('id_tipo_usuario');
        $respuesta = $this->tipoUsuarioService->cambiarEstatus($id_tipo_usuario);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
            $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('admin/tipos-usuarios');
    }

}
