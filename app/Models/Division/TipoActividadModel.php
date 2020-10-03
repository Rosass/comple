<?php namespace App\Models\Division;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [TIPO ACTIVIDADES]
 */
class TipoActividadModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'tipo_actividad';

    public function getTipos()
	{   
        return $this->db->table($this->table)->select("*")->get()->getResult();
    }

    public function getTiposPorEstatus($estatus)
	{   
        return $this->db->table($this->table)->select("*")->where("estatus", $estatus)->get()->getResult();
    }

    public function getTipoActividadPorId($id_tipo_actividad)
    {
        return $this->db->table($this->table)->select("*")->where("id_tipo_actividad", $id_tipo_actividad)->get()->getRow();
    }

    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function actualizar($id_tipo_actividad, $datos)
    {
        $this->db->table($this->table)->where("id_tipo_actividad", $id_tipo_actividad)->update($datos);
        return $this->db->affectedRows();
    }

}
