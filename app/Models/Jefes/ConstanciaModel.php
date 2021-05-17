<?php namespace App\Models\Jefes;

 use CodeIgniter\Model;


class ConstanciaModel extends Model
{

    protected $returnType   = 'object';
    


    public function getAlumnoPorNoControl($no_control)
    {
        $db_alumnos = db_connect('alumnos_db');
        return $db_alumnos->table('alumnos')
                    ->select('*')
                    ->where('num_control', $no_control )
                    ->get()->getRow();
    } 

    public function getActividad( $control, $id_actividad )
    {
        return $this->db->table('inscripcion a')
                        ->select('a.id_inscripcion, j.nombre_jefe, j.apaterno_jefe, j.amaterno_jefe, a.id_actividad, a.periodo, a.estatus, a.fecha_inscripcion, p.descripcion as periodo_descripcion, p.frase_decreto as frase_decreto, 
                        ta.nombre_actividad as actividad, ta.creditos as credito, tac.nombre AS tipo_actividad, ta.horario as horario, 
                        e.valor_numerico as valor_numerico,e.nivel_desempeno as nivel, e.observaciones as observaciones,e.criterio1 as criterio1,e.criterio2 as criterio2,e.criterio3 as criterio3,e.criterio4 as criterio4,e.criterio5 as criterio5,e.criterio6 as criterio6,e.criterio7 as criterio7,r.nombre as nombre_responsable, r.apaterno as apaterno, r.amaterno as amaterno')
                        ->join('periodo p', 'p.periodo = a.periodo', 'LEFT')
                        ->join('actividad ta', 'ta.id_actividad = a.id_actividad', 'LEFT')
                        ->join('tipo_actividad tac', 'tac.id_tipo_actividad = ta.id_tipo_actividad', 'INNER')
                        ->join('evaluacion_desempenio e', 'e.id_inscripcion = a.id_inscripcion', 'LEFT')
                        ->join('responsable r', 'r.rfc_responsable = ta.rfc_responsable', 'INNER')
                        ->join('jefe j', 'j.rfc_jefe = ta.rfc_jefe_nofk', 'LEFT')
                        ->where('a.id_actividad',$id_actividad)
                        ->where('num_control',$control)
                        ->where('valor_numerico > 0')
                        ->get()->getResult();
    }

    public function getArea($id_area)
	{   
        return $this->db->table("area a")
            ->select("a.id_area, a.nombre_area, a.folio as folio_minutario")
            ->where("id_area", $id_area)
        ->get()->getResult();
    }

    public function getPeriodo()
    {
        return $this->db->table('periodo')
        ->select("*")
        ->orderBy("periodo", "ASC")
        ->get()->getResult();
    }

    
    
    
} 