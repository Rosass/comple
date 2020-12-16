<?php


function obtenerNombreCarrera() 
{   
    if ('ISC') {
        return 'INGENIERIA EN SISTEMAS COMPUTACIONALES';
    }
    elseif  ( 'ICI'){
     return' INGENIERIA CIVIL';
    }
    elseif ( 'IGE ')
    {
        return 'INGENIERIA EN GESTION EMPRESARIAL';
    }
    else return 'No se pudo detectar el navegador';
}


?>