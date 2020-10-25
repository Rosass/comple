<?php namespace App\Models\Responsable;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class ActividadModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'actividad';

    public function getActividadesPorNombre()
	{   
        /*SELECT a.id_actividad, a.nombre_actividad, a.numero_dictamen, a.creditos, a.capacidad, ar.nombre_area, p.descripcion AS 'periodo_descripcion', ta.nombre AS 'tipo_actividad',
		 a.rfc_responsable, r.nombre AS 'nombre_responsable', r.apaterno AS 'apaterno_responsable', a.horas, a.horario
        FROM actividad a
        INNER JOIN area ar ON ar.id_area = a.id_area
        inner JOIN periodo p ON p.periodo = a.periodo
        INNER JOIN tipo_actividad ta ON ta.id_tipo_actividad = a.id_tipo_actividad
        INNER JOIN responsable r ON r.rfc_responsable = a.rfc_responsable;*/
        return $this->db->table("actividad a")
            ->select("a.id_actividad, a.nombre_actividad,")
            ->orderBy("a.nombre_actividad", "ASC")
            ->get()->getResult();
    }

    public function getActividadPorId($id_actividad)
	{   
        return $this->db->table($this->table)->select("*")->where("id_actividad", $id_actividad)->get()->getRow();
    }

    public function getActividadPorNombre($nombre)
    {
        return $this->db->table($this->table)->select("*")->where("nombre_actividad", $nombre)->get()->getRow();
    }

}
