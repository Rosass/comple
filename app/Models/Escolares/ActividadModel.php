<?php namespace App\Models\Escolares;

 use CodeIgniter\Model;


class ActividadModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'alumnos';

   
    public function getAlumnoPorNoControl($no_control)
    {
        $db_alumnos = db_connect('alumnos_db');
        return $db_alumnos->table('alumnos')
                    ->select('*')
                    ->where('num_control', $no_control )
                    ->get()->getRow();
    } 

    public function get_actividades_alumno_calificadas( $no_control )
    {
        return $this->db->table('inscripcion a')
                        ->select('a.periodo, a.fecha_inscripcion, a.id_inscripcion, a.id_actividad, p.descripcion as periodo_descripcion, 
                        ta.nombre_actividad as actividad, ta.creditos as credito, tac.nombre AS tipo_actividad, ta.horario as horario, ta.horas as hora,
                        e.valor_numerico as calificacion, r.nombre, r.apaterno, r.amaterno')
                        ->join('periodo p', 'p.periodo = a.periodo', 'LEFT')
                        ->join('actividad ta', 'ta.id_actividad = a.id_actividad', 'LEFT')
                        ->join('responsable r' , 'r.rfc_responsable = ta.rfc_responsable','LEFT')
                        ->join('tipo_actividad tac', 'tac.id_tipo_actividad = ta.id_tipo_actividad', 'LEFT')
                        ->join('evaluacion_desempenio e', 'e.id_inscripcion = a.id_inscripcion', 'LEFT')
                        ->where('num_control',$no_control)
                        ->where('valor_numerico >= 1')
                        ->get()->getResult();
    } 
    
} 