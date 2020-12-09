<?php namespace App\Models\Jefes;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class AreaModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'usuario';

    public function getActividadPorIdarea($usuario)
	{   
        return $this->db->table("usuario u")
            ->select("u.usuario,u.id_area, a.nombre_actividad, u.estatus")
            ->join('area ar', 'ar.id_area = u.id_area', 'INNER')
            ->join('actividad a','a.id_actividad = a.id_actividad', 'INNER')
            ->Where('u.id_area', $usuario)
            ->get()->getResult();
    }

}