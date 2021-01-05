<?php namespace App\Models\Responsable;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [INSCRIPCIÓN]
 */
class AsistenciaModel extends Model
{

    protected $returnType   = 'object';

    public function get_inscripciones( $id_actividad, $estatus)
	{   
        return $this->db->table('inscripcion insc')
        ->select('insc.num_control, insc.estatus, insc.id_inscripcion, insc.telefono, act.id_actividad, e.valor_numerico as valor_numerico, e.nivel_desempeno as nivel_desempeno')
        ->join('actividad act', 'act.id_actividad = insc.id_actividad', 'INNER')
        ->join('evaluacion_desempenio e', 'e.id_inscripcion = insc.id_inscripcion', 'LEFT')
        ->where('act.id_actividad', $id_actividad)
        ->where('insc.estatus', $estatus)
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

    public function get_actividad( $id_actividad )
    {
        return $this->db->table('actividad a')
                    ->select('a.id_actividad,a.id_area,a.nombre_actividad, a.rfc_responsable, p.descripcion as descripcion, ta.nombre as tipo_actividad, ar.nombre_area as nombre_area, j.nombre_jefe as nombre_jefe, j.apaterno_jefe as apaterno_jefe, j.amaterno_jefe as amaterno_jefe')
                    ->join('area ar', 'ar.id_area = a.id_area', 'INNER')
                    ->join('jefe j', 'j.rfc_jefe = ar.rfc_jefe', 'INNER')
                    ->join('tipo_actividad ta', 'ta.id_tipo_actividad = a.id_tipo_actividad', 'INNER')
                    ->join('periodo p', 'p.periodo = a.periodo', 'INNER')
                    ->where('id_actividad', $id_actividad )
                    ->get()->getResult();
    }

    public function get_responsable( $rfc_responsable )
    {
        return $this->db->table('responsable')
                    ->select('*')
                    ->where('rfc_responsable', $rfc_responsable )
                    ->get()->getResult();
    }

    public function get_actividad_alumno( $id_actividad, $estatus)
    {
        $newArray = array();
        $actividad = $this->get_inscripciones( $id_actividad,$estatus );
        foreach( $actividad as $act ) {
            $num_control = $act->num_control;
            $id_inscripcion = $act->id_inscripcion;
            $estatus=$act->estatus;

            $alumno = $this->get_alumno( $num_control );
            foreach( $alumno as $alm ) {
                $resp = array(
                    'id_inscripcion' => $id_inscripcion,
                    'num_control' => $num_control,
                    'nombre' => $alm->nombre,
                    'ap_paterno' => $alm->ap_paterno,
                    'ap_materno' => $alm->ap_materno,
                    'carrera' => $alm->carrera,
                    'semestre' => $alm->semestre,
                    'valor_numerico' =>$act->valor_numerico,
                    'nivel_desempeno' =>$act->nivel_desempeno,
                    'telefono' =>$act->telefono,
                    'estatus'=>$act->estatus,
                                
                    
                );
                array_push($newArray, $resp);
            }
        }
        return $newArray;
    }


    
}