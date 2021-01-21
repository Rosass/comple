<?php namespace App\Controllers\Responsable;;
use App\Controllers\BaseController;

class AlumnoController extends BaseController
{
    protected $alumnoService;

    function __construct()
    {
        $this->alumnoService =  new \App\Services\Responsable\AlumnoService();
    }

	public function index()
	{  
        if($this->session->loginresponsable && $this->session->usuario_logueado->rfc_responsable)
        {   

            $rfc_responsable = $this->session->usuario_logueado->rfc_responsable;
            $responsable = $this->alumnoService->getResponsablePorRfc( $rfc_responsable ); 

            echo view('Includes/header');
            echo view('Responsable/navbar',  ["activo" => "cambiar clave"]);
            echo view('Responsable/Cambiar-Clave/editar', ["responsable" => $responsable]);
            echo view('Includes/footer');
            
        }
        else
        {
            return redirect('/');
        }
    }
    
    public function actualizarClave()
    {
        $reglas = $this->validation->getRuleGroup('editarClave12Reglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        else
        {   
            $rfc_responsable = $this->request->getPost("rfc");

            $datos = [
                "clave" => password_hash($this->request->getPost("clave") , PASSWORD_DEFAULT, ['cost' => 10]),
            ];

            $respuesta =  $this->alumnoService->actualizar($rfc_responsable, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('responsables/cambiar-clave');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect()->back()->withInput();;
            }
        }
    }


    //--------------------------------------------------------------------

}

