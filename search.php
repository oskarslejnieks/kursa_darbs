<?php
    include_once 'classes/dbh-image.php';
    include_once 'header.php';
?>


<h1 class="heading-all">Search results</h1>

<section>
    <div class="container">
    <form  method="POST" action="gallery/delete-post.php">
                <?php
                    if(isset($_POST['searchButton'])) {
                        $search = mysqli_real_escape_string($conn, $_POST['search']); // function for making sure, user does not do a database injection
                        
                        //Search the webpage for whatever user typed in
                        $sqlSelect = "select * from gallery where title like '%$search%' 
                        OR paragraph like '%$search%'
                        OR category like '%$search%'
                        OR price like '%$search%'
                        OR dimensions like '%$search%';    
                        "; // checks if the title has any kind of key word like what was typed in
                        $result = mysqli_query($conn, $sqlSelect);
                        $numOfRows = mysqli_num_rows($result); // counts how many rows are in database


                        if($numOfRows < 1) {
                            // header("location: search.php?erorr=noresults");
                            ?>
                            <h1 class="heading-all-center">No search results!</h1>
                            <?php
                        }
                        else {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '
                                <div class="flexbox">
                                    <a class="image-container">
                                    
                                        <h2>'.$row["title"].'</h2>
                                        <img class="img-css" src="gallery/catalogImages/'.$row['fileName'].'"/>
                                        <h3>Price: '.$row['price'].'$</h3>
                                        <h4>Left in inventory: '.$row['count'].'</h4>
                                        <h4>Size: '.$row['dimensions'].' (GxPxA)</h4>
                                        <p>'.$row["paragraph"].'</p>
                                        ';
                                        echo '
                                    </a>
                                </div>';
                            }
                        }
                    }
                    echo '</form>';
                ?>
    </div>
</section>
