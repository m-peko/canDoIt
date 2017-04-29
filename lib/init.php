<?php

require_once(CONFIG_PATH.DS.'config.php');

function __autoload($className) {
    $libPath = LIB_PATH.DS.strtolower($className).'.class.php';
    $controllersPath = CONTROLLERS_PATH.DS.str_replace('controller', '', strtolower($className)).'.controller.php';
    $modelsPath = MODELS_PATH.DS.str_replace('model', '', strtolower($className)).'.model.php';
    $servicesPath = SERVICES_PATH.DS. str_replace('service', '', strtolower($className)).'.service.php';
    $factoriesPath = FACTORIES_PATH.DS.str_replace('factory', '', strtolower($className)).'.factory.php';

    if(file_exists($libPath)) {
        require_once($libPath);
    }
    elseif(file_exists($controllersPath)) {
        require_once($controllersPath);
    }
    elseif(file_exists($modelsPath)) {
        require_once($modelsPath);
    }
    elseif(file_exists($servicesPath)) {
        require_once($servicesPath);
    }
    elseif(file_exists($factoriesPath)) {
        require_once($factoriesPath);
    }
    else {
        throw new Exception('Failed to include class: '.$className);
    }
}