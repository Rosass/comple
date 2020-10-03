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
      /*SELECT u.usuario, u.clave, u.id_tipo_usuario, a.nombre_area, j.rfc_jefe, j.nombre_jefe, j.apaterno_jefe, j.amaterno_jefe FROM usuario u
      INNER JOIN area a ON a.id_area = u.id_area
      INNER JOIN jefe j ON j.rfc_jefe = a.rfc_jefe*/

        return $this->db->table("usuario u")
        ->select("u.usuario, u.clave, u.id_tipo_usuario, u.estatus, a.nombre_area, j.rfc_jefe, j.nombre_jefe, j.apaterno_jefe, j.amaterno_jefe")
        ->join("area a", "a.id_area = u.id_area", 'LEFT')
        ->join("jefe j", "j.rfc_jefe = a.rfc_jefe", 'LEFT')
        ->where("u.usuario", $usuario)
        ->get()->getRow();
    }

}
