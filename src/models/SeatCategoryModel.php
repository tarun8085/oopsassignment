<?php

namespace Models;

use Config;

class SeatCategoryModel extends Model {

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

    public function getSeatCategoryIdByName($name = "") {
        $models = $this->db->query('SELECT id FROM `seat_category` where name= "' . $name . '"')
                ->fetchAll();
        return $models;
    }

}
