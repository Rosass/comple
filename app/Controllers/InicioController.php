<?php namespace App\Controllers;

class InicioController extends BaseController
{
	public function index()
	{
		echo view('Includes/header');
		echo view('Includes/navbar');
		echo view('index');
		echo view('Includes/footer');
	}

	//--------------------------------------------------------------------

}
