<?php namespace App\Controllers\Responsable;;
use App\Controllers\BaseController;

class InicioController extends BaseController
{

	public function index()
	{  
     
        {
		

            echo view('Includes/header');
            echo view('Responsable/navbar', ["activo" => "actividades"]);
            echo view('Responsable/Actividades/listar');
            echo view('Includes/footer');
		}
    
	}

    //--------------------------------------------------------------------

}