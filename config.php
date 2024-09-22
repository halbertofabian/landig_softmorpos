<?php
$folder = explode("/", $_SERVER['REQUEST_URI']);
define('FOLDER', $folder[1]);
// Definiendo la ruta de la web 
define('HTTP_HOST', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . FOLDER . '/');

// LOCAL 
define('URL_SOFTMOR_POS', 'http://localhost/tallercontrol.com/api/public/');
define('URL', 'http://localhost/landing-tc/');
// define('URL_SOFTMOR_POS', 'http://192.168.1.12/ifixitv2.com/api/public/');
define('URL_POS', 'http://localhost/tallercontrol.com/');
// define('URL_SOFTMOR_POS', 'http://localhost/softmor-pos/api/public/');


// PRODUCCION 
// define('URL_SOFTMOR_POS', 'https://prueba.softmor.com/api/public/');
// define('URL_SOFTMOR_POS', 'https://app.softmor.com//api/public/');


// API STRIPE
define('SECRET_KEY', 'sk_test_TOhtnAvqZoPHQAJchqbfTjNO00MiSbjGd2');
define('PUBLIC_KEY', 'pk_test_PnY5miBnJ7yeI6nMz7wMer2E00m3y2zff9');




function cargarComponente($ruta, $title = "")
{
    include_once $ruta . '.php';
}
