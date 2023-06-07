<?php
include 'data.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $catgoryModel->deleteCatgory($id);
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
    <title>Cartgory Manage</title>
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
            $catgorys = $catgoryModel->getAllCatgory();
            foreach ($catgorys as $catgory) {

            ?>
                <thead>
                    <tr>
                        <td scope="col"><?php echo $catgory['id'] ?></td>
                        <td scope="col"><?php echo $catgory['name'] ?></td>
                        <td scope="col">
                            <form action="" method="post" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $catgory['id']  ?>">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Do you want to remove this?')">Remove</button>
                            </form>
                            <form action="edit_category.php" method="post" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $catgory['id']  ?>">
                                <button type="submit" class="btn btn-primary">Rename</button>
                            </form>
                        </td>
                    </tr>
                </thead>
            <?php } ?>

        </table>
        <form action="add_category.php" method="post">
            <input type="hidden" name="id" value="<?php echo $catgory['id']  ?>">
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/app.js"></script>
</body>

</html>