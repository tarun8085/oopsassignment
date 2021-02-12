<?php

namespace Models;

use Config;
use Models;

class AirlineModel extends Model {

    /**
     * @var db
     */
    private $db;

    public function __construct() {
        $db = new Config\db();
        $this->db = $db;
    }

    public function getData() {
        return $this->data;
    }

    public function getAirlineData() {
        $companyData = new Models\CompanyModel();

        $models = $this->db->query('SELECT * FROM `model` order by id desc')
                ->fetchAll();

        $model['company_data'] = $companyData->getCompanyData();
        return $models;
    }

    public function getModelIdByName($name = "") {
        $models = $this->db->query('SELECT id FROM `model` where model= "' . $name . '"')
                ->fetchAll();
        return $models;
    }

}
