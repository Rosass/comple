<?php namespace App\Services\Escolares;

class GenerarService
{

    protected $generarModel;

    function __construct()
    {
        $this->generarModel = new \App\Models\Escolares\GenerarModel();
    }

    
    public function getAlumnoPorNoControl($no_control)
	{   
        $alumno = $this->generarModel->getAlumnoPorNoControl($no_control);
        // $html = '';

        if (!empty($alumno))
        {
            return ['data' => $alumno];
        }
        else
        {
            return ['error' => "Alumno no encontrado!"];
        }
        
    }
    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividad($control)
	{   
    return $this->generarModel->getActividad($control);
    }
    public function calificacion($control)
	{   
    return $this->generarModel->calificacion($control);
    }
    public function calificacionRows($control)
	{   
    return $this->generarModel->calificacionRows($control);
    }

    public function guardar($datos)
    {
        if ( $this->generarModel->esta_calificado( $datos['id_inscripcion'] ) ) {
            return ["exito" => false, "msj" => "El alumno ya tiene una calificación."];
        }

        if ($this->generarModel->guardar($datos))
            return ["exito" => true, "msj" => "Calificación asignada exitosamente."];
        else
            return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
    }

} 