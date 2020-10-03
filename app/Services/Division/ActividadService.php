<?php
namespace App\Services\Division;

class ActividadService
{

    protected $actividadModel;

    function __construct()
    {
        $this->actividadModel = new \App\Models\Division\ActividadModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividades()
	{   
       return $this->actividadModel->getActividades();
    }

    /**
     * Obtiene las actividades por estatus de la BD
     * @return object
     */
    public function getActividadesPorEstatus($estatus)
	{   
       return $this->actividadModel->getActividadesPorEstatus($estatus);
    }

    /**
     * Guarda una nueva actividad en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        $actividad = $this->actividadModel->getActividadPorNombre($datos['nombre_actividad']);

        if($actividad == NULL)
        {
            if ($this->actividadModel->guardar($datos))
                return ["exito" => true, "msj" => "Actividad agregada con exito."];
            else
                return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
        }
        else 
        {
            return ["exito" => false, "msj" => "La actividad <strong>" . $datos['nombre_actividad'] . "</strong> ya se encuentra registrada!."];
        }
    }

    /**
     * Actualiza los datos de un responsable en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($id_actividad, $datos)
    {
        $actividad = $this->actividadModel->getActividadPorId($id_actividad);

        if($actividad != NULL)
        {
            if ($this->actividadModel->actualizar($id_actividad, $datos))
                return ["exito" => true, "msj" => "Datos actualizados con exito."];
            else
                return ["exito" => false, "msj" => "No se actualizó ningun campo."];
        }
        else 
        {
            return ["exito" => false, "msj" => "Id de actividad no válido!."];
        }
       
    }

    public function cambiarEstatus($id_actividad)
    {
        $actividad = $this->actividadModel->getActividadPorId($id_actividad);

        $nuevo_estatus = ($actividad->estatus == true) ? false : true;
        $datos = [ 'estatus' => $nuevo_estatus ];
        return $this->actualizar($actividad->id_actividad, $datos);
    }

    public function getActividadPorId($id_actividad)
    {
        return $this->actividadModel->getActividadPorId($id_actividad);
    }
}