<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CompanyControllerTest extends TestCase {

    public function testGetCompanyList(): void {

        $controller = new Controllers\CompanyController();
        $companies = $controller->getModelData();
        $expectedCount = 3;

        $this->assertCount(
                $expectedCount,
                $companies, "Company array does not contain 3 companies"
        );
    }

}
