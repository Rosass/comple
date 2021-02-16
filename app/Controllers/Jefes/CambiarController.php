<?php namespace App\Controllers\Jefes;
use App\Controllers\BaseController;

class CambiarController extends BaseController
{
    protected $cambiarService;

    function __construct()
    {
        $this->cambiarService =  new \App\Services\Jefes\CambiarService();
    }

	public function index()
	{  
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
        {   

            $usuario = $this->session->usuario_logueado->usuario;
            $usuario = $this->cambiarService->getUsuarioPorUsuario($usuario);

            echo view('Includes/header');
            echo view('Jefes/navbar',  ["activo" => "cambiar clave"]);
            echo view('Jefes/Cambiar-Clave/editar', ["usuario" => $usuario]);
            echo view('Includes/footer');
            
        }
        else
        {
            return redirect('/');
        }
    }
    
    public function actualizarClave()
    {
        $reglas = $this->validation->getRuleGroup('editar11ClaveReglas');

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

            $respuesta =  $this->cambiarService->actualizar($usuario, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('jefes/cambiar-clave');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect()->back()->withInput();;
            }
        }
    }

}

