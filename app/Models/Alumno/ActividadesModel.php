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
                        ->select('a.periodo, a.id_actividad, p.descripcion as periodo_descripcion, ta.nombre_actividad as actividad')
                        ->join('periodo p', 'p.periodo = a.periodo', 'INNER')
                        ->join('actividad ta', 'ta.id_actividad = a.id_actividad', 'INNER')
                        //->join('actividad c', 'c.id_actividad = c.creditos', 'INNER')
                       // ->join('responsable r', 'r.rfc_responsable = r.responsable', 'INNER')
                        ->where('num_control', $alumno)
                        ->get()->getResult();
    }
  

}
