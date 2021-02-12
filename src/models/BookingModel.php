<?php

namespace Models;

use Config;
use Models;

class BookingModel extends Model {

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

    public function getBookingData() {
        $models = $this->db->query('SELECT * FROM `booking` order by id desc')
                ->fetchAll();

        return $models;
    }

    public function dobooking($data) {
        if (isset($data) && count($data) > 0) {
            $first_name = htmlspecialchars(filter_var($data['first_name'], FILTER_SANITIZE_STRING)); // As we do not want to have any HTML in names
            $last_name = htmlspecialchars(filter_var($data['last_name'], FILTER_SANITIZE_STRING)); // To validate a proper email
            $age = htmlspecialchars($data['age']);
            $gender = htmlspecialchars($data['gender']);
            $company_id = htmlspecialchars($data['company_id']);
            $model_id = htmlspecialchars($data['model_id']);
            $seat_category_id = htmlspecialchars($data['seat_category_id']);

            // Insert records in contact_us by using prepared statments.
            $insert = $this->db->query('INSERT INTO booking (first_name,last_name,age,gender,company_id,model_id,seat_category_id) VALUES (?,?,?,?,?,?,?)', $first_name, $last_name, $age, $gender, $company_id, $model_id, $seat_category_id);

            // If row inserted in table, then return true
            if ($insert->affectedRows() === 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getBookingCount($company_id, $model_id, $seat_category_id) {
        $models = $this->db->query('SELECT count(id) as cnt FROM `booking` where company_id= ' . $company_id . ' and model_id=' . $model_id . ' and seat_category_id=' . $seat_category_id)
                ->fetchAll();

        return $models;
    }

    public function getPassengerList($company_id = 0, $model_id = 0, $seat_category_id = 0) {
        $sql = 'SELECT bk.id,bk.first_name,bk.last_name,bk.age,bk.gender,cc.name,cc.headquarters,md.brand,md.model	 FROM booking as bk
				left join company cc on bk.company_id=cc.id 
				left join model md on bk.model_id=md.id 
				left join seat_category sc on bk.seat_category_id=sc.id';
        if ($company_id != 0) {
            $sql .= ' where bk.company_id=' . $company_id;
        }
        if ($model_id != 0) {
            $sql .= ' and bk.model_id=' . $model_id;
        }
        if ($seat_category_id != 0) {
            $sql .= ' and bk.seat_category_id=' . $seat_category_id;
        }
        $models = $this->db->query($sql)
                ->fetchAll();
        return $models;
    }

}
