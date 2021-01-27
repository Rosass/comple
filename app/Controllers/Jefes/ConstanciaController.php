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
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
            {

        $control = $this->request->getPost("ncontrol");
        $folio = $this->request->getPosT('folio');
        $id_actividad = $this->request->getPost('id_actividad');
        $actividades = $this->constanciaService->getActividad($control, $id_actividad);
        $alumno = $this->constanciaService->getAlumnoPorNoControl($control);
        $id_area = $this->session->usuario_logueado->id_area;
		$area = $this->constanciaService->getArea($id_area);
        


        $dompdf = new Dompdf();
    
        $dompdf->loadHtml (view('Jefes/Constancia/listar', [
            'alumno' => $alumno,
            'folio' => $this->folio_final($folio),
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
    
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="document.pdf"');
        header('Content-Transfer-Encoding: binary');

        $dompdf->stream("Constancia Parcial -  ".$control." .pdf", array("Attachment" => 0));
        exit();

            }
            else
            {
                return redirect("/");
            }
    }
    public function folio_final( $folio )
    {

        switch ( strlen( (string)$folio ) ) {
            case 1:
                return "00$folio";
            case 2:
                return "0$folio";
            default:
                return $folio;
        }
    }

    public function constancia2021()
	{
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
            {

        $control = $this->request->getPost("ncontrol");
        $folio = $this->request->getPosT('folio');
        $id_actividad = $this->request->getPost('id_actividad');
        $actividades = $this->constanciaService->getActividad($control, $id_actividad);
        $alumno = $this->constanciaService->getAlumnoPorNoControl($control);
        $id_area = $this->session->usuario_logueado->id_area;
		$area = $this->constanciaService->getArea($id_area);
        


        $dompdf = new Dompdf();
    
        $dompdf->loadHtml (view('Jefes/Constancia-2021/listar2021', [
            'alumno' => $alumno,
            'folio' => $this->folio_final($folio),
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
    
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="document.pdf"');
        header('Content-Transfer-Encoding: binary');

        $dompdf->stream("Constancia Parcial -  ".$control." .pdf", array("Attachment" => 0));
        exit();

            }
            else
            {
                return redirect("/");
            }
    }


}
