<?php
if(isset($_POST["submit"])) { // If user has pressed submit button
    // Grabbing the data
    $title = $_POST['title'];
    $paragraph = $_POST['paragraph'];
    $fileName = $_POST['filename'];
    $price = $_POST['price'];
    $count = $_POST['count'];
    $dimensions = $_POST['dimensions'];
    $imgFile = $_FILES['file']; //grabbing the file

    //Instantiate SignupController class
    include "../classes/dbh.php";
    include "../gallery/gallery-classes.php";
    include "../gallery/gallery-controller.php";
    include "../gallery/file-upload.php";


    $gallery = new GalleryController($title, $paragraph, $fileName, $price, $count, $dimensions);

    //Error handlers

    $gallery->checkGallery();

}