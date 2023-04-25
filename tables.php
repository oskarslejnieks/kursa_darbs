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
    <link rel='stylesheet' type="text/css" href="../style.css">
    <title>Tables</title>
</head>
<body>
<h1 class="heading-all">Tables</h1>
<section>
        <div class="container">
        <form  method="POST" action="gallery/delete-post.php">
            <?php
            
            // include_once "gallery/file-upload.php";
            
            $sql = "select * from gallery where category='table' order by galleryOrder desc;";
            include_once 'gallery-output.php';

            echo '</form>';
            ?>
        </div>
        <?php
        include_once 'sidebar.php';
        ?>
</section>

</body>
</html>