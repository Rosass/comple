<?php namespace App\Controllers;

class ResponsableLoginController extends BaseController
{
    protected $responsableService;
    protected $validation;

    function __construct()
    {
        $this->responsableService =  new \App\Services\ResponsableLoginService();
        $this->validation = \Config\Services::validation();
    }

	public function index()
	{
        echo view('Includes/header');
		echo view('Includes/navbar');
		echo view('Auth/loginresponsable');
		echo view('Includes/footer');
	}

	//--------------------------------------------------------------------

    /**
     * Recibe los datos de acceso al sistema
     * @return view
     */
    public function login()
    {
        $rfc_responsable = $this->request->getPost("rfc_responsable");
        $clave = $this->request->getPost("clave");

        $respuesta = $this->responsableService->login($rfc_responsable, $clave);

        if($respuesta['exito'])
        {
            return redirect($respuesta['redirigir_a']);
        }
        else
        {

            $this->session->setFlashdata('error', $respuesta['msj']);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Este metodo cierra la sesion
     * @return sesion data
     */
    public function logout()
    {
        $this->responsableService->logout();
        return redirect('/');
    }
}