<?php
define("PUBLIC_FOLDER", __DIR__);

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
//header('Content-Type: application/json');

if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}
require_once APP . '/init.php';
// Init Application
new App();
