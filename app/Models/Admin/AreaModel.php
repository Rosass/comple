<?php namespace App\Models\Admin;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class AreaModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'area';

    public function getAreas()
	{   
        return $this->db->table("area a")
            ->select("a.id_area, a.nombre_area, 
                    a.rfc_jefe, j.nombre_jefe AS nombre_jefe, j.apaterno_jefe AS apaterno_jefe, j.amaterno_jefe AS amaterno_jefe, a.estatus, tp.tipo_departamento as tipo_departamento")
            ->join('jefe j', 'j.rfc_jefe = a.rfc_jefe', 'LEFT')
            ->join('tipo_departamento tp', 'tp.id = a.id', 'LEFT')
            ->orderBy("a.nombre_area", "ASC")
            ->get()->getResult();
    }

    public function getAreasPorEstatus($estatus)
	{   
        return $this->db->table($this->table)->select("*")->where("estatus", $estatus)->get()->getResult();
    }

    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function actualizar( $id_area, $datos)
    {
        $this->db->table($this->table)->where("id_area", $id_area)->update($datos);
        return $this->db->affectedRows();
    }

    public function getAreaPorId($id_area)
	{   
        return $this->db->table($this->table)->select("*")->where("id_area", $id_area)->get()->getRow();
    }

    public function getAreaPorNombre($nombre)
    {
        return $this->db->table($this->table)->select("*")->where("nombre_area", $nombre)->get()->getRow();
    }

}
