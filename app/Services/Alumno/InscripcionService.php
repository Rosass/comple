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

    public function  getActividadesPorCalificacion( $num_control )
	{   
    return $this->inscripcionModel->getActividadesPorCalificacion( $num_control );
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

    /**
     * Guarda una nueva inscripción en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        $periodo = $this->inscripcionModel->getPeriodosPorEstatus(true);

        if ( !$this->valida_fecha( $periodo->fecha_inicio_inscripcion, $periodo->fecha_final_inscripcion) )
        {
            return ["exito" => false, "msj" => "Usted no puede inscribirse! La fecha de inscripciones expiró."];
        }

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

                if ( $this->esta_incrito_en_cultural_o_deportiva( $datos['num_control'], $datos['periodo'], $datos['id_actividad']) )
                    return ["exito" => false, "msj" => "Ya se encuentra inscrito en una actividad de Tipo CULTURAL o DEPORTIVA."];
                    
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

    protected function esta_incrito_en_cultural_o_deportiva($num_control, $periodo_activo, $actividad)
    {
        $actividad = $this->inscripcionModel->get_id_tipo_actividad( $actividad );

        /** 
         ** 1 ES EL ID DEL TIPO DE ACTIVIDAD ACADEMICA 
        */
        if ( $actividad->id_tipo_actividad == 1 )
        {
            return false;
        }
        else if ( $this->inscripcionModel->get_actividad_alumno_cultura_deportiva(  $num_control, $periodo_activo) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * *RETORNA TRUE SI ES POSIBLE LA INSCRIPCION - RESPETANDO EL RANGO DE FECHAS INICIO Y FIN DE LA INSCRIPCION
     */

    function valida_fecha( $fecha_inicio, $fecha_fin )
    {
        date_default_timezone_set('America/Mexico_City');
        $fecha_servidor = date('Y-m-d');
    
        //* Para la comparación las fechas deben tener el mismo formato
        if (( $fecha_servidor >= $fecha_inicio) && ($fecha_servidor <= $fecha_fin) ) {
            return true;
        }
        return false;
    }
}