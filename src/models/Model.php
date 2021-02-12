<?php

namespace Models;

abstract class Model {

    protected $data;

    /**
     * @return array
     */
    abstract public function getData();
}
