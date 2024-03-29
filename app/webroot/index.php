<?php
    if (false == defined('DS')) {
        define('DS', DIRECTORY_SEPARATOR);
    }
    if (false == defined('ROOT')) {
        define('ROOT', dirname(dirname(dirname(__FILE__))));
    }
    if (false == defined('APP_DIR')) {
        define('APP_DIR', basename(dirname(dirname(__FILE__))));
    }
    if (false == defined('WEBROOT_DIR')) {
        define('WEBROOT_DIR', basename(dirname(__FILE__)));
    }
    if (false == defined('WWW_ROOT')) {
        define('WWW_ROOT', dirname(__FILE__) . DS);
    }
    if (false == defined('HOST')) {
        define('HOST', 'http://localhost/tiqav');
    }
    if (false == defined('CAKE_CORE_INCLUDE_PATH')) {
        if (function_exists('ini_set')) {
            ini_set('include_path', ROOT . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'));
        }
        if (false == include('Cake' . DS . 'bootstrap.php')) {
            $failed = true;
	}
    } else {
        if (false == include(CAKE_CORE_INCLUDE_PATH . DS . 'Cake' . DS . 'bootstrap.php')) {
            $failed = true;
	}
    }
    if (false == empty($failed)) {
        trigger_error("CakePHP core could not be found.  Check the value of CAKE_CORE_INCLUDE_PATH in APP/webroot/index.php.  It should point to the directory containing your " . DS . "cake core directory and your " . DS . "vendors root directory.", E_USER_ERROR);
    }

    if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == '/favicon.ico') {
        return;
    }

    App::uses('Dispatcher', 'Routing');

    $Dispatcher = new Dispatcher();
    $Dispatcher->dispatch(new CakeRequest(), new CakeResponse(array('charset' => Configure::read('App.encoding'))));
