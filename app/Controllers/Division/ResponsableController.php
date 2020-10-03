<?php namespace App\Controllers\Division;;
use App\Controllers\BaseController;

class ResponsableController extends BaseController
{
    protected $responsableService;

    function __construct()
    {
        $this->responsableService =  new \App\Services\Division\ResponsableService();
    }

	public function index()
	{  
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
			$responsables = $this->responsableService->getResponsables();

            echo view('Includes/header');
            echo view('Division/navbar', ["activo" => "responsables"]);
            echo view('Division/Responsables/listar', ["responsables" => $responsables]);
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
        $reglas = $this->validation->getRuleGroup('responsableReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('division/responsables')->withInput();
        }
        else
        {   
            $datos = [
                "rfc_responsable" => strtoupper($this->request->getPost("rfc")),
                "nombre" => mb_strtoupper($this->request->getPost("nombre"), 'utf-8'),
                "apaterno" => mb_strtoupper($this->request->getPost("apaterno"), 'utf-8'),
                "amaterno" => mb_strtoupper($this->request->getPost("amaterno"),'utf-8'),
                "clave" => password_hash($this->request->getPost("clave") , PASSWORD_DEFAULT, ['cost' => 10]),
                "telefono" => $this->request->getPost("telefono"),
                "correo" => $this->request->getPost("correo")
            ];

            $respuesta =  $this->responsableService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/responsables');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('division/responsables')->withInput();;
            }
        }
    }

    public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
            $rfc_responsable = urldecode($this->request->uri->getSegment(4));
			$responsable = $this->responsableService->getResponsablePorRfc($rfc_responsable);

            if($responsable != NULL)
            {
                echo view('Includes/header');
                echo view('Division/navbar', ["activo" => "responsables"]);
                echo view('Division/Responsables/editar', ["responsable" => $responsable]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('division/responsables');
            }
		}
        else
        {
			return redirect("/");
		}
    }

    public function actualizar()
    {
        $reglas = $this->validation->getRuleGroup('editarResponsableReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('division/responsables')->withInput();
        }
        else
        {   
            $rfc_responsable = $this->request->getPost("rfc");

            $datos = [
                "nombre" => mb_strtoupper($this->request->getPost("nombre"), 'utf-8'),
                "apaterno" => mb_strtoupper($this->request->getPost("apaterno"), 'utf-8'),
                "amaterno" => mb_strtoupper($this->request->getPost("amaterno"),'utf-8'),
                "telefono" => $this->request->getPost("telefono"),
                "correo" => $this->request->getPost("correo")
            ];

            $respuesta =  $this->responsableService->actualizar($rfc_responsable, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/responsables');
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
        $reglas = $this->validation->getRuleGroup('editarClaveReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('division/responsables')->withInput();
        }
        else
        {   
            $rfc_responsable = $this->request->getPost("rfc");

            $datos = [
                "clave" => password_hash($this->request->getPost("clave") , PASSWORD_DEFAULT, ['cost' => 10]),
            ];

            $respuesta =  $this->responsableService->actualizar($rfc_responsable, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/responsables');
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
       
        $rfc_responsable = $this->request->getPost('rfc');
        $respuesta = $this->responsableService->cambiarEstatus($rfc_responsable);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
             $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('division/responsables');
    }


}
