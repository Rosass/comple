<?php namespace App\Models\Division;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [INSCRIPCIÓN]
 */
class InscripcionModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'inscripcion';


    public function getInscripciones()
	{   

        return $this->db->table("inscripcion i")
        ->select("i.id_inscripcion, i.estatus, i.num_control, i.periodo, p.descripcion AS 'descripcion_periodo', i.telefono, i.fecha_inscripcion, i.nota,
                i.id_actividad, act.nombre_actividad")
        ->join("periodo p", "p.periodo = i.periodo")
        ->join("actividad act", "act.id_actividad = i.id_actividad")
        ->orderBy("p.fecha_inicio", "ASC")
        ->orderBy("i.fecha_inscripcion", "DESC")
        ->where("p.estatus", true)
        ->get()->getResult();
    }

    public function getActividadPorIdareaPeriodo($periodo)
	{   
        return $this->db->table("inscripcion i")
        ->select("i.id_inscripcion, i.estatus, i.num_control, i.periodo, p.descripcion AS 'descripcion_periodo', i.telefono, i.fecha_inscripcion, i.nota,
                i.id_actividad, act.nombre_actividad")
        ->join("periodo p", "p.periodo = i.periodo")
        ->join("actividad act", "act.id_actividad = i.id_actividad")
        ->orderBy("p.fecha_inicio", "ASC")
        ->orderBy("i.fecha_inscripcion", "DESC")
        ->where("i.periodo", $periodo)
        ->get()->getResult();
    }

    
    public function getInscripcionesPorActividadYEstatus($id_actividad)
	{   
        return $this->db->table("inscripcion i")
        ->select("i.id_inscripcion, i.estatus, i.num_control, i.periodo, p.descripcion AS 'descripcion_periodo', i.telefono, i.fecha_inscripcion, i.nota,
                i.id_actividad, act.nombre_actividad")
        ->join("periodo p", "p.periodo = i.periodo")
        ->join("actividad act", "act.id_actividad = i.id_actividad")
        ->where(" i.id_actividad", $id_actividad)
        ->get()->getResult();
    }

    public function getPeriodo()
    {
        return $this->db->table('periodo')
        ->select("*")
        ->orderBy("periodo", "ASC")
        ->get()->getResult();
    }

    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function actualizar( $id_inscripcion, $datos)
    {
        $this->db->table($this->table)
        ->where("id_inscripcion", $id_inscripcion)
       // ->where("estatus", true)
        ->update($datos);
        return $this->db->affectedRows();
    }

    public function getInscripcionPorId($id_inscripcion)
	{   
        return $this->db->table($this->table)
        ->select("*")
        ->where("id_inscripcion", $id_inscripcion)
        //->where("estatus", true)
        ->get()->getRow();
    }

    public function getInscripcionPorNoControlPeriodoYActividad($num_control, $periodo, $id_actividad)
    {
        return $this->db->table($this->table)
        ->select("*")
        ->where("num_control", $num_control)
        ->where("periodo", $periodo)
        ->where("id_actividad", $id_actividad)
       // ->where("estatus", true)
        ->get()->getResult();
    }

    public function get_alumno( $no_control)
    {
        $db_alumnos = db_connect('alumnos_db');
        return $db_alumnos->table('alumnos')
                    ->select('num_control, nombre, ap_paterno, ap_materno')
                    ->where("num_control", $no_control)
                    ->get()->getRow();
    }

    //* ====================================================
    //* consulta de select periodo por actividad-------para modal de agregar 
    public function get_actividad_por_periodo( $periodo )
    {
        return $this->db->table("actividad")
        ->select("id_actividad, nombre_actividad")
        ->where("periodo", $periodo)
        ->get()->getResult();
    }

    //* ====================================================
    //* consulta de select periodo por actividad-----para select de lista
    public function get_actividad_por_periodo1( $periodo )
    {
        return $this->db->table("actividad")
        ->select("id_actividad, nombre_actividad")
        ->where("periodo", $periodo)
        ->get()->getResult();
    }

}