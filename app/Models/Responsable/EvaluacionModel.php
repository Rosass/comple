<?php namespace App\Models\Responsable;

use CodeIgniter\Model;
 
/**
 * Capa de datos para el modulo [ACTIVIDADES]
 */
class EvaluacionModel extends Model
{

    protected $returnType   = 'object';
    protected $table = 'evaluacion_desempenio';

    public function get_evaluacion_desempenio($id_inscripcion)
	{

        return $this->db->table("evaluacion_desempenio ed")
            ->select("ed.id_inscripcion, ed.criterio1, ed.criterio2, ed.criterio3, ed.criterio4, ed.criterio5, ed.criterio6, ed.criterio7, ed.observaciones, ed.valor_numerico, ed.nivel_desempenio")
            ->join('inscripcion i', 'i.id_inscripcion = ed.id_inscripcion', 'INNER')
            ->where('i.id_inscripcion', $id_inscripcion)
            ->get()->getResult();
    }

    public function get_alumno( $num_control )
    {
        $db_alumnos = db_connect('alumnos_db');
        return $db_alumnos->table('alumnos')
                    ->select('*')
                    ->where('num_control', $num_control )
                    ->get()->getResult();
    }

    public function get_evaluacion_alumno( $num_control)
    {
        $newArray = array();
        $evaluacion_desempenio = $this->get_evaluacion_desempenio( $num_control );
        foreach( $evaluacion_desempenio as $ed ) {
            $num_control = $ed->num_control;
            $alumno = $this->get_alumno( $num_control );
            foreach( $alumno as $alm ) {
                $resp = array(
                    'evaluacion_desempenio' => $ed->id_inscripcion,
                    'num_control' => $num_control,
                    'nombre' => $alm->nombre,
                    'ap_paterno' => $alm->ap_paterno,
                    'ap_materno' => $alm->ap_materno,
                    //'valor_numerico' =>$act->valor_numerico
                );
                array_push($newArray, $resp);
            }
        }
        return $newArray;
    }

    public function guardar($datos)
    {
        $this->db->table($this->table)->insert($datos);
        return $this->db->affectedRows();
    }

    public function esta_calificado( $id_inscripcion )
    {
        return $this->db->table("evaluacion_desempenio")
                    ->select('id_inscripcion')
                    ->where('id_inscripcion', $id_inscripcion )
                    ->get()->getResult();
    }

}