<?php
namespace App\Services\Division;

class PeriodoService
{

    protected $periodoModel;

    function __construct()
    {
        $this->periodoModel = new \App\Models\Division\PeriodoModel();
    }

    /**
     * Obtiene los periodos de la BD
     * @return object
     */
    public function getPeriodos()
	{   
       return $this->periodoModel->getPeriodos();
    }

    /**
     * Obtiene los periodos por estatus de la BD
     * @return object
     */
    public function getPeriodosPorEstatus($estatus)
	{   
       return $this->periodoModel->getPeriodosPorEstatus($estatus);
    }

    /**
     * Guarda un nuevo periodo en la BD
     * @param array $datos
     * @return array
     */
    public function guardar($datos)
    {

        if($datos['periodo'] == ENE_JUN || $datos['periodo'] == VERANO || $datos['periodo'] == AGO_DIC)
        {
            $existe = $this->periodoModel->getPeriodoPorPeriodo($datos['periodo']);

            if($existe != NULL)
            {
                return ["exito" => false, "msj" => "El periodo <strong>" . $datos['periodo'] ."</strong> ya existe!."];
            }
                
            if ($this->periodoModel->guardar($datos))
            {
                return ["exito" => true, "msj" => "Periodo agregado con exito."];
            }
            else
            {
                return ["exito" => false, "msj" => "Algo salio mal, intentalo de nuevo."];
            }
        }
        else
        {
            return ["exito" => false, "msj" => "Periodo no válido!."];
        }
    }

    /**
     * Obtiene los datos de un tipo de actividad mediante su ID
     * @return object
     */
    public function getPeriodoPorPeriodo($periodo)
    {
        return $this->periodoModel->getPeriodoPorPeriodo($periodo);
    }

    /**
     * Actualiza los datos de un tipo de actividad en la BD
     * @param array $datos
     * @return array
     */
    public function actualizar($periodo, $datos)
    {
        if ($this->periodoModel->actualizar($periodo, $datos))
            return ["exito" => true, "msj" => "Datos actualizados con exito."];
        else
            return ["exito" => false, "msj" => "No se actualizó ningun campo."];
    }

    public function cambiarEstatus($periodo)
    {
        $periodo = $this->periodoModel->getPeriodoPorPeriodo($periodo);

        $nuevo_estatus = ($periodo->estatus == true) ? false : true;
        $datos = [ 'estatus' => $nuevo_estatus ];
        return $this->actualizar($periodo->periodo, $datos);
    }

}