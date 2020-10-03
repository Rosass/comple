<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

$routes->get('/', 'InicioController::index');

// Rutas [AUTH]
$routes->get('login', 'UsuarioController::index');
$routes->post('login', 'UsuarioController::login');
$routes->post('logout', 'UsuarioController::logout');

// Rutas [DIVISION-ACTIVIDADES]
$routes->get('division/actividades', 'Division/ActividadController::index');
$routes->post('division/actividades/agregar', 'Division/ActividadController::guardar');
$routes->get('division/actividades/editar/(:any)', 'Division/ActividadController::editar');
$routes->post('division/actividades/editar', 'Division/ActividadController::actualizar');
$routes->post('division/actividades/cambiar-estatus', 'Division/ActividadController::cambiarEstatus');

// Rutas [DIVISION-INSCRIPCIONES]
$routes->get('division/inscripciones', 'Division/InscripcionController::index');
$routes->post('division/inscripciones', 'Division/InscripcionController::getInscripcionesPorActividadYEstatus');
$routes->post('division/inscripciones/agregar', 'Division/InscripcionController::guardar');
$routes->get('division/inscripciones/editar/(:any)', 'Division/InscripcionController::editar');
$routes->post('division/inscripciones/editar', 'Division/InscripcionController::actualizar');
$routes->post('division/inscripciones/cambiar-estatus', 'Division/InscripcionController::cambiarEstatus');

// Rutas [DIVISION-PERIODOS]
$routes->get('division/periodos', 'Division/PeriodoController::index');
$routes->post('division/periodos/agregar', 'Division/PeriodoController::guardar');
$routes->post('division/periodos/cambiar-estatus', 'Division/PeriodoController::cambiarEstatus');
$routes->get('division/periodos/editar/(:any)', 'Division/PeriodoController::editar');
$routes->post('division/periodos/editar', 'Division/PeriodoController::actualizar');

// Rutas [DIVISION-RESPONSABLES]
$routes->get('division/responsables', 'Division/ResponsableController::index');
$routes->post('division/responsables/agregar', 'Division/ResponsableController::guardar');
$routes->get('division/responsables/editar/(:any)', 'Division/ResponsableController::editar');
$routes->post('division/responsables/editar', 'Division/ResponsableController::actualizar');
$routes->post('division/responsables/editar-clave', 'Division/ResponsableController::actualizarClave');
$routes->post('division/responsables/cambiar-estatus', 'Division/ResponsableController::cambiarEstatus');

// Rutas [DIVISION-TIPOS-ACTIVIDADES]
$routes->get('division/tipos-actividades', 'Division/TipoActividadController::index');
$routes->post('division/tipos-actividades/agregar', 'Division/TipoActividadController::guardar');
$routes->get('division/tipos-actividades/editar/(:any)', 'Division/TipoActividadController::editar');
$routes->post('division/tipos-actividades/editar', 'Division/TipoActividadController::actualizar');
$routes->post('division/tipos-actividades/cambiar-estatus', 'Division/TipoActividadController::cambiarEstatus');
