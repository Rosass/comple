<?php
namespace App\Services\Jefes;

class AreaService
{

    protected $areaModel;

    function __construct()
    {
        $this->areaModel = new \App\Models\Jefes\AreaModel();
    }

    /**
     * Obtiene las actividades de la BD
     * @return object
     */
    public function getActividadPorIdarea($id_area, $true)
	{   
        return $this->areaModel->getActividadPorIdarea($id_area, $true);
    }

    public function getActividadPorIdareaPeriodo($id_area, $perido)
	{   
        return $this->areaModel->getActividadPorIdareaPeriodo($id_area, $perido);
    }
    
    public function get_responsable_area_y_sin_asignar( $id_area, $true )
    {
        return $this->areaModel->get_responsable_area_y_sin_asignar( $id_area, $true);
    }

    public function get_responsable_area_y_sin_asignar1( $id_area )
    {
        return $this->areaModel->get_responsable_area_y_sin_asignar1( $id_area);
    }

    public function actualizar($id_actividad, $datos, $id_area)
    {
        $actividad = $this->areaModel->getActividadPorId($id_actividad, $id_area);

        if($actividad != NULL)
        {
            if ($this->areaModel->actualizar($id_actividad, $datos))
                    return ["exito" => true, "msj" => "Datos actualizados con exito."];
                else
                    return ["exito" => false, "msj" => "No se actualizó ningun campo."];
        }
        else 
        {
            return ["exito" => false, "msj" => "Id de actividad no válido!."];
        }
    }

    public function getPeriodo()
	{   
    return $this->areaModel->getPeriodo();
    }

   /**
     * este es para editar el selct de responsable--
     * @param array $datos
     * @return array
     */
    public function actualiza($rfc_responsable, $datos)
    {
        {
            if ($this->areaModel->actualiza($rfc_responsable, $datos))
                return ["exito" => true, "msj" => "Datos actualizados con exito."];
            else
                return ["exito" => false, "msj" => "No se actualizó ningun campo."];
        }
    }
    

    public function getActividadPorId($id_actividad)
    {
        return $this->areaModel->getActividadId($id_actividad);
    }
}