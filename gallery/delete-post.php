<?php

include_once '../classes/dbh-image.php';
if(isset($_POST['deleteGalleryButton'])) {
    
    $numberOfCheckboxes = count($_POST['delete_id']);
    
    $i = 0;

    while($i<$numberOfCheckboxes) {

        $deleteKey = $_POST['delete_id'][$i];
        $sqlDelete = mysqli_query($conn, "delete from gallery where id = '$deleteKey';");

        $i++;
    }

    header("location: ../AllFurniture.php?delete=success");

}