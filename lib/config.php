<?php
define ('LIB_DIR', ROOT_DIR. 'lib/');
define ('MODEL_DIR', ROOT_DIR. 'app/model/');

spl_autoload_register(function ($class) {
    if (file_exists(MODEL_DIR. $class . '.php')) {
        require_once MODEL_DIR. $class . '.php';
    }
});

ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);