<?php
include "data.php";
if ($_SESSION['user']['role'] != 'admin') {
    header('location:login.php');
}
if (isset($_POST['fullname'])  && isset($_POST['phone_number']) && isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['category_id'])) {
    $imageFile = "./public/images/" . $_FILES['image']['name'];
    if (is_uploaded_file($_FILES['image']['tmp_name']) && move_uploaded_file($_FILES['image']['tmp_name'], $imageFile)) {
        $fullname = $_POST['fullname'];
        $images = $_FILES['image']['name'];
        $phone_number = $_POST['phone_number'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        if ($productModel->addProduct($fullname, $dob, $gender, $phone_number, $description, $price, $images, $category_id)) {
            $alert = '<script>
                        alert("add suscess")
                     </script>';
        } else {
            $alert = '<script>
                        alert("add fail")
                    </script>';
        }
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
    <title>Add Product</title>
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
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/png, image/gif, image/jpeg, image/webp">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter phone number">
                <small id="emailHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="dob">Day of birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>
            <div class="input-radio">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="price">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                <small id="emailHelp" class="form-text text-muted">About from product.</small>
            </div>
            <div class="input-radio">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    <option selected>Choose...</option>
                    <?php
                    foreach ($catgorys as $catgory) { ?>
                        <option value=<?php echo  $catgory['id'] ?>><?php echo $catgory['name'] ?></option>
                    <?php
                    }
                    ?>
                    <!-- <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option> -->
                </select>
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