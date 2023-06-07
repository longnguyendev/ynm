<?php
include 'data.php';
if (isset($_SESSION['user']['name'])) {
    header('location:index.php');
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $userModel->login($_POST['username'], $_POST['password']);
    if ($user != null) {
        echo "Logged in successfully";
        $_SESSION['user'] = $user;
        header('location:index.php');
    } else {
        $notication = "<p style='color:red'>Incorrect account or password!</p>";
    }
}

//[{id:"", product_name:"",product_description:""...}]
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/all.min.css">
    <link rel="stylesheet" href="./public/css/styleLogin.css">
    <title>Login</title>
</head>

<body>
    <form action="" method="post">
        <h1>Login</h1>
        <div class="input-group">
            <input type="text" id="username" name="username" required />
            <label for="username">Username</label>
        </div>

        <div class="input-group">
            <input type="password" id="password" name="password" autocomplete="new-password" required />
            <label for="password">Password</label>
        </div>
        <?php echo $notication ?>
        <button type="submit">Login</button>
        <p>Don't have account? <a href="./register.php">Sign Up</a></p>
    </form>
</body>

</html>