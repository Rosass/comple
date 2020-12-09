<?php namespace App\Controllers\Escolares;

use Vendor\autoload;
use App\Controllers\BaseController;
use Dompdf\Dompdf;

class GenerarController extends BaseController
{
    protected $generarService;

     function __construct()
    {
        $this->generarService = new \App\Services\Escolares\GenerarService();
    }  


	public function constanciaParcial()
	{
        
       
        $control = $this->request->getPost("control");
        $folio = $this->request->getPost('folio');
        $alumno = $this->generarService->getAlumnoPorNoControl($control);
        $actividades = $this->generarService->getActividad($control);

       

        $dompdf = new Dompdf();
    
        $dompdf->loadHtml (view('escolares/generar/index', [
            'alumno' => $alumno,
            'folio' => $folio,
            'control' => $control,
            'actividades' => $actividades
            ]));
        $dompdf->setPaper('letter', 'portrait');
		// Se renderiza el HTML como PDF
		$dompdf->render();
		// Se muestra el PDF generado en el Browser
    
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="document.pdf"');
        header('Content-Transfer-Encoding: binary');

        $dompdf->stream("Constancia Parcial -  ".$control." .pdf", array("Attachment" => false));

	}
	public function constanciaLiberacion()
	{
        
        $control = $this->request->getPost('control');
        $folio = $this->request->getPost('folio');
        $alumno = $this->generarService->getAlumnoPorNoControl($control);
        $actividades = $this->generarService->getActividad($control);
    
            $dompdf = new Dompdf();
        
            $dompdf->loadHtml (view('escolares/generar/listar', [
                'alumno' => $alumno,
                'folio' => $folio,
                'control' => $control,
                'actividades' => $actividades,
               
                ]));
            $dompdf->setPaper('letter', 'portrait');
            // Se renderiza el HTML como PDF
            $dompdf->render();
            // Se muestra el PDF generado en el Browser
        
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="document.pdf"');
            header('Content-Transfer-Encoding: binary');
    
            $dompdf->stream("Constancia liberacion- ".$control." .pdf", array("Attachment" => false));
        

    }
    

}
