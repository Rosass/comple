<?php namespace App\Controllers\Responsable;
Use App\Services\Responsable\AsistenciaService;
use App\Controllers\BaseController;
use Vendor\autoload;
use Dompdf\Dompdf;



class AsistenciaController extends BaseController
{

	
	protected $asistenciaService;

	 function __construct()
	{
		$this->asistenciaService = new AsistenciaService();
		helper('utilerias');
	}
	
	/**
	 * Esta función muestra el PDF de lista de asistencia de un grupo
	 */
	

	public function index()
	{
		if($rfc_responsable = $this->session->usuario_logueado->rfc_responsable)
	 {
        $id_actividad = $this->request->uri->getSegment(3);	
		$alumnos = $this->asistenciaService->get_actividad_alumno($id_actividad);

	
		{
		$dompdf = new Dompdf();
			
		//Se carga el html
		$dompdf->loadHtml(view('Responsable/Asistencia/listar' , [
            'alumnos' => $alumnos,
            'id_actividad' => $id_actividad
            ]));
		// Se define el tamaño de la hoja para el ticket
		$dompdf->setPaper('letter', 'portrait');
		// Se renderiza el HTML como PDF
		$dompdf->render();
		// Se muestra el PDF generado en el Browser

		$id_actividad = date("dmyhi");

		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="document.pdf"');
		header('Content-Transfer-Encoding: binary');

		$dompdf->stream("Lista Asistencia - ".$id_actividad.".pdf", array("Attachment" => false));
		exit();
	}


  }
  else
  {
	  return redirect('/');
  }
	
}

}