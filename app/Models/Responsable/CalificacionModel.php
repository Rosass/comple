<?php namespace App\Models\Responsable;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [INSCRIPCIÓN]
 */
class CalificacionModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'alumnos';

    public function get_inscripciones()
	{   
        return $this->db->table('inscripcion')
                ->select('*')
                ->get()->getResult();
    }


    public function getAlumnos()
	{   
        return $this->db->table('alumnos')
        ->select('*')
        ->get()->getResult();
    }
    
}