<?php
include "data.php";
include './components/card.php';
$page = 1;
$perPage = 12;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
if (isset($_GET['key'])) {
    $key = $_GET['key'];
    $searchproducts = $productModel->findProductBykey($key);
    $count =  count($searchproducts);
    $url = $_SERVER['PHP_SELF'] . "?key=$key";
    $link = $productModel->linksLimitProduct($url, $count, $perPage, $page);
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
    <title>Find <?php echo $key = $_GET['key']; ?></title>
</head>

<body>
    <!-- header -->
    <?php
    include 'header.php';
    ?>
    <div class="container">
        <div class="row mt-5">
            <h1>RESULT FOR "<?php echo $key ?>"</h1>
            <?php
            for ($i = $start; $i < ($start + $perPage) && $i < $count; $i++) {
                renderCard($searchproducts[$i]);
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