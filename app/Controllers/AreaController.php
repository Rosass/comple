<?php namespace App\Controllers;

class AreaController extends BaseController
{

	protected $areaService;

    function __construct()
    {
		$this->areaService =  new \App\Services\AreaService();
	}
	

	//--------------------------------------------------------------------

}
