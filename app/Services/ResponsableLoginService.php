<?php
namespace App\Services;

class ResponsableLoginService
{

    protected $responsableModel;
    protected $session;

    function __construct()
    {
        $this->responsableModel = new \App\Models\ResponsableLoginModel();
        $this->session = \Config\Services::session();
    }

    /**
     * Este metodo valida las credenciales del usuario
     * @return array
     */
    public function login($rfc_responsable, $clave)
    {
        $responsable_aux = $this->responsableModel->getResponsablePorResponsable($rfc_responsable);

        if($responsable_aux == null)
        {
            return ['exito' => false, 'msj' => 'RFC o clave inválidos.', 'redirigir_a' => 'loginresponsable'];
        }

        if ( $responsable_aux->estatus == 0 )
        {
            return ['exito' => false, 'msj' => 'Acceso denegado [RESPONSABLE INHABILITADO].', 'redirigir_a' => 'login'];
        }

        if (password_verify($clave, $responsable_aux->clave) && $responsable_aux->estatus == true)
        {
            // Se crea la sesión
            $datos_sesion = ['rfc_responsable' => $rfc_responsable, 'loginresponsable' => true, 'usuario_logueado' => $responsable_aux];
            $this->session->set($datos_sesion);
   
            
            {
                return ['exito' => true, 'redirigir_a' => 'responsables/inicio'];
            }
        }
        else 
        {
            return ['exito' => false, 'msj' => 'RFC o clave inválidos.', 'redirigir_a' => 'loginresponsable'];
        }
    }

    /**
     * Este metodo cierra la sesión
     * @return none
     */
    public function logout()
    {
        $session_items = array(
            'rfc_responsable',
            'loginresponsable',
            'usuario_logueado',
        );
        $this->session->remove($session_items);
        $this->session->destroy();
    }

}