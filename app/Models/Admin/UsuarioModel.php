<?php namespace App\Models\Admin;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class UsuarioModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'usuario';

    public function getUsuarios()
	{   
        /*SELECT a.id_actividad, a.nombre_actividad, a.numero_dictamen, a.creditos, a.capacidad, ar.nombre_area, p.descripcion AS 'periodo_descripcion', ta.nombre AS 'tipo_actividad',
		 a.rfc_responsable, r.nombre AS 'nombre_responsable', r.apaterno AS 'apaterno_responsable', a.horas, a.horario
        FROM actividad a
        INNER JOIN area ar ON ar.id_area = a.id_area
        inner JOIN periodo p ON p.periodo = a.periodo
        INNER JOIN tipo_actividad ta ON ta.id_tipo_actividad = a.id_tipo_actividad
        INNER JOIN responsable r ON r.rfc_responsable = a.rfc_responsable;*/
        return $this->db->table("usuario u")
            ->select("u.usuario, u.clave,  ar.nombre_area,  tp.nombre_tipo AS 'tipo_usuario', u.estatus")
            ->join('area ar', 'ar.id_area = u.id_area', 'LEFT')
            ->join('tipo_usuario tp', 'tp.id_tipo_usuario = u.id_tipo_usuario', 'LEFT')
            ->orderBy("u.usuario", "ASC")
            ->get()->getResult();
    }

    public function getUsuariosPorEstatus($estatus)
	{   
        return $this->db->table($this->table)->select("*")->where("estatus", $estatus)->get()->getResult();
    }

    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function actualizar( $usuario, $datos)
    {
        $this->db->table($this->table)->where("usuario", $usuario)->update($datos);
        return $this->db->affectedRows();
    }

    public function getUsuarioPorUsuario($usuario)
	{   
        return $this->db->table($this->table)->select("*")->where("usuario", $usuario)->get()->getRow();
    }

    

}
