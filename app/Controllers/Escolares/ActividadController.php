<?php namespace App\Controllers\Escolares;
use App\Controllers\BaseController;

class ActividadController extends BaseController
{
    protected $actividadService;

     function __construct()
    {
        $this->actividadService = new \App\Services\Escolares\ActividadService();
	} 

	public function index()
	{
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ESCOLARES)
        {
		
                echo view('Includes/header');
                echo view('Escolares/navbar', ["activo" => "inicio"]);
                echo view('Escolares/Inicio/listar');
                echo view('Includes/footer');

		}
		else
		{
			return redirect("/");
		}
		
    }
    
    public function buscar()
	{
        $data = array();
        $no_control = $this->request->getPost("no_control");

        $alumno = $this->actividadService->getAlumnoPorNoControl($no_control);
        $actividades = $this->actividadService->actividades_alumno_calificadas($no_control);

        $data['alumno'] = $alumno;
        $data['actividades'] = $actividades;

		return json_encode( $data);
	}

	//--------------------------------------------------------------------

}
