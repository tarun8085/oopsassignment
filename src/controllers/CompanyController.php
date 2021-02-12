<?php

namespace Controllers;

use Models;

class CompanyController extends BaseController {

    public function __construct() {
        $this->model = new Models\CompanyModel();

        $models = $this->model->getCompanyData();
        $this->data = $models;
    }

    public function getModelData() {
        return $this->data;
    }
    
  
}