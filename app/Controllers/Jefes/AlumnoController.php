<?php namespace App\Controllers\Jefes;
use App\Controllers\BaseController;

class AlumnoController extends BaseController
{
    protected $alumnoService;
    

    function __construct()
    {
        $this->alumnoService = new \App\Services\Jefes\AlumnoService();
        $this->asistenciaService = new \App\Services\Responsable\AsistenciaService();
    }
    

	public function index()
	{
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_AREA)
        {

            $id_actividad = urldecode($this->request->uri->getSegment(3));
            $alumnos = $this->alumnoService->get_actividad_alumno( $id_actividad );
            $actividad = $this->alumnoService->get_actividad( $id_actividad );
            $HM = $this->alumnoService->total_hombres_mujeres( $id_actividad );
            $alumno = $this->asistenciaService->get_actividad_alumno( $id_actividad, true);
            

            if(count($alumno) > 0)
			{

            echo view('Includes/header');
            echo view('Jefes/navbar', ["activo" => "actividades"]);
            echo view('Jefes/Alumnos/lista', [
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
                return redirect('jefes/actividades');
            }
        }
        else
        {
        return redirect('jefes/actividades');
        }
	}

}