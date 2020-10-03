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
        /*SELECT a.id_actividad, a.nombre_actividad, a.numero_dictamen, a.creditos, a.capacidad, ar.nombre_area, p.descripcion AS 'periodo_descripcion', ta.nombre AS 'tipo_actividad',
		 a.rfc_responsable, r.nombre AS 'nombre_responsable', r.apaterno AS 'apaterno_responsable', a.horas, a.horario
        FROM actividad a
        INNER JOIN area ar ON ar.id_area = a.id_area
        inner JOIN periodo p ON p.periodo = a.periodo
        INNER JOIN tipo_actividad ta ON ta.id_tipo_actividad = a.id_tipo_actividad
        INNER JOIN responsable r ON r.rfc_responsable = a.rfc_responsable;*/
        return $this->db->table("area a")
            ->select("a.id_area, a.nombre_area, 
                      a.rfc_jefe, j.nombre_jefe AS 'nombre_jefe', j.apaterno_jefe AS 'apaterno_jefe', a.estatus")
            ->join('jefe j', 'j.rfc_jefe = a.rfc_jefe', 'LEFT')
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
