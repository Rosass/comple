<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [AUTH]
 */
class ResponsableLoginModel extends Model
{
   

    public function getResponsablePorUsuario($responsable)
    {
      /*SELECT u.usuario, u.clave, u.id_tipo_usuario, a.nombre_area, j.rfc_jefe, j.nombre_jefe, j.apaterno_jefe, j.amaterno_jefe FROM usuario u
      INNER JOIN area a ON a.id_area = u.id_area
      INNER JOIN jefe j ON j.rfc_jefe = a.rfc_jefe*/

        return $this->db->table("responsable r")
        ->select("r.rfc_responsable, r.nombre, r.apaterno, r.amaterno, r.clave, r.telefono, r.correo, r.fecha_registro")
        ->where("r.rfc_responsable", $responsable)
        ->get()->getRow();
    }

}
