<?php namespace App\Models\Jefes;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class AreaModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'actividad';

    public function getActividadPorIdarea($id_area, $true)
	{   
        return $this->db->table('actividad a')
        ->select('a.id_area,a.id_actividad, a.nombre_actividad, a.rfc_responsable, a.numero_dictamen, a.creditos, a.periodo, a.horas, a.horario, a.estatus, p.descripcion as periodo_descripcion , ta.nombre as tipo_actividad, r.nombre as nombre_responsable, r.apaterno as apaterno, r.amaterno as amaterno')
        ->join('tipo_actividad ta', 'ta.id_tipo_actividad = a.id_tipo_actividad', 'INNER')
        ->join('periodo p', 'p.periodo = a.periodo', 'INNER')
        ->join('responsable r', 'r.rfc_responsable = a.rfc_responsable', 'LEFT')
        //->where('id_area', $id_area)
        ->where('p.estatus', $true)
        ->get()->getResult();
    }

    public function getActividadPorIdareaPeriodo($id_area, $periodo)
	{   
        return $this->db->table('actividad a')
        ->select('a.id_area,a.id_actividad, a.nombre_actividad, a.rfc_responsable, a.numero_dictamen, a.creditos, a.periodo, a.horas, a.horario, a.estatus, p.descripcion as periodo_descripcion , ta.nombre as tipo_actividad, r.nombre as nombre_responsable, r.apaterno as apaterno, r.amaterno as amaterno')
        ->join('tipo_actividad ta', 'ta.id_tipo_actividad = a.id_tipo_actividad', 'INNER')
        ->join('periodo p', 'p.periodo = a.periodo', 'INNER')
        ->join('responsable r', 'r.rfc_responsable = a.rfc_responsable', 'LEFT')
        ->where('id_area', $id_area)
        ->where('a.periodo', $periodo)
        ->get()->getResult();
    }
    public function get_responsable_area_y_sin_asignar($id_area)
	{   
        return $this->db->table('responsable r')
        ->select('r.id_area_fk, r.rfc_responsable, r.nombre, r.apaterno, r.amaterno, r.telefono, r.correo, r.fecha_registro, r.estatus')
        ->join('area a', 'a.id_area = r.id_area_fk', 'INNER')
        ->where('a.id_area', $id_area)->get()->getResult();
    }

    public function actualizar( $id_actividad, $datos)
    {
        $this->db->table('actividad')->where("id_actividad", $id_actividad)->update($datos);
        return $this->db->affectedRows();
    }

    public function getActividadPorId($id_actividad, $id_area)
	{   
        return $this->db->table('actividad')
                        ->select("*")
                        ->where("id_actividad", $id_actividad)
                        ->where("id_area", $id_area)
                        ->get()
                        ->getRow();
    }

    public function getPeriodo()
    {
        return $this->db->table('periodo')
        ->select("*")
        ->orderBy("periodo", "ASC")
        ->get()->getResult();
    }

    public function getActividadId($id_actividad)
	{   
        return $this->db->table($this->table)->select("*")->where("id_actividad", $id_actividad)->get()->getRow();
    }
    

}