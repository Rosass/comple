<?php namespace App\Models\Responsable;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class ActividadModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'actividad';

    public function getActividadesPorNombre()
	{   
        
        return $this->db->table("actividad a")
            ->select("a.id_actividad, a.nombre_actividad,")
            ->orderBy("a.nombre_actividad", "ASC")
            ->get()->getResult();
    }

    public function getActividadPorId($id_actividad)
	{   
        return $this->db->table($this->table)->select("*")->where("id_actividad", $id_actividad)->get()->getRow();
    }

    public function getActividadPorNombre($nombre)
    {
        return $this->db->table($this->table)->select("*")->where("nombre_actividad", $nombre)->get()->getRow();
    }

}
