<?php
namespace App\Services\Responsable;

class CalificacionService
{
    protected $calificacionModel;
    protected $alumnoModel;

    function __construct()
    {
       // $this->inicioModel = new \App\Models\Responsable\CalificacionModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getAlumnos($num_control)
	{   
       return $this->inicioModel->getAlumnos($num_control);
    }

    
    /**
     * Esta función une registros de 2 BD mediante el numero de control del alumno
     * @param $array1
     * @param $array2
     * @return array
     */
     function unirRegistros($alumnos)
    {
        if(count($alumnos) > 0)
        {
            for($r = 0; $r < count($alumnos); $r++)
            {
                $array1 = (array) $this->alumnoModel->getAlumnoPorNum_Control($alumnos[$r]->num_control);
                $array2 = (array) $alumnos[$r];
                $array_merge[$r] = (object) array_merge($array1, $array2);
            }
            return $array_merge;
        }
        else
        {
            return $alumnos;
        }
    } 
}
