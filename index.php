<?php
require 'vendor/autoload.php';

$availableLangs = array('en', 'de', 'ru');
$app = new MultilingualSlim(array('templates.path' => './app/views/'));

// Create translator passing in the log and language files path
$translator = new Translator($app->getLog(), './app/lang');

// Set view object for Slim to use
$app->view(new MultilingualView($app, $translator, 'template.php'));

require 'app/hooks.php';
require 'app/routes.php';

$app->run();