<?php namespace App\Controllers;

class UsuarioController extends BaseController
{
    protected $usuarioService;
    protected $validation;

    function __construct()
    {
        $this->usuarioService =  new \App\Services\UsuarioService();
        $this->validation = \Config\Services::validation();
    }

	public function index()
	{
        echo view('Includes/header');
		echo view('Includes/navbar');
		echo view('Auth/login');
		echo view('Includes/footer');
	}

	//--------------------------------------------------------------------

    /**
     * Recibe los datos de acceso al sistema
     * @return view
     */
    public function login()
    {
        $usuario = $this->request->getPost("usuario");
        $clave = $this->request->getPost("clave");

        $respuesta = $this->usuarioService->login($usuario, $clave);

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
        $this->usuarioService->logout();
        return redirect('/');
    }
}
