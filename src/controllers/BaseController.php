<?php

namespace Controllers;

abstract class BaseController
{
    protected $modelData;

    abstract public function getModelData();
}