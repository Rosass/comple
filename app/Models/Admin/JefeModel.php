<?php namespace App\Models\Admin;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [JEFES]
 */
class JefeModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'jefe';

    public function getJefes()
	{   
        return $this->db->table($this->table)->select("*")->get()->getResult();
    }

    public function getJefesPorEstatus($estatus)
	{   
        return $this->db->table($this->table)->select("*")->where("estatus", $estatus)->get()->getResult();
    }

    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function actualizar( $rfc_jefe, $datos)
    {
        $this->db->table($this->table)->where("rfc_jefe", $rfc_jefe)->update($datos);
        return $this->db->affectedRows();
    }

    public function getJefePorRfc($rfc)
    {
        return $this->db->table($this->table)->select("*")->where("rfc_jefe", $rfc)->get()->getRow();
    }

}
