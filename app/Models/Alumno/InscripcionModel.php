<?php namespace App\Models\Alumno;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class InscripcionModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'actividad';

    public function getActividadesPorAlumno(  $true)
    {
        return $this->db->table('actividad a')
                        ->select('a.id_actividad, a.nombre_actividad, a.id_tipo_actividad, a.creditos, a.horas, a.horario, a.periodo, p.descripcion AS descripcion_periodo,t.nombre as tipo, r.nombre as nombre, r.apaterno as apaterno, r.amaterno as amaterno' )
                        ->join("periodo p", "p.periodo = a.periodo")
                        ->join('tipo_actividad t' , 't.id_tipo_actividad = a.id_tipo_actividad','LEFT')
                        ->join('responsable r' , 'r.rfc_responsable = a.rfc_responsable','LEFT')
                        ->where('p.estatus', $true)
                        ->get()->getResult();
    }

    public function getPeriodosPorEstatus($true)
	{   
            return $this->db->table('periodo p ')
            ->select("*")
            ->where('p.estatus',$true)
            ->get()->getRow();
    }

    public function getInscripcionPorAlumno($estatus)
	{    
        return $this->db->table("inscripcion i")
        ->select("i.id_inscripcion, i.num_control, i.periodo, p.descripcion AS 'descripcion_periodo', i.telefono, i.fecha_inscripcion,
            i.id_actividad, act.nombre_actividad")
        ->join("periodo p", "p.periodo = i.periodo")
        ->join("actividad act", "act.id_actividad = i.id_actividad")
        ->where("i.estatus", $estatus)
        ->get()->getResult();
    }

    public function guardar($datos)
    {
        $this->db->table('inscripcion')->insert($datos);
        return $this->db->affectedRows();
    }

    public function get_alumno( $num_control )
    {
        $db_alumnos = db_connect('alumnos_db');
        return $db_alumnos->table('alumnos')
                    ->select('*')
                    ->where('num_control', $num_control)
                    ->get()->getResult();
    }

    public function get_inscripcion($num_control, $periodo, $id_actividad)
    {
        return $this->db->table("inscripcion")
                        ->select('*')
                        ->where('num_control', $num_control)
                        ->where('periodo', $periodo)
                        ->where('id_actividad', $id_actividad)
                        ->where('estatus', 1)
                        ->get()->getResult();
    }

    public function get_creditos_actividad_inscripcion( $num_control, $periodo )
    {
        return $this->db->table('inscripcion i')
                        ->selectSum('act.creditos')
                        ->join('actividad act', 'act.id_actividad = i.id_actividad', 'INNER')
                        ->where('i.num_control', $num_control)
                        ->where('i.periodo', $periodo)
                        ->get()->getRow();
    }
    
    public function get_creditos_actividad( $id_actividad )
    {
        return $this->db->table('actividad')
                        ->select('creditos')
                        ->where('id_actividad', $id_actividad)
                        ->get()->getRow();
    }
    
    public function get_id_tipo_actividad( $id_actividad )
    {
        return $this->db->table('actividad')
                        ->select('id_tipo_actividad')
                        ->where('id_actividad', $id_actividad)
                        ->get()->getRow();
    }

    public function get_actividad_alumno_cultura_deportiva( $num_control, $periodo)
    {
        return $this->db->table('inscripcion i')
                        ->select('ta.id_tipo_actividad, ta.nombre')
                        ->join('actividad act', 'act.id_actividad = i.id_actividad', 'INNER')
                        ->join('tipo_actividad ta', 'act.id_tipo_actividad = ta.id_tipo_actividad', 'INNER')
                        ->where('i.num_control', $num_control)
                        ->where('i.periodo', $periodo)
                        ->where('(act.id_tipo_actividad = 2 OR act.id_tipo_actividad = 3)')
                        ->get()->getResult();
    }


}