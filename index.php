<?php

// Require the autoloader to autoload classes
require_once __DIR__ . '/vendor/autoload.php';

//use MusicFest\Core\Router;

// Create a new router instance
$router = new MusicFest\Core\Router();

// Define routes
$router->addRoute('GET', '^/$', function () {
    $homeController = new MusicFest\Controllers\HomeController(new MusicFest\Views\HomeView());
    $homeController->index();
});
// Route the current request
$router->route();
