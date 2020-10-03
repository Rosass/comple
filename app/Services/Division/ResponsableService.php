<?php
namespace App\Services\Division;

class ResponsableService
{

    protected $responsableModel;
    protected $session;

    function __construct()
    {
        $this->responsableModel = new \App\Models\Division\ResponsableModel();
    }

    /**
     * Obtiene los responsables de la BD
     * @return object
     */
    public function getResponsables()
	{   
       return $this->responsableModel->getResponsables();
    }

    /**
     * Obtiene los responsables por estatus de la BD
     * @return object
     */
    public function getResponsablesPorEstatus($estatus)
	{   
       return $this->responsableModel->getResponsablesPorEstatus($estatus);
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