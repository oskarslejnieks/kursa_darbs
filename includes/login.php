
<?php

if(isset($_POST["submit"])) { // If user has pressed submit button
    // Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    //Instantiate SignupController class
    include '../classes/dbh.php';
    include "../classes/login-classes.php";
    include "../classes/login-controller.php";

    $login = new LoginController($uid, $pwd);

    //Error handlers

    $login->loginUser();

    header("location: ../index.php?error=none");
}