<?php namespace App\Models\Alumno;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class ActividadesModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'inscripcion';

    public function getActividadesPorAlumno( $alumnos )
    {
        return $this->db->table('inscripcion a')
                        ->select("a.periodo, a.fecha_inscripcion, a.id_actividad, a.id_inscripcion, 
                        p.descripcion as periodo_descripcion, ta.nombre_actividad as actividad, ta.creditos as credito, 
                        r.rfc_responsable as 'responsable',h.horario as horario, e.valor_numerico as calificacion")
                        ->join('periodo p', 'p.periodo = a.periodo', 'INNER')
                        ->join('actividad ta', 'ta.id_actividad = a.id_actividad', 'INNER')
                        ->join('actividad x', 'x.id_actividad = a.id_actividad', 'INNER')
                        ->join('actividad r', 'r.id_actividad = a.id_actividad', 'INNER')
                        ->join('actividad h', 'h.id_actividad = a.id_actividad', 'INNER')
                        ->join('evaluacion_desempenio e', 'e.id_inscripcion = a.id_inscripcion', 'INNER')
                      
                        ->get()->getResult();
    }
}
