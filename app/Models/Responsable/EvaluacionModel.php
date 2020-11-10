<?php namespace App\Models\Responsable;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class EvaluacionModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'evaluacion_desempenio';

    public function getEvaluacion_desempenioPorId()
	{   
        /*SELECT a.id_actividad, a.nombre_actividad, a.numero_dictamen, a.creditos, a.capacidad, ar.nombre_area, p.descripcion AS 'periodo_descripcion', ta.nombre AS 'tipo_actividad',
		 a.rfc_responsable, r.nombre AS 'nombre_responsable', r.apaterno AS 'apaterno_responsable', a.horas, a.horario
        FROM actividad a
        INNER JOIN area ar ON ar.id_area = a.id_area
        inner JOIN periodo p ON p.periodo = a.periodo
        INNER JOIN tipo_actividad ta ON ta.id_tipo_actividad = a.id_tipo_actividad
        INNER JOIN responsable r ON r.rfc_responsable = a.rfc_responsable;*/
        return $this->db->table("evaluacion_desempenio ed")
            ->select("ed.id_inscripcion, ed.criterio1, ed.criterio2, ed.criterio3, ed.criterio4, ed.criterio5, ed.criterio6, ed.criterio7, ed.observaciones, ed.valor_numerico")
            ->orderBy("ed.id_inscripcion", "ASC")
            ->get()->getResult();
    }

    public function getinscripcionPorNum_control($num_control)
	{   
        return $this->db->table($this->table)->select("*")->where("id_inscripcion", $num_control)->get()->getRow();
    }

    public function getEvaluacionPorId($id_inscripcion)
    {
        return $this->db->table($this->table)->select("*")->where("id_inscripcion", $id_inscripcion)->get()->getRow();
    }

}
