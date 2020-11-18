<?php namespace App\Models\Responsable;

use CodeIgniter\Model;

/**
 * Capa de datos para el modulo [INSCRIPCIÓN]
 */
class AsistenciaModel extends Model
{

    protected $returnType   = 'object';

    public function get_inscripciones( $id_actividad)
	{   
        return $this->db->table('inscripcion insc')
        ->select('insc.num_control, insc.id_inscripcion, act.nombre_actividad, e.valor_numerico as valor_numerico')
        ->join('actividad act', 'act.id_actividad = insc.id_actividad', 'INNER')
        ->join('evaluacion_desempenio e', 'e.id_inscripcion = insc.id_inscripcion', 'LEFT')
        ->where('act.id_actividad', $id_actividad)
        ->get()->getResult();
    }
    /** 
     * * 1- Obtener alumno con parametro  num_control
     * * 2. Crear nuevo metodo - Inicializar arreglo vacio
     * * 3.- Iterar sobre las incripciones 
     * * 4.- crear variable num_control
     * * 5.- Invocar get_alumnos con prametro num_control
     * * 6.- iterar sobre alumno
     * * 7.- cuardar datos de alumnos 
     * * 8.- Retornar nuevo arreglo
     * datos a jalar
     * *1.- num_control
     * *2.- Nombre y apellidos del alumno
     * *3.- carrera
     * *4.- semestre
     * *5.- calificacion pero este lo jalare despues por que me falta hacer esta vista
     * 
    */
    public function get_actividad_alumno ( $num_control )
    {
        $db_alumnos = db_connect('alumnos_db');
        return $db_alumnos->table('alumnos')
                    ->select('*')
                    ->where('num_control', $num_control )
                    ->get()->getResult();
    }

}