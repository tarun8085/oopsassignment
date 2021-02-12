<?php

namespace Models;

use Config;

class SeatQuotaModel extends Model {

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

    public function getSeatQuota($company_id, $model_id, $seat_category_id) {
        $models = $this->db->query('SELECT seat FROM `seat_quota` where company_id= ' . $company_id . ' and model_id=' . $model_id . ' and seat_category_id=' . $seat_category_id)
                ->fetchAll();
        return $models;
    }

    public function getSeatData($company_id, $model_id, $seat_category_id) {
        $sql = 'SELECT bk.id,cc.name,cc.headquarters,md.brand,md.model,bk.seat,bk.company_id,bk.model_id,bk.seat_category_id	FROM seat_quota as bk
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
