<?php
namespace App\Services\Responsable;

class CalificacionService
{

    protected $alumnoModel;

    function __construct()
    {
        $this->inicioModel = new \App\Models\Responsable\CalificacionModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getResponsablePorRfc($responsable)
	{   
       return $this->inicioModel->getResponsablePorRfc($responsable);
    }

    
    /**
     * Esta función une registros de 2 BD mediante el numero de control del alumno
     * @param $array1
     * @param $array2
     * @return array
     */
   /*  function unirRegistros($responsable)
    {
        if(count($responsable) > 0)
        {
            for($r = 0; $r < count($responsable); $r++)
            {
                $array1 = (array) $this->alumnoModel->getAlumnoPorNoControl($responsable[$r]->num_control);
                $array2 = (array) $responsable[$r];
                $array_merge[$r] = (object) array_merge($array1, $array2);
            }
            return $array_merge;
        }
        else
        {
            return $responsable;
        }
    } */
}
