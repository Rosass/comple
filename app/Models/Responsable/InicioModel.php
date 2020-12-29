<?php namespace App\Models\Responsable;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class InicioModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'actividad';

    public function getActividadesPorResponsable( $responsable, $true )
    {
        return $this->db->table('actividad a')
                        ->select('a.id_actividad, a.nombre_actividad, a.numero_dictamen, a.creditos, a.periodo, a.horas, a.horario, a.estatus, p.descripcion as periodo_descripcion ,ta.nombre as tipo_actividad')
                        ->join('tipo_actividad ta', 'ta.id_tipo_actividad = a.id_tipo_actividad', 'INNER')
                        ->join('periodo p', 'p.periodo = a.periodo', 'INNER')
                        ->where('rfc_responsable', $responsable)
                        ->where('p.estatus', $true)
                        ->get()->getResult();
    }
  

}
