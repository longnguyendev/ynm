<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'data.php';
include './components/card.php';
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
    <title>Home</title>
</head>

<body>
    <!-- header -->
    <?php include 'header.php' ?>
    <!-- carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./public/images/home-slider-1-1.jpeg" class="d-block w-100" alt="...">
                <div class="banner-title">
                    <div class="container">
                        <h1>Register Now</h1>
                        <h4>2 Days Left! YOU & ME Bundle SALE - 74% of</h4>
                        <a href="#" class="button">Register</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./public/images/home-slider-2-1.jpeg" class="d-block w-100" alt="...">
                <div class="banner-title">
                    <div class="container">
                        <h1>Enjoy Dinner</h1>
                        <h4>Booking now and get your moment</h4>
                        <a href="#" class="button">Booking Now</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./public/images/home-slider-3-1.jpeg" class="d-block w-100" alt="...">
                <div class="banner-title">
                    <div class="container">
                        <h1>Welcome to YOU & ME</h1>
                        <h4>happiness and more</h4>
                        <a href="#" class="button">Upgrade Now</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- recommend -->
    <div class="container">
        <div class="row recommend">
            <a href="" style="text-decoration: none;">
                <h1>Recommend To You</h1>
            </a>
            <?php
            $productsRandom = $productModel->getRandomProducts(6);
            foreach ($productsRandom as $product) {
                renderCard($product);
            }
            ?>
        </div>
    </div>
    <!-- Products -->
    <?php
    foreach ($catgorys as $catgory) : ?>
        <?php echo "<!-- {$catgory['name']} -->" ?>
        <div class="container">
            <div class="row recommend">
                <a href="<?php echo "product_category.php?q={$catgory['id']}&category={$catgory['name']}" ?>" style="text-decoration: none; color:#ec5498">
                    <h1> <?php echo "{$catgory['name']}" ?><i class="fa-solid fa-caret-right"></i></h1>
                </a>
                <?php
                $products = $productModel->getProductByCategory($catgory['id'], 6);
                foreach ($products as $product) {
                    renderCard($product);
                }
                ?>
            </div>
        </div>
    <?php
    endforeach;
    ?>
    <div class="container">
        <a href="search.php?key=" class="d-flex justify-content-center text-decoration-none"><button type="button" class="btn btn-danger px-5">Xem Tất Cả</button></a>

    </div>
    <!-- footer -->
    <?php include 'footer.php' ?>

    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/app.js"></script>
</body>

</html>