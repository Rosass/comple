<?php namespace App\Models\Jefes;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class InicioModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'actividad';

    public function getActividadesPorJefe( $responsable )
    {
        return $this->db->table('actividad a')
                        ->select('a.nombre_actividad,a.estatus, ta.nombre as tipo_actividad')
                        ->join('tipo_actividad ta', 'ta.id_tipo_actividad = a.id_tipo_actividad', 'INNER') 
                        ->where('rfc_responsable', $responsable)
                        ->get()->getResult();
    }
  

}
