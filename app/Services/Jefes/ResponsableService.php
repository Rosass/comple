<?php
namespace App\Services\Jefes;

class ResponsableService
{

    protected $responsableModel;
    protected $session;

    function __construct()
    {
        $this->responsableModel = new \App\Models\Jefes\ResponsableModel();
    }

    /**
     * Obtiene los responsables de la BD
     * @return object
     */
    public function getResponsables($id_area, $true)
	{   
        $responsables = $this->responsableModel->getResponsables($id_area, $true);
        $newResponsable = array();
            foreach( $responsables as $key => $responsable )
            {
                if ( !in_array($responsable, $newResponsable))
                {
                    array_push($newResponsable, $responsable);
                }
            }
        return $newResponsable;
    }
    public function getActividadPorIdareaPeriodo($id_area, $periodo)
	{   
        return $this->responsableModel->getActividadPorIdareaPeriodo($id_area, $periodo);
    }

    /**
     * Obtiene los responsables por estatus de la BD
     * @return object
     */
    public function getResponsablesPorEstatus($estatus)
	{   
        return $this->responsableModel->getResponsablesPorEstatus($estatus);
    }

    public function getPeriodo()
	{   
    return $this->responsableModel->getPeriodo();
    }


    /**
     * Guarda un nuevo responsable en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        $responsable = $this->responsableModel->getResponsablePorRfc($datos['rfc_responsable']);

        if($responsable == NULL)
        {
            if ($this->responsableModel->guardar($datos))
                return ["exito" => true, "msj" => "Responsable agregado con exito."];
            else
                return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
        }
        else 
        {
            return ["exito" => false, "msj" => "El responsable <strong>" . $datos['rfc_responsable'] . "</strong> ya se encuentra registrado!."];
        }
    }

    /**
     * Actualiza los datos de un responsable en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($rfc_responsable, $datos)
    {
        if ($this->responsableModel->actualizar($rfc_responsable, $datos))
            return ["exito" => true, "msj" => "Datos actualizados con exito."];
        else
            return ["exito" => false, "msj" => "No se actualizó ningun campo."];
    }

    /**
     * Obtiene los datos de un responsables mediante su RFC
     * @return object
     */
    public function getResponsablePorRfc($rfc)
    {
        return $this->responsableModel->getResponsablePorRfc($rfc);
    }

    public function cambiarEstatus($rfc_responsable)
    {
        $responsable = $this->responsableModel->getResponsablePorRfc($rfc_responsable);

        $nuevo_estatus = ($responsable->estatus == true) ? false : true;
        $datos = [ 'estatus' => $nuevo_estatus ];
        return $this->actualizar($responsable->rfc_responsable, $datos);
    }
}