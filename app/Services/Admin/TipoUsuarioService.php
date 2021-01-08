<?php
namespace App\Services\Admin;

class TipoUsuarioService
{

    protected $tipoUsuarioModel;

    function __construct()
    {
        $this->tipoUsuarioModel = new \App\Models\Admin\TipoUsuarioModel();
    }

    /**
     * Obtiene los tipos de actividades de la BD
     * @return object
     */
    public function getTipos()
	{   
    return $this->tipoUsuarioModel->getTipos();
    }
    public function getTipo()
	{   
    return $this->tipoUsuarioModel->getTipo();
    }

    /**
     * Obtiene los tipos de actividades por estatus de la BD
     * @return object
     */
    public function getTiposPorEstatus($estatus)
	{   
    return $this->tipoUsuarioModel->getTiposPorEstatus($estatus);
    }

    public function getTipoUsuario_Id($id_tipo_usuario)
	{   
    return $this->tipoUsuarioModel->getTipoUsuario_Id($id_tipo_usuario);
    
    }

    
    /**
     * Guarda un nuevo tipo de actividad en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        if ($this->tipoUsuarioModel->guardar($datos))
            return ["exito" => true, "msj" => "Tipo de usuario agregado con exito."];
        else
            return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
    }

    /**
     * Obtiene los datos de un tipo de actividad mediante su ID
     * @return object
     */
    public function getTipoUsuarioPorId($id_tipo_usuario)
    {
        return $this->tipoUsuarioModel->getTipoUsuarioPorId($id_tipo_usuario);
    }

    /**
     * Actualiza los datos de un tipo de actividad en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($id_tipo_usuario, $datos)
    {
        if ($this->tipoUsuarioModel->actualizar($id_tipo_usuario, $datos))
            return ["exito" => true, "msj" => "Datos actualizados con exito."];
        else
            return ["exito" => false, "msj" => "No se actualizó ningun campo."];
    }

    public function cambiarEstatus($id_tipo_usuario)
    {
        $tipo_usuario = $this->tipoUsuarioModel->getTipoUsuarioPorId($id_tipo_usuario);

        $nuevo_estatus = ($tipo_usuario->estatus == true) ? false : true;
        $datos = [ 'estatus' => $nuevo_estatus ];
        return $this->actualizar($tipo_usuario->id_tipo_usuario, $datos);
    }

}