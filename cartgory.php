<?php
include 'data.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $index = array_search($id, $_SESSION['cartgory']);
    unset($_SESSION['cartgory'][$index]);
    header('location: cartgory.php');
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
    <title>Cartgory</title>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container">
        <table class="table table-dark mt-5">
            <thead>
                <tr>
                    <th scope="col">NAME</th>
                    <th scope="col">PHONE NUMBER</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <?php
            if (isset($_SESSION['cartgory'])) { ?>
                <?php
                foreach ($_SESSION['cartgory'] as $value) {
                    $product = $productModel->getProductByID("{$value}");
                ?>
                    <thead>
                        <tr>
                            <td scope="col"><a style="text-decoration: none;" href="<?php echo "detail.php?id={$value}" ?>"><?php echo $product['name'] ?></a></td>
                            <td scope="col"><?php echo $product['phone_number'] ?></td>
                            <td scope="col"><?php echo $product['price'] ?></td>
                            <td scope="col">
                                <form action="" method="post" style="display: inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $product['id']  ?>">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Do you want to remove this?')">Remove</button>
                                </form>

                                <a class="btn btn-primary" href="">Purchase</a>
                            </td>
                        </tr>
                    </thead>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/app.js"></script>
</body>

</html>