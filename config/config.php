<?php

Config::set('webAppName', 'canDoIt');

// Route name => default controller
Config::set('routes', array(
    'main' => 'registration',
    'app' => 'tasks'
));

Config::set('defaultRoute', 'main');
Config::set('defaultController', 'registration');
Config::set('defaultAction', 'index');

// Settings regarding database connection
Config::set('dbHost', 'localhost');
Config::set('dbUser', 'root');
Config::set('dbPassword', '');
Config::set('dbName', 'canDoIt');