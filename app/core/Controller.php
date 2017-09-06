<?php

class Controller
{
    public function __construct() {
        if (!isset($GLOBALS['DB'])) {
            $DB = new DB;
            $GLOBALS['DB'] = $DB;
        }
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

}