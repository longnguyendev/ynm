<?php
include "data.php";
if ($_SESSION['user']['role'] != 'admin') {
    header('location:login.php');
}
$id = $_POST['id'];
$user = $userModel->getUsersByID($id);
if (isset($_POST['fullname'])  && isset($_POST['phone_number']) && isset($_POST['dob']) && isset($_POST['gender'])) {
    $fullname = $_POST['fullname'];
    $phone_number = $_POST['phone_number'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    if ($userModel->updateUser($id, $fullname, $gender, $dob, $phone_number)) {
        $alert = '<script>
                        alert("edit suscess")
                     </script>';
    } else {
        $alert = '<script>
                        alert("edit fail")
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
    <title>Edit User</title>
</head>

<body>
    <!-- header -->
    <?php
    $user = $userModel->getUsersByID($id);
    if (isset($alert)) {
        echo $alert;
    }
    include 'header.php';
    ?>
    <div class="container">
        <form class="mt-5" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" value="<?php echo $user['id'] ?>" name="id">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name" value="<?php echo $user['name'] ?>">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter phone number" value="<?php echo $user['phone_number'] ?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="dob">Day of birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $user['dob'] ?>">
            </div>
            <div class="input-radio">
                <label for="gender">user</label>
                <select id="gender" name="gender" class="form-select">
                    <option value="male" <?php if ($user['gender'] == 'male') echo "selected"  ?>>Male</option>
                    <option value="female" <?php if ($user['gender'] == 'female') echo "selected"  ?>>Female</option>
                    <option value="other" <?php if ($user['gender'] == 'other') echo "selected"  ?>>Other</option>
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