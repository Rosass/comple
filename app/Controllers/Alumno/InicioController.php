<?php namespace App\Controllers\Alumno;;
use App\Controllers\BaseController;

class InicioController extends BaseController
{

	public function index()
	{  
        if($alumno = $this->session->usuario_logueado->num_control)
        {
		
            echo view('Includes/header');
            echo view('Alumno/navbar',["activo" => "actividades"]);
            echo view('Alumno/Inicio/Actividades');
            echo view('Includes/footer');
		}
    else

       {
         return redirect("/");
       }
    }
}