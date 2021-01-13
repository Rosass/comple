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

    protected function valida_fecha( $fecha_inicio, $fecha_fin )
    {
        date_default_timezone_set('America/Mexico_City');
        $fecha = getdate();
        $mesServer = $fecha['mon'];
        $anioServer = $fecha['year'];
        $diaServer = $fecha['mday'];

        // fecha in array = [0] = año, [1] = mes, [2] = dia
        $fecha_incripcion_inicio = $this->sub_string_fecha( $fecha_inicio);
        $fecha_incripcion_fin = $this->sub_string_fecha( $fecha_fin);


        if ( ( $anioServer >= $fecha_incripcion_inicio[0] ) && ( $anioServer <= $fecha_incripcion_fin[0] ) )
        {
            if ( $anioServer < $fecha_incripcion_fin[0])
            {
                return true;
            }
            if ( $anioServer > $fecha_incripcion_inicio[0] )
            {
                if ( $mesServer <= $fecha_incripcion_fin[1] )
                {
                    if ( $diaServer <= $fecha_incripcion_fin[2] )
                    {
                        return true;
                    }
                }
            }
            if ( ( $mesServer >= $fecha_incripcion_inicio[1] ) && ( $mesServer <= $fecha_incripcion_fin[1] ) )
            {
                if ( ( $diaServer >= $fecha_incripcion_inicio[2] ) && ( $diaServer <= $fecha_incripcion_fin[2] ) )
                {
                    return true;
                }
            }
        }

        return false;
    }

    protected function sub_string_fecha( $fecha )
    {
        $newFecha = array();
        $dia = substr( $fecha, 8, 2);
        $mes = substr( $fecha, 5, 2);
        $anio = substr( $fecha, 0, 4);
        array_push( $newFecha, $anio, $mes, $dia);
        return $newFecha;
    }
}