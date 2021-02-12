<?php

namespace Controllers;

use Models;

class PassengerListController extends BaseController {

    public $data;

    public function __construct() {
        $cp_id = 0;
        $md_id = 0;
        $seat_cat_id = 0;

        $this->model = new Models\BookingModel();
        //$params = $this->getUrlQueryParams();

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

        return $this->data = $this->model->getPassengerList($cp_id, $md_id, $seat_cat_id);
    }

    public function getModelData() {
        return $this->data;
    }

}
