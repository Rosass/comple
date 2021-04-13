<?php
namespace App\Services\Admin;

class TipoDepartamentoService
{

    protected $tipoDepartamentoModel;

    function __construct()
    {
        $this->tipoDepartamentoModel = new \App\Models\Admin\TipoDepartamentoModel();
    }

    /**
     * Obtiene los tipos de actividades de la BD
     * @return object
     */
    public function getTipos()
	{   
    return $this->tipoDepartamentoModel->getTipos();
    }

    public function getTipoDepartamento_Id($id_tipo_usuario)
	{   
    return $this->tipoUsuarioModel->getTipoDepartamento_Id($id_tipo_usuario);
    
    }

    
    /**
     * Guarda un nuevo tipo de actividad en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        if ($this->tipoDepartamentoModel->guardar($datos))
            return ["exito" => true, "msj" => "Tipo de departamento agregado con exito."];
        else
            return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
    }

    /**
     * Obtiene los datos de un tipo de actividad mediante su ID para editar
     * @return object
     */
    public function getTipoDepartamentoPorId($id)
    {
        return $this->tipoDepartamentoModel->getTipoDepartamentoPorId($id);
    }

    /**
     * Actualiza los datos de un tipo de actividad en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($id, $datos)
    {
        if ($this->tipoDepartamentoModel->actualizar($id, $datos))
            return ["exito" => true, "msj" => "Datos actualizados con exito."];
        else
            return ["exito" => false, "msj" => "No se actualizó ningun campo."];
    }

    public function cambiarEstatus($id)
    {
        $tipo_departamento = $this->tipoDepartamentoModel->getTipoDepartamentoPorId($id);

        $nuevo_estatus = ($tipo_departamento->estatus == true) ? false : true;
        $datos = [ 'estatus' => $nuevo_estatus ];
        return $this->actualizar($tipo_departamento->id, $datos);
    }

}