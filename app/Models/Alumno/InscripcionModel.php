<?php namespace App\Models\Alumno;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class InscripcionModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'actividad';

    public function getActividadesPorAlumno(  )
    {
        return $this->db->table('actividad a')
                        ->select('a.id_actividad, a.nombre_actividad, a.id_tipo_actividad, a.creditos, a.horas, a.horario, t.nombre as tipo, r.nombre as nombre, r.apaterno as apaterno, r.amaterno as amaterno' )
                        ->join('tipo_actividad t' , 't.id_tipo_actividad = a.id_tipo_actividad','LEFT')
                        ->join('responsable r' , 'r.rfc_responsable = a.rfc_responsable','LEFT')
                        ->get()->getResult();
    }
  

}
