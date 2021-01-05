<?php
namespace App\Services\Jefes;

class AlumnoService
{
    protected $alumnoModel;
    

    function __construct()
    {
        $this->alumnoModel = new \App\Models\Jefes\AlumnoModel();
    }


    public function get_actividad_alumno($id_actividad)
	{   
    return $this->alumnoModel->get_actividad_alumno($id_actividad);
    }
    

    public function total_hombres_mujeres( $id_actividad)
    {
        $alumnos = $this->alumnoModel->get_actividad_alumno( $id_actividad );
        $hombres = 0;
        $mujeres = 0;
        foreach ($alumnos as $alumno) {
            if ( $alumno['sexo'] === 'M' ) $hombres++;
            if ( $alumno['sexo'] === 'F' ) $mujeres++;
        }

        return array('hombres' => $hombres, 'mujeres' => $mujeres);
    }

    
}
