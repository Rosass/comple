<?php
namespace App\Services\Admin;

class JefeService
{

    protected $jefeModel;
    protected $session;

    function __construct()
    {
        $this->jefeModel = new \App\Models\Admin\JefeModel();
    }

    /**
     * Obtiene los jefes de la BD
     * @return object
     */
    public function getJefes()
	{   
        return $this->jefeModel->getJefes();
    }

    /**
     * Obtiene los jefes por estatus de la BD
     * @return object
     */
    public function getJefesPorEstatus($estatus)
	{   
       return $this->jefeModel->getJefesPorEstatus($estatus);
    }

    /**
     * Guarda un nuevo jefe en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {
        $jefe = $this->jefeModel->getJefePorRfc($datos['rfc_jefe']);

        if($jefe == NULL)
        {
            if ($this->jefeModel->guardar($datos))
                return ["exito" => true, "msj" => "Jefe agregado con exito."];
            else
                return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
        }
        else 
        {
            return ["exito" => false, "msj" => "El jefe <strong>" . $datos['rfc_jefe'] . "</strong> ya se encuentra registrado!."];
        }
       
    }

    /**
     * Actualiza los datos de un jefe en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($rfc_jefe, $datos)
    {
        if ($this->jefeModel->actualizar($rfc_jefe, $datos))
            return ["exito" => true, "msj" => "Datos actualizados con exito."];
        else
            return ["exito" => false, "msj" => "No se actualizó ningun campo."];
    }

    /**
     * Obtiene los datos de un jefes mediante su RFC
     * @return object
     */

    public function getJefePorRfc($rfc)
    {
        return $this->jefeModel->getJefePorRfc($rfc);
    }

    public function cambiarEstatus($rfc_jefe)
    {
        $jefe = $this->jefeModel->getJefePorRfc($rfc_jefe);

        $nuevo_estatus = ($jefe->estatus == true) ? false : true;
        $datos = [ 'estatus' => $nuevo_estatus ];
        return $this->actualizar($jefe->rfc_jefe, $datos);
    }
}