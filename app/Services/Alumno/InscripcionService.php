<?php
namespace App\Services\Alumno;

class InscripcionService
{

    protected $inscripcionModel;

    function __construct()
    {
        $this->inscripcionModel = new \App\Models\Alumno\InscripcionModel();
    }

    public function getInscripcionPorAlumno($num_control)
	{   
       return $this->inscripcionModel->getInscripcionPorAlumno($num_control);
    }
    
    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividadesPorAlumno($alumnos)
	{   
       return $this->inscripcionModel->getActividadesPorAlumno($alumnos);
    }
    /**
     * Obtiene los periodos por estatus de la BD
     * @return object
     */
    public function getPeriodosPorEstatus($estatus)
	{   
       return $this->periodoModel->getPeriodosPorEstatus($estatus);
    }

    public function periodo_activo()
	{   
       return $this->inscripcionModel->get_periodo_activo();
    }



    /**
     * Guarda una nueva inscripción en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        $alumno = $this->inscripcionModel->getInscripcionPorAlumno($datos['num_control']);
        if($alumno != NULL)
        {
            
            $inscripcion = $this->inscripcionModel->getInscripcionPorAlumno( $datos['num_control'], $datos['periodo'], $datos['id_actividad']);
            if($inscripcion == NULL)
            {
                if ($this->inscripcionModel->guardar($datos))
                    return ["exito" => true, "msj" => "Inscripción agregada con exito."];
                else
                    return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
            }
            else 
            {
                return ["exito" => false, "msj" => "Ya se encuentra registrada una inscripción con la actividad selecionada!."];
            }
        }
        else
        {
            return ["exito" => false, "msj" => "No se encontro el número de control proporcionado."];
        }

    }

}