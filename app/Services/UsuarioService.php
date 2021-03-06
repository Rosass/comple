<?php
namespace App\Services;

class UsuarioService
{

    protected $usuarioModel;
    protected $session;

    function __construct()
    {
        $this->usuarioModel = new \App\Models\UsuarioModel();
        $this->session = \Config\Services::session();
    }
    
    /**
     * Este metodo valida las credenciales del usuario
     * @return array
     */
    public function login($usuario, $clave)
    {
        $usuario_aux = $this->usuarioModel->getUsuarioPorUsuario($usuario);

        if($usuario_aux == null)
        {
            return ['exito' => false, 'msj' => 'Usuario o clave inválidos.', 'redirigir_a' => 'login'];
        }
        // si el usuario esta desactivado su estatus no dejara loguearse
        if ( $usuario_aux->estatus == 0 )
        {
            return ['exito' => false, 'msj' => 'Acceso denegado [USUARIO INHABILITADO].', 'redirigir_a' => 'login'];
        }

        if (password_verify($clave, $usuario_aux->clave) && $usuario_aux->estatus == true)
         
        {
            // Se crea la sesión
            $datos_sesion = ['usuario' => $usuario, 'login' => true, 'usuario_logueado' => $usuario_aux];
            $this->session->set($datos_sesion);

            if($usuario_aux->id_tipo_usuario == USUARIO_DIVISION)
            {
                return ['exito' => true, 'redirigir_a' => 'division/inscripciones'];
            }
            else if($usuario_aux->id_tipo_usuario == USUARIO_AREA)
            {
                return ['exito' => true, 'redirigir_a' => 'jefes/actividades'];
            }
            else if($usuario_aux->id_tipo_usuario == USUARIO_ADMIN)
            {
                return ['exito' => true, 'redirigir_a' => 'admin/jefes'];
            }
            else if($usuario_aux->id_tipo_usuario == USUARIO_ESCOLARES)
            {
                return ['exito' => true, 'redirigir_a' => 'escolares/inicio'];
            }
            else
            {
                return ['exito' => false, 'msj' => 'Acceso denegado.', 'redirigir_a' => 'login'];
            }
        }
        else 
        {
            return ['exito' => false, 'msj' => 'Usuario o clave inválidos.', 'redirigir_a' => 'login'];
        }
    }

    /**
     * Este metodo cierra la sesión
     * @return none
     */
    public function logout()
    {
        $session_items = array(
            'usuario',
            'login',
            'usuario_logueado',
        );
        $this->session->remove($session_items);
        $this->session->destroy();
    }

}