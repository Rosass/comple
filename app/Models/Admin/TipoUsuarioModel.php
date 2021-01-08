<?php namespace App\Models\Admin;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [TIPO ACTIVIDADES]
 */
class TipoUsuarioModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'tipo_usuario';

    public function getTipos()
	{   
        return $this->db->table($this->table)->select("*")->get()->getResult();
    }

    public function getTipo()
	{   
        return $this->db->table($this->table)
        ->select("id_tipo_usuario")
        ->orderBy("id_tipo_usuario", 'DESC' )
        ->limit(1)
        ->get()->getRow()->id_tipo_usuario;
        
    }

    public function getTiposPorEstatus($estatus)
	{   
        return $this->db->table($this->table)->select("*")->where("estatus", $estatus)->get()->getResult();
    }

    public function getTipoUsuarioPorId($id_tipo_usuario)
    {
        return $this->db->table($this->table)->select("*")->where("id_tipo_usuario", $id_tipo_usuario)->get()->getRow();
    }


    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function actualizar($id_tipo_usuario, $datos)
    {
        $this->db->table($this->table)->where("id_tipo_usuario", $id_tipo_usuario)->update($datos);
        return $this->db->affectedRows();
    }

    


}
