<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class PassengerListControllerTest extends TestCase {

    public function testPassengerList(): void {
        $bookingModel = new Models\BookingModel();
        $company_name = "Emirates";
        $model_name = "A380";
        $seat_cat = "First Class";

        $companyData = new Models\CompanyModel();
        $company_id = $companyData->getCompanyIdByName($company_name);

        $airlineData = new Models\AirlineModel();
        $model_id = $airlineData->getModelIdByName($model_name);

        $seatCategoryData = new Models\SeatCategoryModel();
        $seat_category_id = $seatCategoryData->getSeatCategoryIdByName($seat_cat);

        $expected_cp_id = 3;
        $expected_md_id = 2;
        $expected_seat_cat_id = 1;

        $this->assertEquals($expected_cp_id, $company_id[0]['id'], "Invalid company id.");

        $this->assertEquals($expected_md_id, $model_id[0]['id'], "Invalid model id.");

        $this->assertEquals($expected_seat_cat_id, $seat_category_id[0]['id'], "Invalid seat category id.");

        $random_name = 'name' . rand(1000, 10000);

        $data = array(
            'first_name' => $random_name,
            'last_name' => 'Intg',
            'age' => 25,
            'gender' => 'male',
            'company_id' => $expected_cp_id,
            'model_id' => $expected_md_id,
            'seat_category_id' => $expected_seat_cat_id
        );

        $satus = $bookingModel->dobooking($data);

        $this->assertTrue($satus);

        $listOfPasangers = $bookingModel->getPassengerList($company_id[0]['id'], $model_id[0]['id'], $seat_category_id[0]['id']);

        $passangerNameDB = array_reverse($listOfPasangers)[0]['first_name'];

        $this->assertEquals(
                $random_name,
                $passangerNameDB
        );
    }

}
