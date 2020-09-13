<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
include_once __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

define('DIR_ROOT', dirname($_SERVER['DOCUMENT_ROOT']));
define('SITE_URL', 'http://www.imob.com.br');

define('ASSETS_PATH', '/assets');
define('CSS_PATH', ASSETS_PATH . '/css');
define('JS_PATH', ASSETS_PATH . '/js');
define('IMG_PATH', ASSETS_PATH . '/img');
define('VIEWS_PATH', DIR_ROOT . '/views');
define('VIEWS_INCLUDES_PATH', DIR_ROOT . '/views/includes' . DIRECTORY_SEPARATOR);
define('VIEWS_SITE_PATH', DIR_ROOT . '/views/site');
