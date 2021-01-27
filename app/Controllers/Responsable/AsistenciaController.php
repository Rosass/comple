<?php namespace App\Controllers\Responsable;
use App\Controllers\BaseController;
Use App\Services\Responsable\AsistenciaService;
use Vendor\autoload;
use Dompdf\Dompdf;

class AsistenciaController extends BaseController
{
    protected $asistenciaService;

    function __construct()
    {
		$this->asistenciaService = new \App\Services\Responsable\AsistenciaService();
		helper('utilerias');
	}

	public function listaAsistencia()
	{
        
		if($this->session->loginresponsable && $this->session->usuario_logueado->rfc_responsable)
		{
			$rfc_responsable = $this->session->usuario_logueado->rfc_responsable;
			$id_actividad = urldecode($this->request->uri->getSegment(3));
			$alumnos = $this->asistenciaService->get_actividad_alumno( $id_actividad, 2);
			$actividad = $this->asistenciaService->get_actividad( $id_actividad );
			$responsable = $this->asistenciaService->get_responsable( $rfc_responsable );
		
			if(count($alumnos) > 0)
			{

				$dompdf = new Dompdf();

				//Se carga el html
				$dompdf->loadHtml (view('Responsable/Lista-Asistencia/listar', [
					'alumnos' => $alumnos,
					'id_actividad' => $id_actividad,
					'actividad' => $actividad,
					'responsable' => $responsable,
					//'areas' => $area,    
					]));
				// Se define el tamaño de la hoja para el ticket
				$dompdf->setPaper('letter', 'portrait');
				// Se renderiza el HTML como PDF
				$dompdf->render();
				// se define fecha de descarga al pdf
				$id_actividad = date("dmyhi");    
				// Se muestra el PDF generado en el Browser
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
	
		if($this->session->loginresponsable && $this->session->usuario_logueado->rfc_responsable)
		{
			
			$rfc_responsable = $this->session->usuario_logueado->rfc_responsable;
			$id_actividad = urldecode($this->request->uri->getSegment(3));
			$alumnos = $this->asistenciaService->get_actividad_alumno( $id_actividad, 2);
			$actividad = $this->asistenciaService->get_actividad( $id_actividad );
			$responsable = $this->asistenciaService->get_responsable( $rfc_responsable );

			if(count ($alumnos)> 0)
			{
				$dompdf = new Dompdf();
				
				$dompdf->loadHtml (view('Responsable/Lista-Calificacion/listar', [
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