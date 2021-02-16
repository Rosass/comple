<?php namespace App\Models\Escolares;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [RESPONSABLES]
 */
class CambiarModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'usuario';


    public function actualizar( $usuario, $datos)
    {
        $this->db->table($this->table)->where("usuario", $usuario)->update($datos);
        return $this->db->affectedRows();
    }

    public function getUsuarioPorUsuario($usuario)
    {
        return $this->db->table($this->table)->select("*")->where("usuario", $usuario)->get()->getRow();
    }

    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

}
