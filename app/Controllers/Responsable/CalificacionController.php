<?php namespace App\Controllers\Responsable;
use App\Controllers\BaseController;

class CalificacionController extends BaseController
{
    protected $calificacionService;

    function __construct()
    {
        $this->calificacionService = new \App\Services\Responsable\CalificacionService();
        $this->asistenciaService = new \App\Services\Responsable\AsistenciaService();
	}

	public function index()
	{

        if($this->session->loginresponsable && $this->session->usuario_logueado->rfc_responsable)
		{

            $id_actividad = urldecode($this->request->uri->getSegment(3));
            $alumnos = $this->calificacionService->get_actividad_alumno( $id_actividad );
            $actividad = $this->calificacionService->get_actividad( $id_actividad );
            $HM = $this->calificacionService->total_hombres_mujeres( $id_actividad );
            $alumno = $this->asistenciaService->get_actividad_alumno( $id_actividad, true);

            if(count($alumno) > 0)
            {

            echo view('Includes/header');
            echo view('Responsable/navbar', ["activo" => "actividades"]);
            echo view('Responsable/Calificaciones/listar', [
                'alumnos' => $alumnos,
                'id_actividad' => $id_actividad,
                'hombres' => $HM['hombres'],
                'mujeres' => $HM['mujeres'],
                'actividad' =>$actividad
                ]);
            echo view('Includes/footer');

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