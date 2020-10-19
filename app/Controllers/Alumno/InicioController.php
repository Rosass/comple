<?php namespace App\Controllers\Alumno;;
use App\Controllers\BaseController;

class InicioController extends BaseController
{

	public function index()
	{  
     
        {
		

            echo view('Includes/header');
            echo view('Alumno/navbar');
        
            echo view('Includes/footer');
		}
    
	}

    //--------------------------------------------------------------------

}