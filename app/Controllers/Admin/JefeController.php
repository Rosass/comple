<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class JefeController extends BaseController
{
    protected $jefeService;

    function __construct()
    {
        $this->jefeService =  new \App\Services\Admin\JefeService();
    }

	public function index()
	{  
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ADMIN)
        {
			$jefes = $this->jefeService->getJefes();

            echo view('Includes/header');
            echo view('Admin/navbar', ["activo" => "jefes"]);
            echo view('Admin/Jefes/listar', ["jefes" => $jefes]);
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
        $reglas = $this->validation->getRuleGroup('jefeReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('admin/jefes')->withInput();
        }
        else
        {   
            $datos = [
                "rfc_jefe" => strtoupper($this->request->getPost("rfc_jefe")),
                "nombre_jefe" => mb_strtoupper($this->request->getPost("nombre_jefe"), 'utf-8'),
                "apaterno_jefe" => mb_strtoupper($this->request->getPost("apaterno_jefe"), 'utf-8'),
                "amaterno_jefe" => mb_strtoupper($this->request->getPost("amaterno_jefe"),'utf-8'),
                "telefono_jefe" => $this->request->getPost("telefono_jefe"),
                "correo_jefe" => $this->request->getPost("correo_jefe")
            ];

            $respuesta =  $this->jefeService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/jefes');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('admin/jefes')->withInput();;
            }
        }
    }

    public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ADMIN)
        {
            $rfc_jefe = urldecode($this->request->uri->getSegment(4));
			$jefe = $this->jefeService->getJefePorRfc($rfc_jefe);

            if($jefe != NULL)
            {
                echo view('Includes/header');
                echo view('Admin/navbar', ["activo" => "jefes"]);
                echo view('Admin/Jefes/editar', ["jefe" => $jefe]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('admin/jefes');
            }
		}
        else
        {
			return redirect("/");
		}
    }

    public function actualizar()
    {
        $reglas = $this->validation->getRuleGroup('editarJefeReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('admin/jefes')->withInput();
        }
        else
        {   
            $rfc_jefe = $this->request->getPost("rfc");

            $datos = [
                "nombre_jefe" => mb_strtoupper($this->request->getPost("nombre_jefe"), 'utf-8'),
                "apaterno_jefe" => mb_strtoupper($this->request->getPost("apaterno_jefe"), 'utf-8'),
                "amaterno_jefe" => mb_strtoupper($this->request->getPost("amaterno_jefe"),'utf-8'),
                "telefono_jefe" => $this->request->getPost("telefono_jefe"),
                "correo_jefe" => $this->request->getPost("correo_jefe")
            ];

            $respuesta =  $this->jefeService->actualizar($rfc_jefe, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('admin/jefes');
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
       
        $rfc_jefe = $this->request->getPost('rfc');
        $respuesta = $this->jefeService->cambiarEstatus($rfc_jefe);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
             $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('admin/jefes');
    }


}
