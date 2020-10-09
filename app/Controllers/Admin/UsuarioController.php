<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class UsuarioController extends BaseController
{
    protected $usuarioService;
    protected $tipoUsuarioService;
    protected $areaService;

    function __construct()
    {
        $this->usuarioService =  new \App\Services\Admin\UsuarioService();
        $this->tipoUsuarioService =  new \App\Services\Admin\TipoUsuarioService();
        $this->areaService =  new \App\Services\Admin\AreaService();
    }

	public function index()
	{  
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ADMIN)
        {
            $usuarios = $this->usuarioService->getUsuarios();
            $tipos_usuarios = $this->tipoUsuarioService->getTiposPorEstatus(true);
            $areas = $this->areaService->getAreasPorEstatus(true);

            echo view('Includes/header');
            echo view('Admin/navbar', ["activo" => "usuarios"]);
            echo view('Admin/Usuarios/listar', [
                "usuarios" => $usuarios,
                'tipos_usuarios' => $tipos_usuarios,
                'areas' => $areas
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
        $reglas = $this->validation->getRuleGroup('usuarioReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('admin/usuarios')->withInput();
        }
        else
        {   
            $datos = [
                "usuario" => strtoupper($this->request->getPost("usuario")),
                "clave" => password_hash($this->request->getPost("clave") , PASSWORD_DEFAULT, ['cost' => 10]),
                "id_tipo_usuario" => $this->request->getPost("id_tipo_usuario"),
                "id_area" => $this->request->getPost("id_area"),
            ];

            $respuesta =  $this->usuarioService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/usuarios');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('admin/usuarios')->withInput();;
            }
        }
    }

    public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ADMIN)
        {
            $usuario = urldecode($this->request->uri->getSegment(4));
			$usuario = $this->usuarioService->getUsuarioPorUsuario($usuario);

            if($usuario != NULL)
            {
                $tipos_usuarios = $this->tipoUsuarioService->getTiposPorEstatus(true);
                $areas = $this->areaService->getAreasPorEstatus(true);

                echo view('Includes/header');
                echo view('Admin/navbar', ["activo" => "usuarios"]);
                echo view('Admin/Usuarios/editar', [
                    "usuario" => $usuario,
                    'tipos_usuarios' => $tipos_usuarios,
                    'areas' => $areas
                    ]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('admin/usuarios');
            }
		}
        else
        {
			return redirect("/");
		}
    }

    public function actualizar()
    {
        $reglas = $this->validation->getRuleGroup('editarUsuarioReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        else
        {   
            $usuario = $this->request->getPost("usuario");

            $datos = [
                "usuario" => strtoupper($this->request->getPost("usuario")),
                "id_tipo_usuario" => $this->request->getPost("id_tipo_usuario"),
                "id_area" => $this->request->getPost("id_area"),
            ];

            $respuesta =  $this->usuarioService->actualizar($usuario, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/usuarios');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect()->back()->withInput();;
            }
        }
    }

    public function actualizarClave()
    {
        $reglas = $this->validation->getRuleGroup('editar1ClaveReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        else
        {   
            $usuario = $this->request->getPost("usuario");

            $datos = [
                "clave" => password_hash($this->request->getPost("clave") , PASSWORD_DEFAULT, ['cost' => 10]),
            ];

            $respuesta =  $this->usuarioService->actualizar($usuario, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/usuarios');
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
       
        $usuario = $this->request->getPost('usuario');
        $respuesta = $this->usuarioService->cambiarEstatus($usuario);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
             $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('admin/usuarios');
    }


}
