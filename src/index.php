<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Airline Passenger Manifest</title>
        <meta name="description" content="Shop">
        <meta name="author" content="Airline Passenger Manifest">
        <!-- Add some very basic style for page to look a little nicer, you can remove this if not required -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    </head>
    <body>
        <h1>Airlines</h1>
        <div class="container">
            <!-- Airlines block starts here -->
            <div>
                <h2>Companies</h2>
                <?php
                include 'autoload.php';
                $controller = new Controllers\CompanyController();

                $companyView = new Views\CompanyView($controller->getModelData());

                echo $companyView->render();
                ?>
            </div>
            <!-- Contact us block end here -->
        </div>

        <div class="container">
            <!-- Airlines block starts here -->
            <div>
                <h2>Models</h2>
                <?php
                $controller = new Controllers\AirlineModelController();

                $airlineModelView = new Views\AirlineModelView($controller->getModelData());

                echo $airlineModelView->render();
                ?>
            </div>
            <!-- Contact us block end here -->
        </div>
    </body>
</html>
