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
    public function login($responsable, $clave)
    {
        $responsable_aux = $this->responsableModel->getResponsablePorUsuario($responsable);

        if($responsable_aux == null)
        {
            return ['exito' => false, 'msj' => 'RFC o clave inválidos.', 'redirigir_a' => 'loginresponsable'];
        }

        if (password_verify($clave, $responsable_aux->clave))
        {
            // Se crea la sesión
            $datos_sesion = ['rfc_responsable' => $responsable, 'loginresponsable' => true, 'usuario_logueado' => $responsable_aux];
            $this->session->set($datos_sesion);

            if($responsable_aux)
            {
                return ['exito' => true, 'redirigir_a' => 'responsables/inicio'];
            }    
            else
            {
                return ['exito' => false, 'msj' => 'Acceso denegado.', 'redirigir_a' => 'loginresponsable'];
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