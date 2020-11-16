<?php
namespace App\Services\Responsable;

class AlumnoService
{

    protected $alumnoModel;
    protected $session;

    function __construct()
    {
        $this->alumnoModel = new \App\Models\Responsable\AlumnoModel();
    }

   

    /**
     * Guarda un nuevo responsable en la BD
     * @param array $datos
     * @return array
     */
    

    /**
     * Actualiza los datos de un responsable en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($rfc_responsable, $datos)
    {
        if ($this->alumnoModel->actualizar($rfc_responsable, $datos))
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
        return $this->alumnoModel->getResponsablePorRfc($rfc);
    }

   
}