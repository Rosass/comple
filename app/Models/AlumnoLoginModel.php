<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [AUTH]
 */
class AlumnoLoginModel extends Model
{
  protected $table = 'alumnos a';
  protected $db_alumno;

  public function __construct()
  {
      $this->db_alumno = \Config\Database::connect('alumnos_db');
  }

  public function getAlumnoPorUsuario($num_control)
  {
      return $this->db_alumno->table($this->table)
          ->select('a.num_control, a.nip, a.nombre, a.ap_paterno, a.ap_materno, a.carrera')
          ->where('a.num_control', $num_control)
          ->get()->getRow();
  }

}
