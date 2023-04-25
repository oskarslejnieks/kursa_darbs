<?php
    include_once 'classes/dbh-image.php'; // with prepared statements

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) { // if there is a mistake in statement
        echo "<p>SQL statement failed!</p>";
    }
    else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while($row = mysqli_fetch_assoc($result)) { // while there is a rows in database

            echo '
            <div class="flexbox">
                <a class="image-container">
                ';
                if(isset($_SESSION['userid'])) {
                    echo '<input type="checkbox" name="delete_id[]" value='.$row['id'].'>';
                    
                } echo'
                    
                    <h2>'.$row["title"].'</h2>
                    <img class="img-css" src="gallery/catalogImages/'.$row['fileName'].'"/>
                    <h3>Price: '.$row['price'].'$</h3>
                    <h4>Left in inventory: '.$row['count'].'</h4>
                    <h4>Size: '.$row['dimensions'].' (GxPxA)</h4>
                    
                    <p>'.$row["paragraph"].'</p>';
                    
                    
                    echo '
                </a>
            </div>
            ';
            
        }
    }
    if(isset($_SESSION['userid'])) {
        echo ' <button class="btn btn-delete" name="deleteGalleryButton" type="submit" style="font-size: 20px; ">Delete posts</button>  ';
    }
?>
