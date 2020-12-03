<?php namespace App\Controllers\Responsable;
Use App\Services\Responsable\AsistenciaService;

use Vendor\autoload;
use App\Controllers\BaseController;
use Dompdf\Dompdf;

class AsistenciaController extends BaseController
{
    protected $asistenciaModel;

    function __construct()
    {
        $this->asistenciaModel = new \App\Models\Responsable\AsistenciaModel();
	}

	public function listaAsistencia()
	{
        
		if($rfc_responsable = $this->session->usuario_logueado->rfc_responsable)
		{
        $id_actividad = urldecode($this->request->uri->getSegment(3));
		$alumnos = $this->asistenciaModel->get_actividad_alumno( $id_actividad );
		$actividad = $this->asistenciaModel->get_actividad( $id_actividad );
		$responsable = $this->asistenciaModel->get_responsable( $rfc_responsable );
		//$contar = $this->asistenciaModel->get_inscripcion( $id_actividad );
		
		
		if(count($alumnos) > 0)

		{

        $dompdf = new Dompdf();
		

        $dompdf->loadHtml (view('Responsable/Lista-Asistencia/listar', [
			'alumnos' => $alumnos,
			'id_actividad' => $id_actividad,
			'actividad' => $actividad,
			'responsable' => $responsable,
			//'contar' => $contar,    
            ]));

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

		else
			{
				$this->session->setFlashdata('error', 'Ningun Alumno Inscrito En Esta Actividad');
				return redirect('responsables/inicio');
			}

	}
	else
	{
		return redirect('/');
	}
}



public function listaCalificacion()
{
	
	if($rfc_responsable = $this->session->usuario_logueado->rfc_responsable)
	{
	$id_actividad = urldecode($this->request->uri->getSegment(3));
	$alumnos = $this->asistenciaModel->get_actividad_alumno( $id_actividad );
	$actividad = $this->asistenciaModel->get_actividad( $id_actividad );
	$responsable = $this->asistenciaModel->get_responsable( $rfc_responsable );

	

	if(count ($alumnos)> 0)

	{

	$dompdf = new Dompdf();
	

	$dompdf->loadHtml (view('Responsable/Lista-calificacion/listar', [
		'alumnos' => $alumnos,
		'actividad' => $actividad,
		'responsable' => $responsable,
		
		]));

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

	else
		{
			$this->session->setFlashdata('error', 'Ningun Alumno Inscrito En Esta Actividad');
			return redirect('responsables/inicio');
		}

}
else
{
	return redirect('/');
}

}

}
