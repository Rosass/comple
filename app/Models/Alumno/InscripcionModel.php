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
                        ->select('a.id_actividad, a.nombre_actividad, a.id_tipo_actividad, a.creditos, a.horas, a.horario, a.periodo, p.descripcion AS descripcion_periodo,t.nombre as tipo, r.nombre as nombre, r.apaterno as apaterno, r.amaterno as amaterno' )
                        ->join("periodo p", "p.periodo = a.periodo")
                        ->join('tipo_actividad t' , 't.id_tipo_actividad = a.id_tipo_actividad','LEFT')
                        ->join('responsable r' , 'r.rfc_responsable = a.rfc_responsable','LEFT')
                        ->get()->getResult();
    }

    public function get_periodo_activo()
    {
        return $this->table('periodo')
        ->select('*')
                ->where('estatus', 1)
                ->get()->getResult();
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
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }
    
    
    



}
