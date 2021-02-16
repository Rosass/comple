<?php
namespace App\Services\Escolares;

class CambiarService
{

    protected $cambiarModel;
    protected $session;

    function __construct()
    {
        $this->cambiarModel = new \App\Models\Escolares\CambiarModel();
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
    public function actualizar($usuario, $datos)
    {
        if ($this->cambiarModel->actualizar($usuario, $datos))
            return ["exito" => true, "msj" => "Datos actualizados con exito."];
        else
            return ["exito" => false, "msj" => "No se actualizó ningun campo."];
    }

    /**
     * Obtiene los datos de un responsables mediante su RFC
     * @return object
     */
    public function getUsuarioPorUsuario($usuario)
    {
        return $this->cambiarModel->getUsuarioPorUsuario($usuario);
    }

   
}