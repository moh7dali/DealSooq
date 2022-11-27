<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/loginstyle.css">
    <link rel="icon" href="../photo/Deal1.png">
    <script src="https://kit.fontawesome.com/04b6044f71.js" crossorigin="anonymous"></script>
    <title>Login admin page</title>
</head>

<body>
    <div class="main">
        <div class="container a-container" id="a-container">
            <form class="form" id="b-form" method="POST">
                <h2 class="form_title title">Sign in</h2>
                <span class="form__span">Enter your user name and password</span>
                <input class="form__input" type="text" placeholder="User name" name="username">
                <input class="form__input" type="password" placeholder="Password" name="password">
                <a href="forget.php" class="form__link">Forgot your password?</a>
                <label id="wrong">wrong password or email ...!</label>
                <button class="form__button button" name="Submit">SIGN IN</button>
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
        </div>
    </div>

    <script src="js/main.js">
    </script>

    <?php
    session_start();
    if (isset($_POST["Submit"])) {
        $uname = $_POST['username'];
        $password = $_POST['password'];
        include "../connected.php";
        $uname = $_POST['username'];
        $password =$_POST['password'];
        if ($uname != "" && $password != "") {

            $sql_query = "SELECT count(*) as cntUser from `admin` WHERE `username` ='" . $uname . "' and `Password` ='" . $password . "'";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);
            $count = $row['cntUser'];

            $get = mysqli_query($conn, "SELECT username FROM `admin` WHERE `username` ='" . $uname . "' and `Password` ='" . $password . "'");
            if (mysqli_num_rows($get) > 0) {
                while ($r = mysqli_fetch_array($get)) {
                    $_SESSION['users1'] = $r['username'];
                    $_SESSION['id'] = $r['user_id'];
                }
            }

            $res = mysqli_query($conn, $sql_query);

            if ($count > 0) {
                header('Location: index.php');
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