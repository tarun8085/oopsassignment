<?php

namespace Controllers;

use Models;

class SeatQuotaModelController extends BaseController {

    public function __construct() {
        $this->model = new Models\SeatQuotaModel();
    }

    public function getModelData() {
        return $this->data;
    }

}
