<?php
include "data.php";
include './components/card.php';
$page = 1;
$perPage = 12;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
if (isset($_GET['q'])) {
    $key = $_GET['q'];
    $product = $productModel->getProductByCategory($key);
    $count =  count($product);
    $url = $_SERVER['PHP_SELF'] . "?q=$key";
    $link = $productModel->linksLimitProduct($url, $count, $perPage, $page, $key);
}
$start = ($page - 1) * $perPage;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/all.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <title><?php echo $_GET['category'] ?></title>
</head>

<body>
    <!-- header -->
    <?php
    include 'header.php';
    ?>
    <div class="container">
        <div class="row mt-5">
            <h1><?php echo $_GET['category'] ?></h1>
            <?php
            for ($i = $start; $i < ($start + $perPage) && $i < $count; $i++) {
                renderCard($product[$i]);
            }
            ?>
        </div>
        <?php echo $link ?>
    </div>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/app.js"></script>
</body>

</html>