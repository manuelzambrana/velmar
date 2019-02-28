<?php
 defined('BASEPATH') or exit('No se permite acceso directo');

 /////Valores de uri
 define('URI', $_SERVER['REQUEST_URI']);

 ////Valores de core
 define('CORE', 'system/core/');

 //valores de rutas
 define('PATH', 'app/controllers/');
 define('VIEW', 'velmar2/app/views/');
 define('ROOT', $_SERVER['DOCUMENT_ROOT']);
 define('FOLDER_PATH', '/velmar2');
 define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);
 define('LIBS_ROUTE', ROOT . FOLDER_PATH . '/system/libs/');

 