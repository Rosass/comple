<?php
namespace App\Services\Responsable;

class EvaluacionService
{
    protected $evaluacionModel;


    function __construct()
    {
        $this->evaluacionModel = new \App\Models\Responsable\EvaluacionModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getAlumnos($num_control)
	{
        return $this->evaluacionModel->getAlumnos($num_control);
    }

    /**
     *
    */
    public function guardar($datos)
    {
        if ( $this->evaluacionModel->esta_calificado( $datos['id_inscripcion'] ) ) {
            return ["exito" => false, "msj" => "El alumno ya tiene una calificación."];
        }

        if ($this->evaluacionModel->guardar($datos))
            return ["exito" => true, "msj" => "Calificación asignada exitosamente."];
        else
            return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
    }

}
