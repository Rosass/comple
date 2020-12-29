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
$routes->post('division/inscripciones/cambiar-estatus-aceptar', 'Division/InscripcionController::cambiarEstatusAceptar');
$routes->post('division/inscripciones/cambiar-estatus-rechazar', 'Division/InscripcionController::cambiarEstatusRechazar');

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

// Rutas [ADMIN-Jefes]
$routes->get('admin/jefes', 'Admin/JefeController::index');
$routes->post('admin/jefes/agregar', 'Admin/JefeController::guardar');
$routes->get('admin/jefes/editar/(:any)', 'Admin/JefeController::editar');
$routes->post('admin/jefes/editar', 'Admin/JefeController::actualizar');
$routes->post('admin/jefes/cambiar-estatus', 'Admin/JefeController::cambiarEstatus');

// Rutas [ADMIN-Area]
$routes->get('admin/areas', 'Admin/AreaController::index');
$routes->post('admin/areas/agregar', 'Admin/AreaController::guardar');
$routes->get('admin/areas/editar/(:any)', 'Admin/AreaController::editar');
$routes->post('admin/areas/editar', 'Admin/AreaController::actualizar');
$routes->post('admin/areas/cambiar-estatus', 'Admin/AreaController::cambiarEstatus');

// Rutas [ADMIN-TIPOS-USUARIOS]
$routes->get('admin/tipos-usuarios', 'Admin/TipoUsuarioController::index');
$routes->post('admin/tipos-usuarios/agregar', 'Admin/TipoUsuarioController::guardar');
$routes->get('admin/tipos-usuarios/editar/(:any)', 'Admin/TipoUsuarioController::editar');
$routes->post('admin/tipos-usuarios/editar', 'Admin/TipoUsuarioController::actualizar');
$routes->post('admin/tipos-usuarios/cambiar-estatus', 'Admin/TipoUsuarioController::cambiarEstatus');

// Rutas [ADMIN-USUARIOS]
$routes->get('admin/usuarios', 'Admin/UsuarioController::index');
$routes->post('admin/usuarios/agregar', 'Admin/UsuarioController::guardar');
$routes->get('admin/usuarios/editar/(:any)', 'Admin/UsuarioController::editar');
$routes->post('admin/usuarios/editar', 'Admin/UsuarioController::actualizar');
$routes->post('admin/usuarios/editar-clave', 'Admin/UsuarioController::actualizarClave');
$routes->post('admin/usuarios/cambiar-estatus', 'Admin/UsuarioController::cambiarEstatus');

// Rutas [AUTH-Responsablr]
$routes->get('responsable/login', 'ResponsableLoginController::index');
$routes->post('responsable/login', 'ResponsableLoginController::login');
$routes->post('responsable/logout', 'ResponsableLoginController::logout');

// Rutas [Responsables]
$routes->get('responsables/inicio', 'Responsable/InicioController::index');
$routes->get('responsables/calificaciones/(:any)', 'Responsable/CalificacionController::index');
$routes->get('responsables/evaluacion/(:any)', 'Responsable/EvaluacionController::index');
$routes->post('responsables/evaluacion/agregar', 'Responsable/EvaluacionController::guardar');
$routes->get('responsables/lista-asistencia/(:any)', 'Responsable/AsistenciaController::listaAsistencia');
$routes->get('responsables/lista-calificacion/(:any)', 'Responsable/AsistenciaController::listaCalificacion');
$routes->get('responsables/cambiar-clave', 'Responsable/AlumnoController::index');
$routes->get('responsables/cambiar-clave/editar(:any)', 'Responsable/AlumnoController::editar');
$routes->post('responsables/cambiar-clave/editar-clave', 'Responsable/AlumnoController::actualizarClave');

// Rutas [AUTH-ALUMNO]
$routes->get('alumno/login', 'AlumnoLoginController::index');
$routes->post('alumno/login', 'AlumnoLoginController::login');
$routes->post('alumno/logout', 'AlumnoLoginController::logout');
//Ruta [alumno modulo]
$routes->get('alumno/inicio', 'Alumno/InicioController::index');
$routes->get('alumno/historial', 'Alumno/HistorialController::index');
$routes->get('alumno/inscripciones', 'Alumno/InscripcionController::index');
$routes->post('alumno/inscripciones', 'Alumno/InscripcionController::getInscripcionesPorActividadYEstatus');
$routes->post('alumno/inscripciones/agregar', 'Alumno/InscripcionController::guardar');
$routes->post('alumno/inscripciones/cambiar-estatus', 'Alumno/InscripcionController::cambiarEstatus'); 

//Rutas [Escolares]
$routes->get('escolares/inicio', 'Escolares/ActividadController::index');
$routes->post('buscar', 'Escolares/ActividadController::buscar');
$routes->post('escolares/generar-parcial', 'Escolares/GenerarController::constanciaParcial');
$routes->post('escolares/generar-liberacion', 'Escolares/GenerarController::constanciaLiberacion');


//Rutas [Jefes Area actividades]
$routes->get('jefes/actividades', 'Jefes/AreaController::index');
$routes->get('jefes/lista-asistencia/(:any)', 'Jefes/AsistenciaController::listaAsistencia');
$routes->get('jefes/lista-calificacion/(:any)', 'Jefes/AsistenciaController::listaCalificacion');
$routes->get('jefes/alumnos/(:any)', 'Jefes/AlumnoController::index');
$routes->post('jefes/constancia', 'Jefes/ConstanciaController::constancia');



//Rutas [Jefes Area responsables]
$routes->get('jefes/responsables', 'Jefes/ResponsableController::index');
$routes->post('jefes/responsables/agregar', 'Jefes/ResponsableController::guardar');
$routes->get('jefes/responsables/editar/(:any)', 'Jefes/ResponsableController::editar');
$routes->post('jefes/responsables/editar', 'Jefes/ResponsableController::actualizar');
$routes->post('jefes/responsables/editar-clave', 'Jefes/ResponsableController::actualizarClave');
$routes->post('jefes/responsables/cambiar-estatus', 'Jefes/ResponsableController::cambiarEstatus');


