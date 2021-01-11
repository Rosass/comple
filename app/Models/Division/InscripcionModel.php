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
        /*SELECT i.id_inscripcion, i.num_control, i.periodo, p.descripcion AS 'descripcion_periodo', i.fecha_inscripcion,
		 i.id_actividad, act.nombre_actividad
        FROM inscripcion i
        INNER JOIN periodo p ON p.periodo = i.periodo
        INNER JOIN actividad act ON act.id_actividad = i.id_actividad;*/
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
    
    public function getInscripcionesPorActividadYEstatus($id_actividad, $estatus)
	{   
        return $this->db->table("inscripcion i")
        ->select("i.id_inscripcion, i.estatus, i.num_control, i.periodo, p.descripcion AS 'descripcion_periodo', i.telefono, i.fecha_inscripcion, i.nota,
                  i.id_actividad, act.nombre_actividad")
        ->join("periodo p", "p.periodo = i.periodo")
        ->join("actividad act", "act.id_actividad = i.id_actividad")
        ->where(" i.id_actividad", $id_actividad)
        ->where("i.estatus", $estatus)
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

}