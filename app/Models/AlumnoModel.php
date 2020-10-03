<?php namespace App\Models;

use CodeIgniter\Model;

class AlumnoModel extends Model
{
    protected $table = 'alumnos';
    protected $db_alumno;

    public function __construct()
    {
        $this->db_alumno = \Config\Database::connect('alumnos_db');
    }
  
    public function getAlumnoPorNoControl($no_control)
    {
        return $this->db_alumno
            ->table($this->table)
            ->select('num_control, nombre, ap_paterno, ap_materno, carrera, semestre')
            ->where('num_control', $no_control)
            ->get()->getRow();
    }
    
}