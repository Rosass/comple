<?php
namespace App\Services\Division;

class TipoActividadService
{

    protected $tipoActividadModel;

    function __construct()
    {
        $this->tipoActividadModel = new \App\Models\Division\TipoActividadModel();
    }

    /**
     * Obtiene los tipos de actividades de la BD
     * @return object
     */
    public function getTipos()
	{   
       return $this->tipoActividadModel->getTipos();
    }

    /**
     * Obtiene los tipos de actividades por estatus de la BD
     * @return object
     */
    public function getTiposPorEstatus($estatus)
	{   
       return $this->tipoActividadModel->getTiposPorEstatus($estatus);
    }

    /**
     * Guarda un nuevo tipo de actividad en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        if ($this->tipoActividadModel->guardar($datos))
            return ["exito" => true, "msj" => "Tipo de actividad agregado con exito."];
        else
            return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
    }

    /**
     * Obtiene los datos de un tipo de actividad mediante su ID
     * @return object
     */
    public function getTipoActividadPorId($id_tipo_actividad)
    {
        return $this->tipoActividadModel->getTipoActividadPorId($id_tipo_actividad);
    }

    /**
     * Actualiza los datos de un tipo de actividad en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($id_tipo_actividad, $datos)
    {
        if ($this->tipoActividadModel->actualizar($id_tipo_actividad, $datos))
            return ["exito" => true, "msj" => "Datos actualizados con exito."];
        else
            return ["exito" => false, "msj" => "No se actualizó ningun campo."];
    }

    public function cambiarEstatus($id_tipo_actividad)
    {
        $tipo_actividad = $this->tipoActividadModel->getTipoActividadPorId($id_tipo_actividad);

        $nuevo_estatus = ($tipo_actividad->estatus == true) ? false : true;
        $datos = [ 'estatus' => $nuevo_estatus ];
        return $this->actualizar($tipo_actividad->id_tipo_actividad, $datos);
    }

}