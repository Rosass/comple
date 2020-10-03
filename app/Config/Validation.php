<?php namespace Config;

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
		'telefono'     => 'min_length[9]',
        'correo'        => 'valid_email'
	];

	public $editarResponsableReglas = [
		'nombre'     => 'required',
		'apaterno'     => 'required',
		'amaterno'     => 'required',
		'telefono'     => 'min_length[9]',
        'correo'        => 'valid_email'
	];

	public $editarClaveReglas = [
		'clave'     => 'required|min_length[8]',
		'confirmar_clave' => 'required|min_length[8]|matches[clave]',
	];

	public $periodoReglas = [
		'periodo'     => 'required|numeric',
		'fecha_inicio'     => 'required|valid_date',
		'fecha_final'     => 'required|valid_date'
	];

	public $actividadReglas = [
		'nombre'     => 'required',
		'creditos'     => 'required|numeric',
		'capacidad'     => 'required|numeric',
		'id_area'     => 'required|numeric',
        'periodo'     => 'required|numeric',
		'id_tipo_actividad' => 'required|numeric'
	];

	public $inscripcionReglas = [
		'num_control'     => 'required|numeric|min_length[8]|max_length[9]',
		'periodo'     => 'required|numeric',
		'id_actividad'     => 'required|numeric',
	];

	public $editarInscripcionReglas = [
		'id_inscripcion'     => 'required|numeric',
		'periodo'     => 'required|numeric',
		'id_actividad'     => 'required|numeric',
	];
	
}
