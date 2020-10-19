<?php namespace App\Controllers;

class AlumnoLoginController extends BaseController
{
    protected $alumnoService;
    protected $validation;

    function __construct()
    {
        $this->alumnoService =  new \App\Services\AlumnoLoginService();
        $this->validation = \Config\Services::validation();
    }
	public function index()
	{
        echo view('Includes/header');
		echo view('Includes/navbar');
		echo view('Auth/loginalumno');
		echo view('Includes/footer');
	}
	//--------------------------------------------------------------------
    /**
     * Recibe los datos de acceso al sistema
     * @return view
     */
    public function login()
    {
        $alumno = $this->request->getPost("num_control");
        $nip = $this->request->getPost("nip");

        $respuesta = $this->alumnoService->login($alumno, $nip);

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
        $this->alumnoService->logout();
        return redirect('/');
    }
}