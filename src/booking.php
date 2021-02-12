<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'autoload.php';
$controller = new Controllers\BookingModelController();

$bookingModelView = new Views\BookingModelView($controller->getModelData());

echo $bookingModelView->render();
