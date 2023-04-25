<?php
	include_once 'header.php';
    include_once 'classes/dbh-image.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type="text/css" href="style.css">
    <title>All furniture</title>
</head>
<body>
<h1 class="heading-all">All furniture</h1>
    <section>
        <div class="container">
        <form  method="POST" action="gallery/delete-post.php">

            <?php
            
            $sql = "select * from gallery order by id desc;";

            include_once "gallery-output.php";

            
            echo '</form>';
            ?>
            <?php 
            
    if(isset($_SESSION['userid'])) { //if session variable isset. That means, if logged in
        echo '
        <div class="form-container">
        <div class="gallery-upload-form">
            <h4>Add new post</h4>
             <form method="post" action="gallery/gallery-upload.php" enctype="multipart/form-data">
                 <input type="text" name="title" placeholder="Enter title">
                 <input type="number" min="0" step=".01" name="price" placeholder="Enter price">
                 <input type="number" min="0" step="1" name="count" placeholder="Enter count">
                 <input type="text" name="dimensions" placeholder="Enter size (GxPxA)(mm)"> 
                 <input type="text" name="filename" placeholder="Enter file name">
                 <textarea type="text" name="paragraph" placeholder="Enter details"></textarea><br>
                 <label>Select furniture type</label><br>
                 <select name="category" id="furniture">
                     <option value="table">Table</option>
                     <option value="chair">Chair</option>
                     <option value="sofa">Sofa</option>
                     <option value="bed">Bed</option>
                     <option value="desk">Desk</option>
                     <option value="cupboard">Cupboard</option>
                 </select>
                 <input type="file" name="file">
                 <button type="submit" name="submit">Upload</button>
            </form>
        </div>
    </div>
       ';
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyinput') {
            echo "<p class='error'>Fill in all the fields!</p>";
        }
    }
   ?>

        
        </div>      
        <?php
        include_once 'sidebar.php';
        ?>
    </section>
    
</body>
</html>
<body>

</body>

</html>