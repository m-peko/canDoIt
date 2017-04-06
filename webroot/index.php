<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('CONFIG_PATH', ROOT.DS.'config');
define('LIB_PATH', ROOT.DS.'lib');
define('MODELS_PATH', ROOT.DS.'models');
define('VIEWS_PATH', ROOT.DS.'views');
define('CONTROLLERS_PATH', ROOT.DS.'controllers');

require_once(LIB_PATH.DS.'init.php');

session_start();

App::run($_SERVER['REQUEST_URI']);