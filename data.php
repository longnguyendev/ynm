<?php
session_start();
require_once('./config/database.php');
// autoloading
spl_autoload_register(function ($className) {
    require_once("./models/$className.php");
});
// require_once './config/database.php';
// require_once './models/Model.php';
// require_once './models/CartModel.php';
// require_once  './models/CatgoryModel.php';
// require_once './models/ProductModel.php';
// require_once    './models/UserModel.php';
$productModel = new ProductModel();
$userModel = new UserModel();
$catgoryModel = new CatGoryModel();
$products = $productModel->getProducts();
$productsLimit = $productModel->getProducts(6);
$catgorys = $catgoryModel->getAllCatgory();
