<?php
require("connection.php");
session_start();

// Prevent access to the login page if the user is already logged in
if (isset($_SESSION['Username'])) {
    header("Location: dashboard2.php");
    exit();
}

if (isset($_POST['Signin'])) {
    // Escape user inputs to prevent SQL injection
    $username = mysqli_real_escape_string($db, $_POST['Username']);
    $password = mysqli_real_escape_string($db, $_POST['Password']);

    $query = "SELECT * FROM `users` WHERE `email`='$username' AND `password`='$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        $use = mysqli_fetch_array($result);
        $_SESSION['Username'] = $use['Firstname'];
        $_SESSION['login']='YES';
        header("Location: dashboard2.php");
        exit();
    } else {
        echo "<script>alert('Incorrect Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATASHEET MANAGEMENT SYSTEM Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script type="text/javascript">
        // Prevent the use of the back button
        (function (global) {
            if (typeof (global) === "undefined") {
                throw new Error("window is undefined");
            }
            var _hash = "!";
            var noBackPlease = function () {
                global.location.href += "#";
                global.setTimeout(function () {
                    global.location.href += "!";
                }, 50);
            };
            global.onhashchange = function () {
                if (global.location.hash !== _hash) {
                    global.location.hash = _hash;
                }
            };
            global.onload = function () {
                noBackPlease();
                document.body.onkeydown = function (e) {
                    var elm = e.target.nodeName.toLowerCase();
                    if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
                        e.preventDefault();
                    }
                    e.stopPropagation();
                };
            };
        })(window);
    </script>
</head>
<body id="loginbody">
    <div class="container">
        <div class="loginheader">
            <h1>SIM</h1>
            <h4>SYSTEM INVENTORY MANAGEMENT</h4>
        </div>
        <div class="loginbody">
            <form method="POST" action="">
                <div class="logininputscontainer">
                    <label for="">Username</label>
                    <input type="text" name="Username" required/>
                </div>
                <div class="logininputscontainer">
                    <label for="">Password</label>
                    <input type="password" name="Password" required/>
                </div>
                <div class="loginbuttoncontainer">
                    <button type="submit" name="Signin">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
