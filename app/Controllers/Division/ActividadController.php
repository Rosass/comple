<?php namespace App\Controllers\Division;
use App\Controllers\BaseController;
Use App\Models\Division\ActividadModel;
use Vendor\autoload;
use Dompdf\Dompdf;
class ActividadController extends BaseController
{

	protected $actividadService;
	protected $areaService;
	protected $periodoService;
	protected $tipoActividadService;
    protected $responsableService;
    protected $actividadModel;

    function __construct()
    {
		$this->actividadService = new \App\Services\Division\ActividadService();
		$this->areaService =  new \App\Services\AreaService();
		$this->periodoService =  new \App\Services\Division\PeriodoService();
		$this->tipoActividadService =  new \App\Services\Division\TipoActividadService();
        $this->responsableService =  new \App\Services\Division\ResponsableService();
        $this->actividadModel = new \App\Models\Division\ActividadModel();
		helper('utilerias');
	}
	
	public function index()
	{
		if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
            
			$actividades = $this->actividadService->getActividades();
			$areas = $this->areaService->getAreasPorEstatus(true);
			$periodos = $this->periodoService->getPeriodosPorEstatus(true);
			$tipos_actividades = $this->tipoActividadService->getTiposPorEstatus(true);
            $responsables = $this->responsableService->getResponsablesPorEstatus(true);
            $periodo = $this->actividadService->getPeriodo();

			echo view('Includes/header');
			echo view('Division/navbar', ["activo" => "actividades"]);
			echo view('Division/Actividades/listar', [
				'actividades' => $actividades,
				'areas' => $areas,
                'periodos' => $periodos,
                'periodo' => $periodo,
				'tipos_actividades' => $tipos_actividades,
				'responsables' => $responsables
			]);
			echo view('Includes/footer');
		}
		else
		{
			return redirect("/");
		}
    }
    
    public function periodo()
	{
		$periodoPost =  $this->request->getPost("periodo");

		// if ( empty($periodoPost)

        if ( empty($periodoPost) || $periodoPost == '0') return redirect('division/actividades');
        
        $tipos_actividades = $this->tipoActividadService->getTiposPorEstatus(true);
        $responsables = $this->responsableService->getResponsablesPorEstatus(true);
        $areas = $this->areaService->getAreasPorEstatus(true);
        $periodos = $this->periodoService->getPeriodosPorEstatus(true);
		$actividades = $this->actividadService->getActividadPorIdareaPeriodo( $periodoPost);
		$periodo = $this->actividadService->getPeriodo();

		
		
		echo view('Includes/header');
		echo view('Division/navbar', ["activo" => "actividades"]);
		echo view('Division/Actividades/listar', [				
			'actividades' => $actividades,
            'areas' => $areas,
            'periodos' => $periodos,
			'tipos_actividades' => $tipos_actividades,
				'responsables' => $responsables,
			'periodo' => $periodo
		]);
		echo view('Includes/footer');
	}

	//--------------------------------------------------------------------

	public function guardar()
    {
        $reglas = $this->validation->getRuleGroup('actividadReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('division/actividades')->withInput();
        }
        else
        {   
            $datos = [
                "nombre_actividad" => mb_strtoupper($this->request->getPost("nombre"), 'utf-8'),
                "numero_dictamen" => $this->request->getPost("dictamen"),
                "creditos" => $this->request->getPost("creditos"),
                "capacidad" => $this->request->getPost("capacidad"),
                "id_area" => $this->request->getPost("id_area"),
                "periodo" => $this->request->getPost("periodo"),
				"id_tipo_actividad" => $this->request->getPost("id_tipo_actividad"),
				"rfc_responsable" => $this->request->getPost("rfc_responsable"),
				"horas" => $this->request->getPost("horas"),
                "horario" =>  mb_strtoupper($this->request->getPost("horario"), 'utf-8')
            ];

            $respuesta =  $this->actividadService->guardar($datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/actividades');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect('division/actividades')->withInput();;
            }
        }
	}

	public function editar()
    {
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)
        {
            $id_actividad = urldecode($this->request->uri->getSegment(4));
			$actividad = $this->actividadService->getActividadPorId($id_actividad);

            if($actividad != NULL)
            {
				$areas = $this->areaService->getAreasPorEstatus(true);
				$periodos = $this->periodoService->getPeriodosPorEstatus(true);
				$tipos_actividades = $this->tipoActividadService->getTiposPorEstatus(true);
				$responsables = $this->responsableService->getResponsablesPorEstatus(true);


                echo view('Includes/header');
                echo view('Division/navbar', ["activo" => "actividades"]);
                echo view('Division/Actividades/editar', [
					"actividad" => $actividad,
					'areas' => $areas,
					'periodos' => $periodos,
					'tipos_actividades' => $tipos_actividades,
					'responsables' => $responsables
				]);
                echo view('Includes/footer');
            }
            else
            {
                return redirect('division/actividades');
            }
		}
        else
        {
			return redirect("/");
		}
    }

	public function actualizar()
    {
        $reglas = $this->validation->getRuleGroup('actividadReglas');

        if (!$this->validate($reglas))
        {
            $this->session->setFlashData("error", $this->validator->listErrors());
            return redirect('division/actividades')->withInput();
        }
        else
        {   
            $id_actividad = $this->request->getPost("id_actividad");

			$datos = [
                "nombre_actividad" => mb_strtoupper($this->request->getPost("nombre"), 'utf-8'),
                "numero_dictamen" => $this->request->getPost("dictamen"),
                "creditos" => $this->request->getPost("creditos"),
                "capacidad" => $this->request->getPost("capacidad"),
                "id_area" => $this->request->getPost("id_area"),
                "periodo" => $this->request->getPost("periodo"),
				"id_tipo_actividad" => $this->request->getPost("id_tipo_actividad"),
				"rfc_responsable" => $this->request->getPost("rfc_responsable"),
				"horas" => $this->request->getPost("horas"),
                "horario" =>  mb_strtoupper($this->request->getPost("horario"), 'utf-8')
            ];

            $respuesta =  $this->actividadService->actualizar($id_actividad, $datos);

            if($respuesta["exito"])
            {
                $this->session->setFlashData("success", $respuesta["msj"]);
                return redirect('division/actividades');
            }
            else
            {
                $this->session->setFlashData("error", $respuesta["msj"]);
                return redirect()->back()->withInput();;
            }
        }
    }
	
	public function cambiarEstatus()
    {
       
        $id_actividad = $this->request->getPost('id_actividad');
        $respuesta = $this->actividadService->cambiarEstatus($id_actividad);

        if($respuesta['exito'])
        {
            $this->session->setFlashdata('success', $respuesta['msj']);
        }
        else
        {
             $this->session->setFlashdata('error', $respuesta['msj']);
        }
        return redirect('division/actividades');
    }

    public function listaAlumnos()
	{
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_DIVISION)        
        
        {
			$id_actividad = ($this->request->uri->getSegment(3));
			$alumnos = $this->actividadModel->get_actividad_alumno( $id_actividad, 1);
            $actividad = $this->actividadModel->get_actividadd( $id_actividad );
			if(count($alumnos) > 0)
			{

				$dompdf = new Dompdf();

				//Se carga el html
				$dompdf->loadHtml (view('Division/Lista-Alumnos/listar', [
					'alumnos' => $alumnos,
					'id_actividad' => $id_actividad,
                    'actividad' => $actividad,
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
				return redirect('division/actividades');
			}

		}
	
	}

    
}
