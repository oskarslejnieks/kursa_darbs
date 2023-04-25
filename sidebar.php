<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="style.css">
    <title>Sidebar</title>
</head>
<body>
<div class="sidebar">
    <div class="sidebar-background">
        <ul>
        <?php
            include_once 'search/search_form.php';
            
        ?>
            <a href="AllFurniture.php"><li>All products</li></a>
            <a href="tables.php"><li>Tables</li></a>
            <a href="chairs.php"><li>Chairs</li></a>
            <a href="sofas.php"><li>Sofas</li></a>
            <a href="beds.php"><li>Beds</li></a>
            <a href="desks.php"><li>Desks</li></a>
            <a href="cupboard.php"><li>Cupboards</li></a>
            
        </ul>
    </div>
           
        </div>
</body>
</html>