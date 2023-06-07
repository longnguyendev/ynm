<?php
include 'data.php';
$notication = "";
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['password'])) {
    $user = $userModel->createUser($_POST['fullName'], $_POST['gender'], $_POST['dob'], $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT));
    if ($user != null) {
        echo "Logged in successfully";
        $_SESSION['user'] = $user;
        header('location:index.php');
    } else {
        $notication = "<p style='color:red'>account already exists</p>";
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
    <link rel="stylesheet" href="./public/css/styleRegister.css">
    <title>Register</title>
</head>

<body>
    <form action="" method="post" onsubmit="return checkvalid()">
        <h1>Sign Up</h1>
        <div class="input-group">
            <input type="text" id="username" name="username" required />
            <label for="username">Phone number</label>
            <div class="invalid-feedback">
                ✘
            </div>
            <div class="valid-feedback">
                ✓
            </div>

        </div>
        <div class="input-group">
            <input type="text" id="fullName" name="fullName" required />
            <label for="fullName">Fullname</label>
            <div class="invalid-feedback">
                ✘
            </div>
            <div class="valid-feedback">
                ✓
            </div>
        </div>
        <div class="input-group">
            <input type="password" id="password" name="password" autocomplete="new-password" required />
            <label for="password">Password</label>
            <div class="invalid-feedback">
                ✘
            </div>
            <div class="valid-feedback">
                ✓
            </div>
        </div>
        <div class="input-group">
            <input type="password" id="confirm" name="confirm" autocomplete="new-password" required />
            <label for="confirm">Confirm</label>
            <div class="invalid-feedback">
                ✘
            </div>
            <div class="valid-feedback">
                ✓
            </div>
        </div>
        <input type="date" class="form-control" name="dob" id="dob">
        <div class="input-radio">

            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <?php echo $notication ?>
        <button type="submit" id="submit">Register</button>
        <p>You have account? <a href="./login.php">login</a></p>
    </form>
    <script src="./public/js/registerCheck.js"></script>
</body>

</html>