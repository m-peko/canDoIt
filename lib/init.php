<?php

require_once(CONFIG_PATH.DS.'config.php');

function __autoload($className) {
    $libPath = LIB_PATH.DS.strtolower($className).'.class.php';
    $controllersPath = CONTROLLERS_PATH.DS.str_replace('controller', '', strtolower($className)).'.controller.php';
    $modelsPath = MODELS_PATH.DS.strtolower($className).'.php';

    if(file_exists($libPath)) {
        require_once($libPath);
    }
    elseif(file_exists($controllersPath)) {
        require_once($controllersPath);
    }
    elseif(file_exists($modelsPath)) {
        require_once($modelsPath);
    }
    else {
        throw new Exception('Failed to include class: '.$className);
    }
}