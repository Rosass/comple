<?php namespace App\Controllers\Jefes;
use App\Controllers\BaseController;
Use App\Models\Jefes\AsistenciaModel;
use Vendor\autoload;
use Dompdf\Dompdf;

class AsistenciaController extends BaseController
{
    protected $asistenciaModel;

    function __construct()
    {
		$this->asistenciaModel = new \App\Models\Jefes\AsistenciaModel();
		helper('utilerias');
	}


	public function listaAsistencia()
	{
        
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
		{
			$id_actividad = urldecode($this->request->uri->getSegment(3));
			$alumnos = $this->asistenciaModel->get_actividad_alumno( $id_actividad, 1);
			$actividad = $this->asistenciaModel->get_actividad( $id_actividad );
			$id_area = $this->session->usuario_logueado->id_area;
		    $area = $this->asistenciaModel->getArea($id_area);
			
		
			if(count($alumnos) > 0)
			{

				$dompdf = new Dompdf();

				//Se carga el html
				$dompdf->loadHtml (view('Jefes/Lista-Asistencia/listar', [
					'alumnos' => $alumnos,
					'id_actividad' => $id_actividad,
					'actividad' => $actividad,
					'areas' => $area
					//'responsable' => $responsable,
					//'contar' => $contar,    
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
				return redirect('jefes/actividades');
			}

		}
		else
		{
			return redirect('/');
		}
	}




	public function listaCalificacion()
	{
	
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
		{
			$id_actividad = urldecode($this->request->uri->getSegment(3));
			$alumnos = $this->asistenciaModel->get_actividad_alumno( $id_actividad, 1 );
			$actividad = $this->asistenciaModel->get_actividad( $id_actividad );
			$id_area = $this->session->usuario_logueado->id_area;
		    $area = $this->asistenciaModel->getArea($id_area);
			//$responsable = $this->asistenciaModel->get_responsable( $rfc_responsable );

			if(count ($alumnos)> 0)
			{
				$dompdf = new Dompdf();
				
				$dompdf->loadHtml (view('Jefes/Lista-Calificacion/listar', [
					'alumnos' => $alumnos,
					'actividad' => $actividad,
					'areas' => $area
					//'responsable' => $responsable,
					
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
					return redirect('jefes/actividades');
				}
	}
	else
	{
	return redirect('/');
	}
	}

}