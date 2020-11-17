<?php namespace App\Controllers\Responsable;
use App\Controllers\BaseController;

class AlumnoController extends BaseController
{

    protected $responsableService;

    function __construct()
    {
        $this->responsableService =  new \App\Services\Division\ResponsableService();
    }

	public function index()
	{  
        //if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
			$responsables = $this->responsableService->getResponsables();

            echo view('Includes/header');
            echo view('Responsable/navbar', ["activo" => "cambiar clave"]);
            echo view('Responsable/Cambiar-Clave/editar', ["responsables" => $responsables]);
            echo view('Includes/footer');
		}
       
	}

	public function editar()
	{  
     
        {
           

            echo view('Includes/header');
            echo view('Responsable/navbar',  ["activo" => "cambiar clave"]);
            echo view('Responsable/Cambiar-Clave/editar');
            echo view('Includes/footer');
		}
    
    }
    
    

    //--------------------------------------------------------------------

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
                return redirect('responsables/login');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect()->back()->withInput();;
            }
        }
    }

}