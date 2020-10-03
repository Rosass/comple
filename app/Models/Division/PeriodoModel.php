<?php namespace App\Models\Division;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [PERIODO]
 */
class PeriodoModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'periodo';

    public function getPeriodos()
	{   
        return $this->db->table($this->table)->select("*")->get()->getResult();
    }

    public function getPeriodosPorEstatus($estatus)
	{   
        return $this->db->table($this->table)->select("*")->where("estatus", $estatus)->get()->getResult();
    }

    public function getPeriodoPorPeriodo($periodo)
    {
        return $this->db->table($this->table)->select("*")->where("periodo", $periodo)->get()->getRow();
    }

    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function actualizar($periodo, $datos)
    {
        $this->db->table($this->table)->where("periodo", $periodo)->update($datos);
        return $this->db->affectedRows();
    }

}
