<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'data.php';
// if (!isset($_SESSION['user'])) {
//     header('location:login.php');
// }
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $productModel->updateProductView($id);
    $product = $productModel->getProductByID($id);
    if (!$product) {
        header('location:index.php');
    }
    $comments = $productModel->getComment($id);
} else {
    header('location:index.php');
}
if (isset($_POST['idRemove'])) {
    $productModel->deleteProduct($_POST['idRemove']);
    header('location:index.php');
}
if (empty($_SESSION['cartgory'])) {
    $_SESSION['cartgory'] = [];
}
if (isset($_GET['idcart'])) {
    $idcart = $_GET['idcart'];
    if (array_search($id, $_SESSION['cartgory']) == []) {
        array_push($_SESSION['cartgory'], $idcart);
    }
}
if (isset($_POST['content'])) {
    if (!isset($_SESSION['user'])) {
        header('location:login.php');
    }
    if ($productModel->addtComment($id, $_SESSION['user']['id'], $_POST['content'])) {
        header("location:detail.php?id={$id}");
    }
}
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
    <title><?php echo $product['name'] ?></title>
</head>

<body>
    <!-- header -->
    <?php include 'header.php' ?>
    <div class="container mt-5">
        <div class="row">
            <div class='col-lg-5'>
                <a class='recommend-item' href='#'>
                    <div class='img-item' style='background-image: url(./public/images/<?php echo $product['images'] ?>)'>
                        <div class="info_detail">
                            <div><span class="badge btn-light border border-2 border-info text-info user-select-none"><i class="fa-regular fa-eye"></i> <?php echo $product['product_view'] ?></span>
                            </div>
                            <div>
                                <?php
                                if (isset($_SESSION['user'])) {
                                ?>
                                    <form action="like_controller.php" method="post">
                                        <input type="hidden" name="productId1" value="<?php echo $product['id'] ?>">
                                        <input type="hidden" name="userId1" value="<?php echo $_SESSION['user']['id'] ?>">
                                        <button type="submit" class="btn-like badge btn <?php if ($productModel->checkLike($product['id'],  $_SESSION['user']['id'])) {
                                                                                            echo "btn-danger text-light";
                                                                                        } else {
                                                                                            echo " text-danger";
                                                                                        } ?> border border-2 border-danger "><i class="fa-regular fa-heart"></i> <?php echo $productModel->countLike($product['id']) ?></button>
                                    </form>



                                <?php
                                } else { ?>
                                    <button class="btn-like badge btn border border-2 border-danger text-danger"><i class="fa-regular fa-heart"></i> <?php echo $productModel->countLike($product['id']) ?></button>
                                <?php
                                }
                                ?>
                            </div>


                        </div>
                    </div>

                </a>
            </div>
            <div class="col-lg-7">
                <a class='title-item-detail' href='#'>
                    <?php echo $product['name'] ?>
                </a>
                <div class='text-item-detail'>
                    <br />
                    Day of birth: <?php echo  $product['dob'] ?><br />
                    Gender: <?php echo $product['gender'] ?><br />
                    Description: <?php echo $product['description'] ?><br />
                    Phone number: <?php echo $product['phone_number'] ?><br />
                    cost: <?php echo number_format($product['price'])  ?>
                </div><br />
                <div class="d-flex flex-column">
                    <a class='btn btn-primary btn-block mb-4 p-3' href='detail.php?id=<?php echo $product['id'] ?>&idcart=<?php echo $product['id'] ?>'>Add to cart</a>
                    <a class='btn btn-secondary btn-block mb-4 p-3' href='#'>Rent now</a>
                    <?php
                    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') { ?>
                        <a class='btn btn-warning btn-block mb-4 p-3' href='edit_product.php?id=<?php echo $product['id'] ?>'>Edit</a>
                        <form class="form-group" action="" method="post">
                            <input type="hidden" name="idRemove" value="<?php echo $id ?>">
                            <button type="submit" class='form-control btn btn-danger btn-block mb-4 p-3' onclick="return confirm('Do you want to delete this?')">Delete</button>
                        </form>

                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="comment"></div>
        </div>
        <section>
            <div class="my-5 py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <?php
                                foreach ($comments as $comment) { ?>

                                    <div>
                                        <div class="d-flex flex-start align-items-center">

                                            <div>
                                                <h6 class="fw-bold text-primary mb-1"><?php echo $userModel->getUsersByID($comment['user_id'])['name']  ?></h6>
                                                <div class="text-muted small mb-0">
                                                    <?php echo $comment['created_at'] ?>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="mt-3 mb-4 pb-2" style="border-bottom: 1px solid #eee;">
                                            <?php echo $comment['content'] ?>
                                        </p>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">

                                <form action="" method="post">
                                    <div class="form-outline w-100">
                                        <textarea class="form-control" name="content" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                        <label class="form-label" for="textAreaExample">Message</label>
                                    </div>
                                    <div class="float-end mt-2 pt-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- comment -->

    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/app.js"></script>
</body>

</html>