<?php

namespace Controllers;

use Models;

class SeatCategoryModelController extends BaseController {

    public function __construct() {
        $this->model = new Models\SeatCategoryModel();
    }

    public function getModelData() {
        return $this->data;
    }

}
