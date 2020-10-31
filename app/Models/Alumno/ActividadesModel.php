<?php namespace App\Models\Alumno;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class ActividadesModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'inscripcion';

    public function getActividadesPorAlumno( $alumno )
    {
        return $this->db->table('inscripcion a')
                        ->select('a.periodo, a.fecha_inscripcion, a.id_inscripcion, a.id_actividad, p.descripcion as periodo_descripcion, 
                        ta.nombre_actividad as actividad, ta.creditos as credito, ta.id_tipo_actividad as tipo, ta.rfc_responsable as responsable, ta.horario as horario, 
                        e.valor_numerico as calificacion')
                        ->join('periodo p', 'p.periodo = a.periodo', 'LEFT')
                        ->join('actividad ta', 'ta.id_actividad = a.id_actividad', 'LEFT')
                        //->join('responsable z' , 'z.rfc_responsable = a.id_actividad', 'LEFT')
                        //->join('tipo_actividad h', 'h.id_tipo_actividad = a.id_actividad', 'LEFT')
                        ->join('evaluacion_desempenio e', 'e.id_inscripcion = a.id_inscripcion', 'LEFT')
                        ->where('a.num_control', $alumno)
                        ->get()->getResult();
    }
  

}
