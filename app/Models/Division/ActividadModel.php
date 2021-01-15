<?php namespace App\Models\Division;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class ActividadModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'actividad';

    public function getActividades()
	{   
        
        return $this->db->table("actividad a")
            ->select("a.id_actividad, a.nombre_actividad, a.numero_dictamen, a.creditos, a.capacidad, ar.nombre_area, p.descripcion AS 'periodo_descripcion', p.estatus, ta.nombre AS 'tipo_actividad',
                    a.rfc_responsable, r.nombre AS 'nombre_responsable', r.apaterno AS 'apaterno_responsable', a.horas, a.horario, a.estatus")
            ->join('area ar', 'ar.id_area = a.id_area', 'LEFT')
            ->join('periodo p', 'p.periodo = a.periodo', 'LEFT')
            ->join('tipo_actividad ta', 'ta.id_tipo_actividad = a.id_tipo_actividad', 'LEFT')
            ->join('responsable r', 'r.rfc_responsable = a.rfc_responsable', 'LEFT')
            ->orderBy("p.fecha_inicio", "ASC")
            ->orderBy("a.nombre_actividad", "ASC")
            ->where("p.estatus", true)
            ->get()->getResult();
    }

    public function getActividadPorIdareaPeriodo($periodo)
	{   
        
        return $this->db->table("actividad a")
            ->select("a.id_actividad, a.nombre_actividad, a.numero_dictamen, a.creditos, a.capacidad, ar.nombre_area, p.descripcion AS 'periodo_descripcion', p.estatus, ta.nombre AS 'tipo_actividad',
                    a.rfc_responsable, r.nombre AS 'nombre_responsable', r.apaterno AS 'apaterno_responsable', a.horas, a.horario, a.estatus")
            ->join('area ar', 'ar.id_area = a.id_area', 'LEFT')
            ->join('periodo p', 'p.periodo = a.periodo', 'LEFT')
            ->join('tipo_actividad ta', 'ta.id_tipo_actividad = a.id_tipo_actividad', 'LEFT')
            ->join('responsable r', 'r.rfc_responsable = a.rfc_responsable', 'LEFT')
            ->orderBy("p.fecha_inicio", "ASC")
            ->orderBy("a.nombre_actividad", "ASC")
            ->where("a.periodo", $periodo)
            ->get()->getResult();
    }
    
    public function getPeriodo()
    {
        return $this->db->table('periodo')
        ->select("*")
        ->orderBy("periodo", "ASC")
        ->get()->getResult();
    }
    
    public function getActividadesPorEstatus($estatus)
	{   
        return $this->db->table("actividad a")
        ->select("a.id_actividad, a.nombre_actividad, a.estatus, p.estatus")
        ->join('periodo p', 'p.periodo = a.periodo', 'LEFT')
        ->where("p.estatus", true)
        ->orderBy("a.nombre_actividad", "ASC")
        ->where("a.estatus", $estatus)
        ->get()->getResult();
    }

    //para select de periodo

/*     public function getPeriodoPorEstatus($estatus)
	{   
        return $this->db->table("periodo p")
        ->select("*")
       
        ->where("estatus", $estatus)
        ->get()->getResult();
    } */


    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function actualizar( $id_actividad, $datos)
    {
        $this->db->table($this->table)->where("id_actividad", $id_actividad)->update($datos);
        return $this->db->affectedRows();
    }

    public function getActividadPorId($id_actividad)
	{   
        return $this->db->table($this->table)->select("*")->where("id_actividad", $id_actividad)->get()->getRow();
    }

    public function getActividadPorNombre($nombre)
    {
        return $this->db->table($this->table)->select("*")->where("nombre_actividad", $nombre)->get()->getRow();
    }

    public function get_alumno( $num_control )
    {
        $db_alumnos = db_connect('alumnos_db');
        return $db_alumnos->table('alumnos')
                    ->select('*')
                    ->where('num_control', $num_control )
                    ->get()->getResult();
    }

    public function get_inscripciones( $id_actividad, $estatus)
	{   
        return $this->db->table('inscripcion insc')
        ->select('insc.num_control, insc.estatus, insc.id_inscripcion, insc.telefono, act.id_actividad, act.nombre_actividad, e.valor_numerico as valor_numerico, e.nivel_desempeno as nivel_desempeno')
        ->join('actividad act', 'act.id_actividad = insc.id_actividad', 'INNER')
        ->join('evaluacion_desempenio e', 'e.id_inscripcion = insc.id_inscripcion', 'LEFT')
        ->where('act.id_actividad', $id_actividad)
        ->where('insc.estatus', $estatus)
        ->get()->getResult();
    }

    public function get_inscripcionesPorEstatus()
	{   
        return $this->db->table('inscripcion')
        ->select('*')
        ->get()->getResult();
    }

    public function get_actividadd( $id_actividad )
    {
        return $this->db->table('actividad a')
                    ->select('a.id_actividad,a.nombre_actividad, p.descripcion as descripcion')
                    ->join('periodo p', 'p.periodo = a.periodo', 'INNER')
                    ->where('id_actividad', $id_actividad )
                    ->get()->getResult();
    }

    public function get_actividad_alumno( $id_actividad, $estatus)
    {
        $newArray = array();
        $actividad = $this->get_inscripciones( $id_actividad,$estatus );
        foreach( $actividad as $act ) {
            $num_control = $act->num_control;
            $id_inscripcion = $act->id_inscripcion;
            $estatus=$act->estatus;


            $alumno = $this->get_alumno( $num_control );
            foreach( $alumno as $alm ) {
                $resp = array(
                    'id_inscripcion' => $id_inscripcion,
                    'actividad' => $act->nombre_actividad,
                    'num_control' => $num_control,
                    'nombre' => $alm->nombre,
                    'ap_paterno' => $alm->ap_paterno,
                    'ap_materno' => $alm->ap_materno,
                    'carrera' => $alm->carrera,
                    'semestre' => $alm->semestre,
                    'valor_numerico' =>$act->valor_numerico,
                    'nivel_desempeno' =>$act->nivel_desempeno,
                    'telefono' =>$act->telefono,
                    'estatus'=>$act->estatus,
                );
                array_push($newArray, $resp);
            }

        }
        return $newArray;
    }

}
