<?php namespace App\Models\Jefes;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [RESPONSABLES]
 */
class ResponsableModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'responsable';

    public function getResponsables($id_area)
	{   
        return $this->db->table('responsable r')
        ->select('r.id_area_fk,r.rfc_responsable, r.nombre, r.apaterno, r.amaterno, r.telefono, r.correo, r.fecha_registro, r.estatus')
        ->join('area a', 'a.id_area = a.id_area', 'INNER')
        ->where('r.id_area_fk', $id_area)
        ->orderBy('r.estatus',"DESC")
        ->get()->getResult();
    }
/* 
    public function getActividadPorIdareaPeriodo($id_area, $periodo)
	{   
        return $this->db->table('responsable r')
        ->select('r.id_area_fk,r.periodo,rfc_responsable, r.nombre, r.apaterno, r.amaterno, r.telefono, r.correo, r.fecha_registro, r.estatus, p.descripcion as periodo')
        ->join('periodo p', 'p.periodo = r.periodo', 'INNER')
        //->join('responsable r', 'r.rfc_responsable = r.rfc_responsable', 'LEFT')---
        ->where('r.id_area_fk', $id_area)
        ->where('r.periodo', $periodo)
        ->get()->getResult();
    } */


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

/*     public function getResponsablePorRfcYPeriodo($rfc, $periodo)
    {
        return $this->db->table($this->table)
        ->select("*")
        ->where("rfc_responsable", $rfc)
        ->where("periodo", $periodo)
        ->get()->getResult();
    } */

    public function getResponsablePorRfc($rfc)
    {
        return $this->db->table($this->table)
        ->select("*")
        ->where("rfc_responsable", $rfc)
        ->get()->getRow();
    }

    public function getPeriodo()
    {
        return $this->db->table('periodo')
        ->select("*")
        ->orderBy("periodo", "ASC")
        ->get()->getResult();
    }

}
