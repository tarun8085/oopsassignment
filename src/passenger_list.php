<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'autoload.php';
$controller = new Controllers\PassengerListController();

$passengerListView = new Views\PassengerListView($controller->getModelData());

echo $passengerListView->render();
