<?php namespace App\Controllers\Responsable;;
use App\Controllers\BaseController;

class AlumnoController extends BaseController
{

	public function index()
	{  
     
        {
		

            echo view('Includes/header');
            echo view('Responsable/navbar',  ["activo" => "alumnos"]);
            echo view('Responsable/Alumnos/listar');
            echo view('Includes/footer');
		}
    
	}

    //--------------------------------------------------------------------

}