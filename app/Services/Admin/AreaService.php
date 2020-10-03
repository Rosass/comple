<?php
namespace App\Services\Admin;

class AreaService
{

    protected $areaModel;

    function __construct()
    {
        $this->areaModel = new \App\Models\Admin\AreaModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getAreas()
	{   
       return $this->areaModel->getAreas();
    }

    /**
     * Obtiene las actividades por estatus de la BD
     * @return object
     */
    public function getAreasPorEstatus($estatus)
	{   
       return $this->areaModel->getAreasPorEstatus($estatus);
    }

    /**
     * Guarda una nueva actividad en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        $area = $this->areaModel->getAreaPorNombre($datos['nombre_area']);

        if($area == NULL)
        {
            if ($this->areaModel->guardar($datos))
                return ["exito" => true, "msj" => "Area agregada con exito."];
            else
                return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
        }
        else 
        {
            return ["exito" => false, "msj" => "El area <strong>" . $datos['nombre_area'] . "</strong> ya se encuentra registrada!."];
        }
    }

    /**
     * Actualiza los datos de un responsable en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($id_area, $datos)
    {
        $area = $this->areaModel->getAreaPorId($id_area);

        if($area != NULL)
        {
            if ($this->areaModel->actualizar($id_area, $datos))
                return ["exito" => true, "msj" => "Datos actualizados con exito."];
            else
                return ["exito" => false, "msj" => "No se actualizó ningun campo."];
        }
        else 
        {
            return ["exito" => false, "msj" => "Id de area no válido!."];
        }
       
    }

    public function cambiarEstatus($id_area)
    {
        $area = $this->areaModel->getAreaPorId($id_area);

        $nuevo_estatus = ($area->estatus == true) ? false : true;
        $datos = [ 'estatus' => $nuevo_estatus ];
        return $this->actualizar($area->id_area, $datos);
    }

    public function getAreaPorId($id_area)
    {
        return $this->areaModel->getAreaPorId($id_area);
    }
}