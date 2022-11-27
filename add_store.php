<!DOCTYPE html>
<?php session_start(); ?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
    <title>Become a seller</title>
    <link rel="icon" href="photo/Deal1.png">
</head>

<body>
    <div class="main">
        <div class="container a-container" id="a-container">
            <form class="form" id="b-form" method="POST" enctype="multipart/form-data">
                <h2 class="form_title title">Create a store</h2>
                <div class="radiobtn">
                    <input type="radio" name="radio" value="food" required><span>&nbsp;Food&nbsp; </span></input>
                    <input type="radio" name="radio" value="e_a" required><span>&nbsp;Electronic accessories&nbsp;</span></input>
                    <input type="radio" name="radio" value="clothes" required><span>&nbsp;clothes </span></input>
                </div>
                <input name="s_name" class="form__input" placeholder="Your Store name" required>
                <input name="s_loc" class="form__input" placeholder="Your Store Location" required>
                <textarea name="s_desc" class="form__input" placeholder="Description of your store" required></textarea>
                <input type="file" name="img" class="form__input" accept="image/png, image/jpeg, image/jpg" />
                <label id="wrong">Something wrong</label>
                <button class="form__button button submit" name="next">Generate store</button>
            </form>
        </div>
        <div class="switch" id="switch-cnt">
            <div class="switch__circle"></div>
            <div class="switch__circle switch__circle--t"></div>
            <div class="switch__container" id="switch-c1">
                <h2 class="switch__title title">Add Your Store</h2>
                <p class="switch__description description">In few minutes &nbsp;&nbsp;&nbsp;</p>
            </div>
        </div>
    </div>
    <?php
    if (!isset($_SESSION["users"])) {
    ?>
        <script>
            location.href = "log_in.php";
        </script>
    <?php
    }
    ?>
    <?php
    if (isset($_POST['next'])) {
        include "connected.php";

        $radioVal = $_POST["radio"];
        $cat_id;
        if ($radioVal == "food") {
            $cat_id = 1;
        } else if ($radioVal == "e_a") {
            $cat_id = 2;
        } else if ($radioVal == "clothes") {
            $cat_id = 3;
        }
        $tm = md5(time());
        $file_name = $_FILES['img']['name'];
        $folder = "photo/" . $tm . $file_name;
        move_uploaded_file($_FILES["img"]["tmp_name"], $folder);
        $store_nam = $_POST['s_name'];
        $store_desc = $_POST['s_desc'];
        $store_loc=$_POST['s_loc'];
        $name = $_SESSION["users"];

        $get = mysqli_query($conn, "SELECT `user_id` FROM `users` WHERE username='$name' ");
        while ($row = mysqli_fetch_array($get)) {
            $uid = $row['user_id'];
        }
        $register = mysqli_query($conn, "INSERT INTO `stores`(`store_name`, `store_loc`,`store_img`, `store_desc`, `categories_id`,`user_id`) VALUES ('$store_nam','$store_loc','$folder','$store_desc','$cat_id','$uid')");
        if ($register == true) {
            header('Location:user dashboard/stores.php');
        } else {
    ?>
            <script>
                document.getElementById('wrong').style.display = 'block';
            </script>
    <?php
        }
    }

    ?>

</body>

</html>