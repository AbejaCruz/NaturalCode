<?php

class Product {
    public $id;
    public $name;
    public $price;
    public $price_suggested;
    public $category;
    public $description;
    public $images = [];

    public function __construct(int $id) {
        $this->id = $id;
    }
}