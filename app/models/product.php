<?php

class Product {
    private $id = '';
    private $name = '';
    private $description = '';
    private $cost = '';

    public function __construct($productInfo = array()) {
        if (array_key_exists('id', $productInfo)) {
            $this->id = $productInfo['id'];
        }
        if (array_key_exists('name', $productInfo)) {
            $this->name = $productInfo['name'];
        }
        if (array_key_exists('description', $productInfo)) {
            $this->description = $productInfo['description'];
        }
        if (array_key_exists('cost', $productInfo)) {
            $this->cost = $productInfo['cost'];
        }
    }

    public function get_id() {
        return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_description() {
        return $this->description;
    }

    public function get_cost() {
        return $this->cost;
    }    

}