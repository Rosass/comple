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
        /*SELECT a.id_actividad, a.nombre_actividad, a.numero_dictamen, a.creditos, a.capacidad, ar.nombre_area, p.descripcion AS 'periodo_descripcion', ta.nombre AS 'tipo_actividad',
		 a.rfc_responsable, r.nombre AS 'nombre_responsable', r.apaterno AS 'apaterno_responsable', a.horas, a.horario
        FROM actividad a
        INNER JOIN area ar ON ar.id_area = a.id_area
        inner JOIN periodo p ON p.periodo = a.periodo
        INNER JOIN tipo_actividad ta ON ta.id_tipo_actividad = a.id_tipo_actividad
        INNER JOIN responsable r ON r.rfc_responsable = a.rfc_responsable;*/
        return $this->db->table("actividad a")
            ->select("a.id_actividad, a.nombre_actividad, a.numero_dictamen, a.creditos, a.capacidad, ar.nombre_area, p.descripcion AS 'periodo_descripcion', ta.nombre AS 'tipo_actividad',
                      a.rfc_responsable, r.nombre AS 'nombre_responsable', r.apaterno AS 'apaterno_responsable', a.horas, a.horario, a.estatus")
            ->join('area ar', 'ar.id_area = a.id_area', 'LEFT')
            ->join('periodo p', 'p.periodo = a.periodo', 'LEFT')
            ->join('tipo_actividad ta', 'ta.id_tipo_actividad = a.id_tipo_actividad', 'LEFT')
            ->join('responsable r', 'r.rfc_responsable = a.rfc_responsable', 'LEFT')
            ->orderBy("a.nombre_actividad", "ASC")
            ->get()->getResult();
    }

    public function getActividadesPorEstatus($estatus)
	{   
        return $this->db->table($this->table)->select("*")->where("estatus", $estatus)->get()->getResult();
    }

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

}
