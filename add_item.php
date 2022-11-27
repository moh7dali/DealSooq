<!DOCTYPE html>
<?php session_start(); ?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
    <title>Add Item</title>
    <link rel="icon" href="photo/Deal1.png">
</head>

<body>
    <div class="main">
        <div class="container a-container" id="a-container">
            <form class="form" id="b-form" method="POST" enctype="multipart/form-data">
                <h2 class="form_title title">Add Item to Your Store</h2>
                <input name="i_name" class="form__input" placeholder="Your item name" required>
                <input name="i_price" type="number" class="form__input" placeholder="Your item price" required>
                <textarea name="i_desc" class="form__input" placeholder="Description of your item" required></textarea>
                <input type="file" name="img" class="form__input" accept="image/png, image/jpeg, image/jpg" />
                <label id="wrong">Something wrong</label>
                <button class="form__button button submit" name="next">Add item</button>
            </form>
        </div>
        <div class="switch" id="switch-cnt">
            <div class="switch__circle"></div>
            <div class="switch__circle switch__circle--t"></div>
            <div class="switch__container" id="switch-c1">
                <h2 class="switch__title title">Just like that</h2>
                <p class="switch__description description">Add items and Start selling</p>
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
        $s_id = $_GET['store_id'];
        $tm = md5(time());
        $file_name = $_FILES['img']['name'];
        $folder = "photo/" . $tm . $file_name;
        move_uploaded_file($_FILES["img"]["tmp_name"], $folder);

        $item_nam = $_POST['i_name'];
        $item_price = $_POST['i_price'];
        $item_desc = $_POST['i_desc'];
        $item_status = "available";

        $register = mysqli_query($conn, "INSERT INTO `items`(`item_name`, `item_desc`, `item_price`, `item_img`, `item_status`, `store_id`) VALUES ('$item_nam','$item_desc','$item_price','$folder','$item_status','$s_id')");
        if ($register == true) {
            header('Location: user dashboard/stores.php');
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