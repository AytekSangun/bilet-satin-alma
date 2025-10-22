<?php

session_start();

require_once __DIR__ . '/../src/core/Database.php';
require_once __DIR__ . '/../src/controllers/HomeController.php';
require_once __DIR__ . '/../src/controllers/TripController.php';

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = strtok($requestUri, '?');

switch ($requestUri) {
    case '/':
    case '/index.php':
        $controller = new \App\Controllers\HomeController();
        $controller->index();
        break;

    case '/trip-details':
        $controller = new \App\Controllers\TripController();
        $controller->showDetails();
        break;

    default:
        http_response_code(404);
        echo "<h1>404 Sayfa Bulunamadı</h1>";
        break;
}