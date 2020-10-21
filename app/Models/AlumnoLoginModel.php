<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [AUTH]
 */
class AlumnoLoginModel extends Model
{
  protected $table = 'alumnos';
  protected $db_alumno;

  public function __construct()
  {
      $this->db_alumno = \Config\Database::connect('alumnos_db');
  }

  public function getAlumnoPorUsuario($alumno)
  {
      return $this->db_alumno->table($this->table)
          ->select('num_control, nip, nombre, ap_paterno, ap_materno, carrera')
          ->where('num_control', $alumno)
          ->get()->getRow();
  }

}
