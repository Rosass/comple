<?php
namespace App\Services\Responsable;

class CalificacionService
{
    protected $calificacionModel;
    

    function __construct()
    {
        $this->calificacionModel = new \App\Models\Responsable\CalificacionModel();
    }

    public function get_actividad_alumno($id_actividad)
	{   
    return $this->calificacionModel->get_actividad_alumno($id_actividad);
    }
    

    public function total_hombres_mujeres( $id_actividad)
    {
        $alumnos = $this->calificacionModel->get_actividad_alumno( $id_actividad );
        $hombres = 0;
        $mujeres = 0;
        foreach ($alumnos as $alumno) {
            if ( $alumno['sexo'] === 'M' ) $hombres++;
            if ( $alumno['sexo'] === 'F' ) $mujeres++;
        }

        return array('hombres' => $hombres, 'mujeres' => $mujeres);
    }

    
}
