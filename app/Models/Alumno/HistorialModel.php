<?php namespace App\Models\Alumno;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class HistorialModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'inscripcion';

    public function getActividadesPorCalificacion( $alumnos )
    {
        return $this->db->table('inscripcion a')
                        ->select('a.periodo, a.estatus, a.fecha_inscripcion, a.id_inscripcion, a.id_actividad, p.descripcion as periodo_descripcion, 
                        ta.nombre_actividad as actividad, ta.creditos as credito, tac.nombre AS tipo_actividad, r.nombre as nombre, r.apaterno as apaterno, r.amaterno as amaterno, ta.horario as horario, 
                        e.valor_numerico as calificacion')
                        ->join('periodo p', 'p.periodo = a.periodo', 'LEFT')
                        ->join('actividad ta', 'ta.id_actividad = a.id_actividad', 'LEFT')
                        ->join('responsable r' , 'r.rfc_responsable = ta.rfc_responsable','LEFT')
                        ->join('tipo_actividad tac', 'tac.id_tipo_actividad = ta.id_tipo_actividad', 'LEFT')
                        ->join('evaluacion_desempenio e', 'e.id_inscripcion = a.id_inscripcion', 'LEFT')
                        ->where('num_control',$alumnos)
                        ->where('valor_numerico > 0')
                        ->orderBy("p.fecha_inicio", "ASC")
                        ->orderBy("ta.nombre_actividad","ASC")
                        ->get()->getResult();
    }

    public function getActividadesPorAlumno( $alumnos )
    {
        return $this->db->table('inscripcion a')
                        ->select('a.periodo,  a.estatus, a.id_inscripcion, a.id_actividad, p.descripcion as periodo_descripcion,  e.valor_numerico as calificacion,
                        ta.nombre_actividad as actividad, ta.creditos as credito, tac.nombre AS tipo_actividad, r.nombre as nombre, r.apaterno as apaterno, r.amaterno as amaterno, ta.horario as horario')
                        ->join('periodo p', 'p.periodo = a.periodo', 'LEFT')
                        ->join('actividad ta', 'ta.id_actividad = a.id_actividad', 'LEFT')
                        ->join('responsable r' , 'r.rfc_responsable = ta.rfc_responsable','LEFT')
                        ->join('tipo_actividad tac', 'tac.id_tipo_actividad = ta.id_tipo_actividad', 'LEFT')
                        ->join('evaluacion_desempenio e', 'e.id_inscripcion = a.id_inscripcion', 'LEFT')
                        ->where('num_control', $alumnos)     
                        ->orderBy("p.fecha_inicio", "ASC")
                        ->orderBy("ta.nombre_actividad","ASC")                 
                        ->get()->getResult();
    }

<<<<<<< HEAD
    public function getActividadesCalificacion( $num_control )
        {
            return $this->db->table('inscripcion')
                            ->selectSum('actividad.creditos')
                            ->join('actividad', 'inscripcion.id_actividad = actividad.id_actividad', 'LEFT')
                            ->join('evaluacion_desempenio', 'inscripcion.id_inscripcion  = evaluacion_desempenio.id_inscripcion', 'LEFT')
                            ->where("inscripcion.num_control", $num_control)
                            ->where('evaluacion_desempenio.valor_numerico >= 1')
                            ->get()->getRow();
        }
=======
    public function getActividades($alumnos)
    {
        return $this->db->table('inscripcion a')
                        ->select('a.periodo, a.estatus, a.fecha_inscripcion, a.id_inscripcion, a.id_actividad, ta.creditos,  
                        e.valor_numerico as calificacion')
                        ->join('evaluacion_desempenio e', 'e.id_inscripcion = a.id_inscripcion')
                        ->join('actividad ta', 'ta.id_actividad = a.id_actividad', 'LEFT')
                        ->where('num_control', $alumnos)
                        ->where('valor_numerico > 0') 
                        ->get()->getResult();
    }
    
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

    public function get_actividad_alumno( $id_actividad, $estatus)
    {
        $newArray = array();
        $actividad = $this->get_inscripciones( $id_actividad,$estatus );
        foreach( $actividad as $act ) {
            $num_control = $act->num_control;
            $id_inscripcion = $act->id_inscripcion;
            $estatus=$act->estatus;
            $nivel_desempeno=$act->nivel_desempeno;

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
                    'nivel_desempeno'=>$act->nivel_desempeno,
                    

                                
                    
                );
                array_push($newArray, $resp);
            }
        }
        return $newArray;
    }
>>>>>>> 432087bf7288a049b0e587601b264f1e6545661b


}
