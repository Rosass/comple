<?php namespace App\Models\Jefes;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class ActividadModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'actividad';

    public function getActividadesPorId_area()
    {
        return $this->db->table('actividad a')
                        ->select('a.id_area,a.id_actividad, a.nombre_actividad, a.numero_dictamen, a.creditos,a.rfc_responsable, a.periodo, a.horas, a.horario, a.estatus, p.descripcion as periodo_descripcion ,ta.nombre as tipo_actividad ')
                        ->join('tipo_actividad ta', 'ta.id_tipo_actividad = a.id_tipo_actividad', 'INNER')
                        ->join('periodo p', 'p.periodo = a.periodo', 'INNER')
                        //->join('responsable r', 'r.rfc_responsable = a.rfc_responsable', 'INNER')
                        ->where('id_area', 2)
                        ->get()->getResult();
    }
  

}