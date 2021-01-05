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
                        ->select('a.periodo,  a.estatus, a.id_inscripcion, a.id_actividad, p.descripcion as periodo_descripcion, 
                        ta.nombre_actividad as actividad, ta.creditos as credito, tac.nombre AS tipo_actividad, r.nombre as nombre, r.apaterno as apaterno, r.amaterno as amaterno, ta.horario as horario')
                        ->join('periodo p', 'p.periodo = a.periodo', 'LEFT')
                        ->join('actividad ta', 'ta.id_actividad = a.id_actividad', 'LEFT')
                        ->join('responsable r' , 'r.rfc_responsable = ta.rfc_responsable','LEFT')
                        ->join('tipo_actividad tac', 'tac.id_tipo_actividad = ta.id_tipo_actividad', 'LEFT')
                        ->where('num_control', $alumnos)     
                        ->orderBy("p.fecha_inicio", "ASC")
                        ->orderBy("ta.nombre_actividad","ASC")                 
                        ->get()->getResult();
    }

    


}
