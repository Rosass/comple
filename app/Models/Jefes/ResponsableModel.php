<?php namespace App\Models\Jefes;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [RESPONSABLES]
 */
class ResponsableModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'responsable';

    public function getResponsables($id_area, $true)
	{   
        return $this->db->table('responsable r')
        ->select('r.id_area_fk,r.periodo_fk ,r.rfc_responsable, r.nombre, r.apaterno, r.amaterno, r.telefono, r.correo, r.fecha_registro, r.estatus')
        ->join('area a', 'a.id_area = a.id_area', 'INNER')
        ->join('periodo p', 'p.periodo = r.periodo_fk', 'INNER')
        ->where('p.estatus', $true)
        ->where('r.id_area_fk', $id_area)->get()->getResultArray();
    }

    public function getActividadPorIdareaPeriodo($id_area, $periodo)
	{   
        return $this->db->table('responsable r')
        ->select('r.id_area_fk,r.periodo_fk, r.rfc_responsable, r.nombre, r.apaterno, r.amaterno, r.telefono, r.correo, r.fecha_registro, r.estatus')
        ->join('area a', 'a.id_area = a.id_area', 'INNER')
        ->join('periodo p', 'p.periodo = p.periodo', 'INNER')
        ->where('r.id_area_fk', $id_area)
        ->where('p.periodo', $periodo)
        ->get()->getResultArray();
        
    }

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

    public function getResponsablePorRfc($rfc)
    {
        return $this->db->table($this->table)->select("*")->where("rfc_responsable", $rfc)->get()->getRow();
    }

    public function getPeriodo()
    {
        return $this->db->table('periodo')
        ->select("*")
        ->orderBy("periodo", "ASC")
        ->get()->getResult();
    }

}
