<?php
include 'data.php';
if (isset($_POST['productId']) && isset($_POST['userId'])) {

    if ($productModel->checkLike($_POST['productId'], $_POST['userId'])) {
        $productModel->removeLike($_POST['productId'], $_POST['userId']);
        header('location:index.php');
    } else {
        $productModel->addLike($_POST['productId'], $_POST['userId']);
        header('location:index.php');
    }
}
if (isset($_POST['productId1']) && isset($_POST['userId1'])) {

    if ($productModel->checkLike($_POST['productId1'], $_POST['userId1'])) {
        $productModel->removeLike($_POST['productId1'], $_POST['userId1']);
        header("location:detail.php?id={$_POST['productId1']}");
    } else {
        $productModel->addLike($_POST['productId1'], $_POST['userId1']);
        header("location:detail.php?id={$_POST['productId1']}");
    }
}
