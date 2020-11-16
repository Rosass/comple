<?php namespace App\Models\Responsable;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [RESPONSABLES]
 */
class AlumnoModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'responsable';


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
