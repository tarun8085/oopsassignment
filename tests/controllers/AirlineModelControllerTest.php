<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class AirlineModelControllerTest extends TestCase {

    public function testGetAirlineModelList(): void {

        $controller = new Controllers\AirlineModelController();
        $airlinemodels = $controller->getModelData();
        $expectedCount = 3;

        $this->assertCount(
                $expectedCount,
                $airlinemodels, "Airline model array does not contain 3 models"
        );
    }

}
