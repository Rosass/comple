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
    public function getPeriodosPorEstatus($true)
	{   
       return $this->inscripcionModel->getPeriodosPorEstatus($true);
    }

    /* public function periodo_activo()
	{   
       return $this->inscripcionModel->get_periodo_activo();
    } */



    /**
     * Guarda una nueva inscripción en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        //* Esta validacion es para comprovar si existe el alumno para poder insertar
        $alumno = $this->inscripcionModel->get_alumno($datos['num_control']);
        
        
        if($alumno != NULL)
        {
            //* comprovar que no existe la inscripcion para despues poder insertar
            $inscripcion = $this->inscripcionModel->get_inscripcion( $datos['num_control'], $datos['periodo'], $datos['id_actividad']);
            if($inscripcion == NULL)
            {
                $creditos_inscripcion = $this->inscripcionModel->get_creditos_actividad_inscripcion($datos['num_control'], $datos['periodo']);
                $creditos_actividad = $this->inscripcionModel->get_creditos_actividad($datos['id_actividad']);

                if ( $this->creditos_es_mayor_2( $creditos_actividad->creditos, $creditos_inscripcion->creditos ) ) 
                    return ["exito" => false, "msj" => "No puedes reunir más de dos creditos por semestre."];
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

    protected function creditos_es_mayor_2( $creditos_actual, $suma_creditosDB )
    {
        $creditos_act = (int) $creditos_actual; 
        $suma_creditos = (int) $suma_creditosDB;
        
        $total_creditos = $creditos_act + $suma_creditos;
        return ( $total_creditos > 2 ) ? true : false;
    }

}