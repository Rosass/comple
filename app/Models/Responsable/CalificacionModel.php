<?php namespace App\Models\Responsable;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class CalificacionModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'alumnos';
    

    public function getResponsable()
	{   
        
    }

    public function getResponsablePorRfc( $responsable )
    {
        return $this->db->table('responsable r')
                        ->select('r.rfc_responsable ')
                        ->where('rfc_responsable', $responsable)
                        ->get()->getResult();
    }
    public function getAlumnosPorRfc_responsable($num_control, $rfc_responsable )
    {
        return $this->db->table($this->table)
        ->select("*")
        ->where("num_control", $num_control)
        ->where("rfc_responsable", $rfc_responsable)
        ->get()->getResult();
    }

}
