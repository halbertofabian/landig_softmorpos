<?php 
$folder = explode("/", $_SERVER['REQUEST_URI']);
define('FOLDER', $folder[1]);
// Definiendo la ruta de la web 
define('HTTP_HOST', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . FOLDER . '/');

// LOCAL 
// define('URL_SOFTMOR_POS', 'http://localhost/ifixitv2.com/api/public/');
define('URL_SOFTMOR_POS', 'http://localhost/softmor-pos/api/public/');

// PRODUCCION 
// define('URL_SOFTMOR_POS', 'https://prueba.softmor.com/api/public/');
// define('URL_SOFTMOR_POS', 'https://app.softmor.com//api/public/');
