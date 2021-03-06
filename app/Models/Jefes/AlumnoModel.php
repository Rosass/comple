<?php namespace App\Models\Jefes;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [INSCRIPCIÓN]
 */
class AlumnoModel extends Model
{

    protected $returnType   = 'object';

    public function get_inscripciones( $id_actividad)
	{   
        return $this->db->table('inscripcion insc')
        ->select('insc.num_control, insc.id_inscripcion,insc.periodo, act.nombre_actividad, e.valor_numerico as valor_numerico, e.nivel_desempeno as nivel_desempeno')
        ->join('actividad act', 'act.id_actividad = insc.id_actividad', 'INNER')
        ->join('evaluacion_desempenio e', 'e.id_inscripcion = insc.id_inscripcion', 'LEFT')
        ->where('act.id_actividad', $id_actividad)
        ->get()->getResult();
    }
    
    public function get_alumno( $num_control )
    {
        $db_alumnos = db_connect('alumnos_db');
        return $db_alumnos->table('alumnos')
                    ->select('*')
                    ->where('num_control', $num_control )
                    ->get()->getResult();
    }

    public function get_actividad_alumno( $id_actividad)
    {
        $newArray = array();
        $actividad = $this->get_inscripciones( $id_actividad );
        foreach( $actividad as $act ) {
            $num_control = $act->num_control;
            $id_inscripcion = $act->id_inscripcion;

            $alumno = $this->get_alumno( $num_control );
            foreach( $alumno as $alm ) {
                $resp = array(
                    'id_inscripcion' => $id_inscripcion,
                    'periodo'=>$act->periodo,
                    'actividad' => $act->nombre_actividad,
                    'num_control' => $num_control,
                    'nombre' => $alm->nombre,
                    'ap_paterno' => $alm->ap_paterno,
                    'ap_materno' => $alm->ap_materno,
                    'carrera' => $alm->carrera,
                    'semestre' => $alm->semestre,
                    'sexo' =>$alm->sexo,
                    'valor_numerico' =>$act->valor_numerico,
                    'nivel_desempeno' =>$act->nivel_desempeno,
                
                );
                array_push($newArray, $resp);
            }
        }
        return $newArray;
    }

    public function get_actividad( $id_actividad)
    {
        return $this->db->table('actividad')
        ->select('*')
        ->where('id_actividad', $id_actividad)
        ->get()->getResult();
    }

}