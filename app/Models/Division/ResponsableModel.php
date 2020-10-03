<?php namespace App\Models\Division;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [RESPONSABLES]
 */
class ResponsableModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'responsable';

    public function getResponsables()
	{   
        return $this->db->table($this->table)->select("*")->get()->getResult();
    }

    public function getResponsablesPorEstatus($estatus)
	{   
        return $this->db->table($this->table)->select("*")->where("estatus", $estatus)->get()->getResult();
    }

    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function actualizar( $rfc_responsable, $datos)
    {
        $this->db->table($this->table)->where("rfc_responsable", $rfc_responsable)->update($datos);
        return $this->db->affectedRows();
    }

    public function getResponsablePorRfc($rfc)
    {
        return $this->db->table($this->table)->select("*")->where("rfc_responsable", $rfc)->get()->getRow();
    }

}
