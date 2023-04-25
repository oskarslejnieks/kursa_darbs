<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel='stylesheet' href="style.css">
</head>

<body>
    <div class="form-login-signup">
        <div class="login">
            <h4>Sign Up an Administrator</h4>
            <form class="form-login" action="includes/signup.php" method="post">
                <input type="text" name="uid" placeholder="Admin Username">
                <input type="password" name="pwd" placeholder="Admin Password">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                <input type="text" name="email" placeholder="Email">
                <br>
                <?php

                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'emptyinput') {
                        echo "<p class='error'>Fill in all the fields!</p>";
                    }
                    if ($_GET['error'] == 'invalidusername') {
                        echo "<p class='error'>Invalid Username. Your username can only contain numbers and letters!</p>";
                    }
                    if ($_GET['error'] == 'invalidemail') {
                        echo "<p class='error'>Provide valid email!</p>";
                    }
                    if ($_GET['error'] == 'pwddoesntmatch') {
                        echo "<p class='error'>Passwords doesn't match!</p>";
                    }
                    if ($_GET['error'] == 'usenametaken') {
                        echo "<p class='error'>Username is already taken!</p>";
                    }
                    if ($_GET['error'] == 'none') {
                        echo "<p class='success'>Admin succesfully registred!</p>";
                    }
                }

                ?>
                <button type="submit" name="submit">Register</button>
            </form>
        </div>
    </div>
</body>

</html>