<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home page</title>
        <link rel='stylesheet' href="style.css">
        <link rel='stylesheet' href="../style.css">
    </head>
<body>
<div>
    <header>
        <div class="header-background"></div>
        <div class='logo'>
            <img src='images/logo.png' width="400px" alt='My logo' />
        </div>
        <div class='navbar'>
            <ul>
                <li>
                    <a href="index.php">Home Page</a>
                </li>
                <li>
                    <a href="AllFurniture.php">All furniture</a>
                </li>
                
                <?php
                if(isset($_SESSION["userid"])) { //if im logged in and have my session id running inside session. Also section names changes
                    ?>
                    <li><a href="signup_form.php">Signup</a></li>
                    <li><a href="#"><?php echo "Hello, " . $_SESSION["useruid"] . "!"; ?></a></li>
                    
                    <li><a href="includes/logout.php" class="header-login-a">Logout</a></li>
                    <?php
                }
                else { // if im not logged in, have this section shown
                    ?>
                    <li><a href="login_form.php">Login</a></li>
                    
                    <?php
                    }
                ?>
            </ul>
        </div>
    </header>
</div>
</body>

</html>