<?php

namespace Controllers;

use Models;

class BookingModelController extends BaseController {

    public $data;

    public function __construct() {
        $this->model = new Models\BookingModel();

        //$params = $this->getUrlQueryParams();
        $argc = $_SERVER['argc'];
        $argv = $_SERVER['argv'];

        if (!isset($argv[1]) && $argv[1] == '') {
            echo "Provide first name";
            exit;
        } else if (!isset($argv[2]) && $argv[2] == '') {
            echo "Provide last name";
            exit;
        } else if (!isset($argv[3]) && $argv[3] == '') {
            echo "Provide age";
            exit;
        } else if (!isset($argv[4]) && $argv[4] == '') {
            echo "Provide gender";
            exit;
        } else if (!isset($argv[5]) && $argv[5] == '') {
            echo "Provide name of airline";
            exit;
        } else if (!isset($argv[6]) && $argv[6] == '') {
            echo "Provide airline model";
            exit;
        } else if (!isset($argv[7]) && $argv[7] == '') {
            echo "Provide seat category";
            exit;
        }

        if (isset($argv[4]) && $argv[4] != '') {
            $gender_array = array('male', 'female');

            if (!in_array($argv[4], $gender_array)) {
                echo "Invalid gender";
                exit;
            }
        } else if (isset($argv[3]) && $argv[3] != '') {
            if (preg_match('#[^0-9]#', $argv[3])) {
                echo "Only numbers are allowed in age";
                exit;
            }
        }

        $companyData = new Models\CompanyModel();
        $company_id = $companyData->getCompanyIdByName(urldecode($argv[5]));

        $airlineData = new Models\AirlineModel();
        $model_id = $airlineData->getModelIdByName(urldecode($argv[6]));

        $seatCategoryData = new Models\SeatCategoryModel();
        $seat_category_id = $seatCategoryData->getSeatCategoryIdByName(urldecode($argv[7]));

        if (empty($company_id)) {
            echo "Invalid airline name";
            exit;
        } else if (empty($model_id)) {
            echo "Invalid model name";
            exit;
        } else if (empty($seat_category_id)) {
            echo "Invalid seat category name";
            exit;
        }
        $seatQuotaModal = new Models\SeatQuotaModel();
        $seatQuota = $seatQuotaModal->getSeatQuota($company_id[0]['id'], $model_id[0]['id'], $seat_category_id[0]['id']);

        $bookingCount = $this->model->getBookingCount($company_id[0]['id'], $model_id[0]['id'], $seat_category_id[0]['id']);
        if ($seatQuota[0]['seat'] > $bookingCount[0]['cnt']) {
            $data = array(
                'first_name' => $argv[1],
                'last_name' => $argv[2],
                'age' => $argv[3],
                'gender' => $argv[4],
                'company_id' => $company_id[0]['id'],
                'model_id' => $model_id[0]['id'],
                'seat_category_id' => $seat_category_id[0]['id']
            );

            $status = $this->model->dobooking($data);
            if ($status == 1) {
                echo "Booking done successfully";
                exit;
            } else {
                echo "Booking falied";
                exit;
            }
        } else {
            echo "No seats available";
            exit;
        }
    }

    public function getModelData() {
        return $this->data;
    }

}
