<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [AUTH]
 */
class UsuarioModel extends Model
{
    protected $returnType   = 'object';

    public function getUsuarioPorUsuario($usuario)
    {

        return $this->db->table("usuario u")
        ->select("u.usuario, u.clave, u.id_tipo_usuario, u.estatus, u.id_area, a.nombre_area,j.rfc_jefe, j.nombre_jefe, j.apaterno_jefe, j.amaterno_jefe, ut.nombre_tipo, ut.estatus as estatus_tipo_usuario")
        ->join("area a", "a.id_area = u.id_area", 'LEFT')
        ->join("jefe j", "j.rfc_jefe = a.rfc_jefe", 'LEFT')
        ->join("tipo_usuario ut", "ut.id_tipo_usuario = u.id_tipo_usuario", 'LEFT')
        ->where("u.usuario", $usuario)
        ->get()->getRow();
    }

}
