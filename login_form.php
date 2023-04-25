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
           <h4>Login</h4>
           <form class="form-login" action="includes/login.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <br>
                <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'wrongpassword') {
                            echo "<p class='error'>Wrong Username or password!</p>";
                        }
                        if ($_GET['error'] == 'emptyinput') {
                            echo "<p class='error'>Fill in Login and password!</p>";
                        }
                    }
                ?>
                <button type="submit" name="submit">Login</button>
           </form>
       </div>
   </div>
</body>

</html>