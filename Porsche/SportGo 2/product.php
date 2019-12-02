<?php

include './classes/Product.php';
include './classes/dummy-products.php';

$product = new Product($_GET['id']);

foreach ($products[$_GET['id']] as $key => $value) {
    $product->$key = $value;
}

include './views/product.php';