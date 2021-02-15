<?php namespace Config;

use CodeIgniter\Validation\Rules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\CreditCardRules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $responsableReglas = [
		'rfc'     => 'required|min_length[13]|max_length[13]',
		'nombre'     => 'required',
		'apaterno'     => 'required',
		'amaterno'     => 'required',
        'clave'     => 'required|min_length[8]',
		'confirmar_clave' => 'required|min_length[8]|matches[clave]',
		'telefono'     => 'min_length[10]|max_length[10]',
        'correo'        => 'valid_email'
	];

	public $editarResponsableReglas = [
		'rfc_responsable' => 'required',
		'nombre'     => 'required',
		'apaterno'     => 'required',
		'amaterno'     => 'required',
		'telefono'     => 'min_length[10]|max_length[10]',
        'correo'        => 'valid_email'
	];

	public $editarClaveReglas = [
		'clave'     => 'required|min_length[8]',
		'confirmar_clave' => 'required|min_length[8]|matches[clave]',
	];
	public $editar11ClaveReglas = [
		'clave'     => 'required|min_length[8]',
		'confirmar_clave' => 'required|min_length[8]|matches[clave]',
	];

	public $periodoReglas = [
		'periodo'     => 'required',
		//'descripcion'     => 'required',
		'fecha_inicio'     => 'required|valid_date',
		'fecha_final'     => 'required|valid_date',
		'fecha_inicio_inscripcion'     => 'required|valid_date',
		'fecha_final_inscripcion'     => 'required|valid_date',
		
	];

	public $actividadReglas = [
		'nombre'     => 'required',
		'creditos'     => 'required|numeric',
		'dictamen'     => 'required',
		'capacidad'     => 'required|numeric',
		'id_area'     => 'required|numeric',
        'periodo'     => 'required|numeric',
		'id_tipo_actividad' => 'required|numeric'
	];

	public $inscripcionReglas = [
		'num_control'     => 'required',
		'periodo'     => 'required|numeric',
		'id_actividad'     => 'required|numeric',
		//'telefono'     => 'required|min_length[10]|max_length[10]',
	];

	public $editarInscripcionReglas = [
		'id_inscripcion'     => 'required|numeric',
		'periodo'     => 'required|numeric',
		'id_actividad'     => 'required|numeric',
		//'telefono'     => 'required|min_length[10]|max_length[10]',
	];

	public $jefeReglas = [
		'rfc_jefe'     => 'required|min_length[13]|max_length[13]',
		'nombre_jefe'     => 'required',
		'apaterno_jefe'     => 'required',
		//'telefono_jefe'     => 'min_length[10]|max_length[10]',
        
	];

	public $editarJefeReglas = [
		'rfc_jefe'     => 'min_length[13]|max_length[13]',
		'nombre_jefe'     => 'required',
		'apaterno_jefe'     => 'required',
		//'telefono_jefe'     => 'min_length[10]|max_length[10]',
       
	];

	public $areaReglas = [
		'nombre_area'     => 'required',
		'rfc_jefe'     => 'required|min_length[13]|max_length[13]',
	];
	
	public $editarAreaReglas = [
		'nombre_area'     => 'required',
		'rfc_jefe'     => 'required|min_length[13]|max_length[13]',
	];

	public $usuarioReglas = [
		'usuario' => 'required',
        'clave'     => 'required|min_length[8]',
		'confirmar_clave' => 'required|min_length[8]|matches[clave]',
		'id_tipo_usuario' => 'required|numeric',
		'id_area' => 'required|numeric',
	];

	public $editarUsuarioReglas = [
		'usuario' => 'required',
		'id_area' => 'required|numeric',
	];
	
	public $editar1ClaveReglas = [
		'clave'     => 'required|min_length[8]',
		'confirmar_clave' => 'required|min_length[8]|matches[clave]',
	];
	public $evaluacionRules = [
		'radio1' => 'required',
		'radio2' => 'required',
		'radio3' => 'required',
		'radio4' => 'required',
		'radio5' => 'required',
		'radio6' => 'required',
		'radio7' => 'required',
		
	];

	public $inscripcionesReglas = [
		'id_actividad'     => 'required|numeric',
		'telefono'     => 'required|min_length[10]|max_length[10]',
	];

	public $editarClave12Reglas = [
		'clave'     => 'required|min_length[8]',
		'confirmar_clave' => 'required|min_length[8]|matches[clave]',
	];

	public $responsable1Reglas = [
		'rfc'     => 'required|min_length[13]|max_length[13]',
		'nombre'     => 'required',
		'apaterno'     => 'required',
		'amaterno'     => 'required',
        'clave'     => 'required|min_length[8]',
		'confirmar_clave' => 'required|min_length[8]|matches[clave]',
		'telefono'     => 'min_length[10]|max_length[10]',
		'correo'        => 'valid_email',
		'periodo'       => 'required|numeric',
	];

	public $editarResponsable1Reglas = [
		'nombre'     => 'required',
		'apaterno'     => 'required',
		'amaterno'     => 'required',
		'telefono'     => 'min_length[10]|max_length[10]',
		'correo'        => 'valid_email'
		
	];

	public $editarClave1Reglas = [
		'clave'     => 'required|min_length[8]',
		'confirmar_clave' => 'required|min_length[8]|matches[clave]',
	];

	public $actividadrReglas = [
		
		'rfc_responsable'     => 'required|min_length[13]|max_length[13]',
	];
}
