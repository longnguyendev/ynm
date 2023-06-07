<?php
include "data.php";
if ($_SESSION['user']['role'] != 'admin') {
    header('location:login.php');
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $category = $catgoryModel->getCatgoryByID($id);
}
if (isset($_POST['fullname'])) {
    if ($catgoryModel->updateCatgory($category['id'], $_POST['fullname'])) {
        $category = $catgoryModel->getCatgoryByID($id);
        $alert = '<script>
                        alert("add suscess")
                     </script>';
    } else {
        $alert = '<script>
                        alert("add fail")
                    </script>';
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
    <title>Update Category</title>
</head>

<body>
    <!-- header -->
    <?php
    if (isset($alert)) {
        echo $alert;
    }
    include 'header.php';
    ?>
    <div class="container">
        <form class="mt-5" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="hidden" class="form-control" id="fullname" name="id" value="<?php echo $id ?>">
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name" value="<?php echo $category['name'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/app.js"></script>
</body>

</html>