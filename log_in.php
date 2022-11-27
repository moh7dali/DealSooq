<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
    <link rel="icon" href="photo/Deal1.png">
    <script src="https://kit.fontawesome.com/04b6044f71.js" crossorigin="anonymous"></script>
    <title>full Login page</title>
</head>

<body>
    <div class="main">
        <div class="container a-container" id="a-container">
            <form class="form" id="b-form" method="POST">
                <h2 class="form_title title">Sign in</h2>
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="google" href="#"><i class="fa fa-google"></i></a></li>
                </ul>
                <span class="form__span">or use your email account</span>
                <input class="form__input" type="text" placeholder="Email Or phone" name="username">
                <input class="form__input" type="password" placeholder="Password" name="password">
                <a href="forget.php" class="form__link">Forgot your password?</a>
                <label id="wrong">wrong password or email ...!</label>
                <button class="form__button button" name="Submit">SIGN IN</button>
            </form>
        </div>
        <div class="container b-container" id="b-container">
            <form class="form" id="a-form" method="POST" >
                <h2 class="form_title title">Create Account</h2>
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="google" href="#"><i class="fa fa-google"></i></a></li>
                </ul>
                <span class="form__span">or use email for registration</span>
                <input class="form__input" type="text" placeholder="Name" name="uname" required>
                <input class="form__input" type="text" placeholder="User Name" name="un" required>
                <input class="form__input" type="email" placeholder="Email" name="em" required>
                <input class="form__input" type="number" placeholder="Age" name="ag" required>
                <input class="form__input" type="text" placeholder="Phone" name="ph" pattern="[0-9]{10}" required maxlength="10">
                <input class="form__input" type="password" placeholder="Password" name="pas" required minlength="8">
                <input class="form__input" type="password" placeholder="Re-type password" name="repas" required minlength="8">
                <label id="sign_wrong">Password doesn't match</label>
                <button class="form__button button" name="Register">SIGN UP</button>
            </form>
        </div>
        <div class="switch" id="switch-cnt">
            <div class="switch__circle"></div>
            <div class="switch__circle switch__circle--t"></div>
            <div class="switch__container" id="switch-c1">
                <h2 class="switch__title title">One Of Us!</h2>
                <p class="switch__description description">If you already have an account, just sign in </br> We've missed you! </p>
                <button class="switch__button button switch-btn">SIGN UP</button>
            </div>
            <div class="switch__container is-hidden" id="switch-c2">
                <h2 class="switch__title title">Hello Friend !</h2>
                <p class="switch__description description">Enter your personal details and start journey with us</p>
                <button class="switch__button button switch-btn">SIGN IN</button>
            </div>
        </div>
    </div>

    <script src="js/main.js">
    </script>
    <?php
    if (isset($_POST['Register'])) {
        $nam = $_POST['uname'];
        $userna = $_POST['un'];
        $mail = $_POST['em'];
        $Phone = $_POST['ph'];
        $age = $_POST['ag'];
        $passwo = md5($_POST['pas']);
        $repas = md5($_POST['repas']);

        if ($passwo != $repas) {
         ?>
            <script>
                alert('Password doesn\'t match ');
                document.getElementById('sign_wrong').style.display = 'block';
            </script>
        <?php
            exit;
        }


        include "connected.php";
        $register = mysqli_query($conn, "INSERT INTO `users`(`name`, `username`, `email`, `phone`,`age`,`password`, `type`) VALUES ('$nam','$userna','$mail','$Phone','$age','$passwo','user')");
        if ($register == true) {
            header('Location: log_in.php');
        }
    }
    ?>
    <?php
    session_start();
    if (isset($_POST["Submit"])) {
        $uname = $_POST['username'];
        $password = md5($_POST['password']);
        include "connected.php";
        if ($uname != "" && $password != "") {

            $sql_query = "SELECT count(*) as cntUser from `users` WHERE (`email` ='" . $uname . "' or `username` ='" . $uname . "' or `phone` ='" . $uname . "') and `Password` ='" . $password . "'";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);
            $count = $row['cntUser'];

            $get = mysqli_query($conn, "SELECT * FROM `users` WHERE (`email` ='" . $uname . "' or `username` ='" . $uname . "' or `phone` ='" . $uname . "') and `Password` ='" . $password . "'");
            if (mysqli_num_rows($get) > 0) {
                while ($r = mysqli_fetch_array($get)) {
                    $_SESSION['users'] = $r['username'];
                    $_SESSION['id'] = $r['user_id'];
                }
            }

            $res = mysqli_query($conn, $sql_query);
            if ($count > 0) {

                header('Location: home.php');
            } else {
    ?>
                <script>
                    document.getElementById('wrong').style.display = 'block';
                </script>
    <?php
            }
        }
    }
    ?>
</body>

</html>