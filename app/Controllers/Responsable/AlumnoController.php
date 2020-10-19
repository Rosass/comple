<?php namespace App\Controllers\Responsable;;
use App\Controllers\BaseController;

class AlumnoController extends BaseController
{

	public function index()
	{  
     
        {
		

            echo view('Includes/header');
            echo view('Responsable/navbar',  ["activo" => "cambiar clave"]);
            echo view('Responsable/Cambiar-Clave/listar');
            echo view('Includes/footer');
		}
    
	}

    //--------------------------------------------------------------------

}