<?php

namespace Controllers;

use Models;

class AvailableSeatsController extends BaseController {

    public $data;

    public function __construct() {
        $cp_id = 0;
        $md_id = 0;
        $seat_cat_id = 0;

        $this->model = new Models\BookingModel();

        $argc = $_SERVER['argc'];
        $argv = $_SERVER['argv'];

        if (isset($argv[1]) && $argv[1] != '') {
            $companyData = new Models\CompanyModel();
            $company_id = $companyData->getCompanyIdByName(urldecode($argv[1]));
            $cp_id = $company_id[0]['id'];
        }
        if (isset($argv[2]) && $argv[2] != '') {
            $airlineData = new Models\AirlineModel();
            $model_id = $airlineData->getModelIdByName(urldecode($argv[2]));
            $md_id = $model_id[0]['id'];
        }
        if (isset($argv[3]) && $argv[3] != '') {
            $seatCategoryData = new Models\SeatCategoryModel();
            $seat_category_id = $seatCategoryData->getSeatCategoryIdByName(urldecode($argv[3]));
            $seat_cat_id = $seat_category_id[0]['id'];
        }

        $seatQuotaModal = new Models\SeatQuotaModel();
        $seatQuota = $seatQuotaModal->getSeatData($cp_id, $md_id, $seat_cat_id);

        foreach ($seatQuota as $key => $val) {
            $bookingCount = $this->model->getBookingCount($val['company_id'], $val['model_id'], $val['seat_category_id']);
            foreach ($val as $attributes) {
                echo $attributes . "\t";
            }
            echo "\n";
            $availableSeats = (int) $val['seat'] - (int) $bookingCount[0]['cnt'];
            echo "Total Availbale Seats : " . $availableSeats . "\t";
            echo "\n";
        }
    }

    public function getModelData() {
        return $this->data;
    }

}
