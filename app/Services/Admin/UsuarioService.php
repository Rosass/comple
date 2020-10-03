<?php
namespace App\Services\Admin;

class UsuarioService
{

    protected $usuarioModel;
    protected $session;

    function __construct()
    {
        $this->usuarioModel = new \App\Models\Admin\UsuarioModel();
    }

    /**
     * Obtiene los responsables de la BD
     * @return object
     */
    public function getUsuarios()
	{   
       return $this->usuarioModel->getUsuarios();
    }

    /**
     * Obtiene los responsables por estatus de la BD
     * @return object
     */
    public function getUsuariosPorEstatus($estatus)
	{   
       return $this->usuarioModel->getUsuariosPorEstatus($estatus);
    }

    /**
     * Guarda un nuevo responsable en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        $usuario = $this->usuarioModel->getUsuarioPorUsuario($datos['usuario']);

        if($usuario == NULL)
        {
            if ($this->usuarioModel->guardar($datos))
                return ["exito" => true, "msj" => "Usuario agregado con exito."];
            else
                return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
        }
        else 
        {
            return ["exito" => false, "msj" => "El usuario <strong>" . $datos['usuario'] . "</strong> ya se encuentra registrado!."];
        }
       
    }

    /**
     * Actualiza los datos de un responsable en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($usuario, $datos)
    {
        if ($this->usuarioModel->actualizar($usuario, $datos))
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
        return $this->usuarioModel->getUsuarioPorUsuario($usuario);
    }

    public function cambiarEstatus($usuario)
    {
        $usuario = $this->usuarioModel->getUsuarioPorUsuario($usuario);

        $nuevo_estatus = ($usuario->estatus == true) ? false : true;
        $datos = [ 'estatus' => $nuevo_estatus ];
        return $this->actualizar($usuario->usuario, $datos);
    }
}