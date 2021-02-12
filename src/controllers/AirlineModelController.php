<?php

namespace Controllers;

use Models;

class AirlineModelController extends BaseController {

    public function __construct() {
        $this->model = new Models\AirlineModel();
        $models = $this->model->getAirlineData();
        $this->data = $models;
    }

    public function getModelData() {
        return $this->data;
    }
}