<?php
namespace App\Services;
class AlumnoLoginService
{
    protected $alumnoModel;
    protected $session;

    function __construct()
    {
        $this->alumnoModel = new \App\Models\AlumnoLoginModel();
        $this->session = \Config\Services::session();
    }
    /**
     * Este metodo valida las credenciales del usuario
     * @return array
     */
    public function login($alumno, $nip)
    {
        $alumno_aux = $this->alumnoModel->getAlumnoPorUsuario($alumno);

        if($alumno_aux == null)
        {
            return ['exito' => false, 'msj' => 'N. Control o nulo inválidos.', 'redirigir_a' => 'loginalumno'];
        }
        
        if ($alumno_aux->nip)
        {
            // Se crea la sesión
            $datos_sesion = ['num_control' => $alumno, 'loginalumno' => true, 'usuario_logueado' => $alumno_aux];
            $this->session->set($datos_sesion);

            if($alumno_aux)
            {
                return ['exito' => true, 'redirigir_a' => 'alumno/inicio'];
            }    
            else
            {
                return ['exito' => false, 'msj' => 'Acceso denegado.', 'redirigir_a' => 'loginalumno'];
            }
        }
        else 
        {
            return ['exito' => false, 'msj' => 'N. Control o nipp inválidos.', 'redirigir_a' => 'loginalumno'];
        }
    }
    /**
     * Este metodo cierra la sesión
     * @return none
     */
    public function logout()
    {
        $session_items = array(
            'num_control',
            'loginalumno',
            'usuario_logueado',
        );
        $this->session->remove($session_items);
        $this->session->destroy();
    }

}