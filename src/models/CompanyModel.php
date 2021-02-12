<?php

namespace Models;

use Config;

class CompanyModel extends Model {

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

    public function getCompanyData() {
        $models = $this->db->query('SELECT * FROM `company` order by id desc')
                ->fetchAll();

        return $models;
    }

    public function getCompanyIdByName($name = "") {
        $models = $this->db->query('SELECT id FROM `company` where name= "' . $name . '"')
                ->fetchAll();

        return $models;
    }

}
