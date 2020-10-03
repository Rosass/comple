<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [RESPONSABLES]
 */
class AreaModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'area';

    public function getAreasPorEstatus($estatus)
	{   
        return $this->db->table($this->table)->select("*")->where("estatus", $estatus)->get()->getResult();
    }
}