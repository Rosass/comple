<?php namespace App\Controllers\Jefes;

use Vendor\autoload;
use App\Controllers\BaseController;
use Dompdf\Dompdf;

class ConstanciaController extends BaseController
{
    protected $constanciaService;

     function __construct()
    {
        $this->constanciaService = new \App\Services\Jefes\ConstanciaService();
        //parent::__construct();
        helper('utilerias_helper');
    }  


	public function constancia()
	{
        
        $control = $this->request->getPost("ncontrol");
        $folio = $this->request->getPost('folio');
        $id_actividad = $this->request->getPost('id_actividad');
        $actividades = $this->constanciaService->getActividad($control, $id_actividad);
        $alumno = $this->constanciaService->getAlumnoPorNoControl($control);
        $id_area = $this->session->usuario_logueado->id_area;
		$area = $this->constanciaService->getArea($id_area);
        


        $dompdf = new Dompdf();
    
        $dompdf->loadHtml (view('Jefes/Constancia/listar', [
            'alumno' => $alumno,
            'folio' => $folio,
            'control' => $control,
            'actividad' => $actividades,
            'id_actividad' => $id_actividad,
            'id_actividad' => $id_area,
            'areas' => $area
            ]));
        $dompdf->setPaper('letter', 'portrait');
		// Se renderiza el HTML como PDF
		$dompdf->render();
        // Se muestra el PDF generado en el Browser
        $canvas = $dompdf->getCanvas();

        $w = $canvas->get_width();
        $h = $canvas->get_height();

        $imageURL = 'public/img/image.png';
        $imgWidth = 480;
        $imgHeight = 1500;

        $canvas->set_opacity(0.08);

        $x = (($w-$imgWidth)/-5);
        $y = (($h-$imgHeight)/5);

        $canvas->image($imageURL,$x,$y,$imgWidth,$imgHeight);
    
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="document.pdf"');
        header('Content-Transfer-Encoding: binary');

        $dompdf->stream("Constancia Parcial -  ".$control." .pdf", array("Attachment" => 0));
        exit();

	}

}
