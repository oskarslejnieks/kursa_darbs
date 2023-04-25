<?php

if(isset($_POST["submit"])) { // If user has pressed submit button
    // Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    //Instantiate SignupController class
    include '../classes/dbh.php';
    // include '../classes/dbh-image.php';
    include "../classes/signup-classes.php";
    include "../classes/signup-controller.php";

    $signup = new SignupController($uid, $pwd, $pwdRepeat, $email); //new object from class

    //Error handlers

    $signup->signupUser();

    header("location: ../signup_form.php?error=none");    
}