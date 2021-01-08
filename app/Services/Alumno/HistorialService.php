<?php
namespace App\Services\Alumno;

class HistorialService
{

    protected $HistorialModel;

    function __construct()
    {
        $this->historialModel = new \App\Models\Alumno\HistorialModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividadesPorCalificacion($alumnos)
	{
        return $this->historialModel->getActividadesPorCalificacion($alumnos); // este muestra los calificados
    }

      public function get_actividad_alumno($id_actividad, $true)
	{   
       return $this->historialModel->get_actividad_alumno($id_actividad, $true);
    }

    public function getActividades($alumnos)
	{
        return $this->historialModel->getActividades($alumnos); // este muestra los calificados
    }

    public function getActividades_no_calificadas($alumnos) // no calificados
	{
        $calificados = $this->historialModel->getActividadesPorCalificacion($alumnos);
        $actividades = $this->historialModel->getActividadesPorAlumno( $alumnos );
        $no_calificados = array();
        foreach ($actividades as $actividad) {
            $nuevo = array(
                'periodo' => $actividad->periodo_descripcion,
                'actividad' => $actividad->actividad,
                'tipo_actividad' => $actividad->tipo_actividad,
                'credito' => $actividad->credito,
                'nombre' => $actividad->nombre,
                'apaterno' => $actividad->apaterno,
                'amaterno' => $actividad->amaterno,
                'horario' => $actividad->horario,
                'estatus' => $actividad->estatus,
                
            );
            array_push( $no_calificados, $nuevo );
        }

        if ( $calificados ){
            foreach ($actividades as $key => $actividad) {
                foreach ($calificados as $calificado) {
                    if ( $actividad->id_inscripcion == $calificado->id_inscripcion ) {
                        unset( $no_calificados[$key]);
                    }
                }
            }
            return $no_calificados;
        }
        else
        {
            return $no_calificados;
        }
    }
}