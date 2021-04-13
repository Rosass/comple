<?php namespace App\Models\Admin;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [TIPO ACTIVIDADES]
 */
class TipoDepartamentoModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'tipo_departamento';

    public function getTipos()
	{   
        return $this->db->table($this->table)->select("*")->get()->getResult();
    }

    public function getTipoDepartamentoPorId($id)
    {
        return $this->db->table($this->table)->select("*")->where("id", $id)->get()->getRow();
    }


    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function actualizar($id, $datos)
    {
        $this->db->table($this->table)->where("id", $id)->update($datos);
        return $this->db->affectedRows();
    }

    


}
