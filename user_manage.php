<?php
include 'data.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $userModel->deleteUser($id);
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
    <title>User Manage</title>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container">
        <table class="table table-dark mt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <?php
            $users = $userModel->getUsers();
            foreach ($users as $user) {

            ?>
                <thead>
                    <tr>
                        <td scope="col"><?php echo $user['id'] ?></td>
                        <td scope="col"><?php echo $user['name'] ?></td>
                        <td scope="col">
                            <form action="" method="post" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $user['id']  ?>">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Do you want to remove this?')">Remove</button>
                            </form>
                            <form action="edit_user.php" method="post" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $user['id']  ?>">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                    </tr>
                </thead>
            <?php } ?>

        </table>
    </div>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/app.js"></script>
</body>

</html>