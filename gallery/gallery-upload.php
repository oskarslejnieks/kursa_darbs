<?php

        if(isset($_POST['submit'])) {
            //Grab every input
            $title = $_POST['title'];
            $paragraph = $_POST['paragraph'];
            $fileName = $_POST['filename'];
            $price = $_POST['price'];
            $count = $_POST['count'];
            $dimensions = $_POST['dimensions'];
            $imgFile = $_FILES['file']; //grabbing the file
            $category = $_POST['category'];
        
            if(empty($fileName)) { // if this has been left empty
                $fileName = "gallery";
            }
            else {
                $newFile = strtolower(str_replace(" ", "-",$fileName)); // small caps and built-in function str_replace that replaces any symbol, so if there is spacebar, it will instead join with - symbol                                                // 
            }
        //info about uploaded file
            $uploadedFileName = $imgFile['name'];
            $uploadedFileType = $imgFile['type'];
            $uploadedFileTemp = $imgFile['tmp_name'];
            $uploadedFileError = $imgFile['error'];
            $uploadedFileSize = $imgFile['size'];
        
            $fileExt = explode(".",$uploadedFileName); // take a part of the name of the file to get only extension. EveryThing after punctionation.
            $lowerStrExt = strtolower(end($fileExt)); //grabs last index of an array so u get for example .jpg. Turn string to lower caps
        
            $allowedType = array("jpeg", "jpg", "png", "jfif"); // what kind of filetypes are allowed
    
            if(in_array($lowerStrExt, $allowedType)) { //method that checks if specific string is inside of indexes of array. Checks for extenction in allowed type array
                if($uploadedFileError == 0) { //no error 
                    if($uploadedFileSize > 5000000) { //bigger than 5 mb
                        header("location: ../AllFurniture?error=filesizetoobig");
                        exit();
                    }
                    else {
                        $imageFullName = $newFile . "." . uniqid("", false) . "." . $lowerStrExt; // makes uniq id after picture's name
                        $fileDst = "catalogImages/" . $imageFullName; //saves in this folder
        
                        include_once '../classes/dbh-image.php';
                            $sqlSelect = "select * from gallery "; //sql
                            $stmt = mysqli_stmt_init($conn); // prepared statement using $conn variable. Initializes a statement and returns an object for use with mysqli_stmt_prepare
        
                            if(!mysqli_stmt_prepare($stmt, $sqlSelect)) { //if statement wasnt prepared
                                echo "<p>SQL statement failed</p>";
                            }
                            else {
                                mysqli_stmt_execute($stmt); // statement actually executes
                                $result = mysqli_stmt_get_result($stmt); // built-in function to get stmt result on screen. Gets a result set from a prepared statement
                                $rowCount = mysqli_num_rows($result); //  gets num of rows of result
        
                                $setImageOrder = $rowCount + 1; // column order
        
                                $sqlInsert = "insert into gallery (title, paragraph, fileName, category, galleryOrder, count, price, dimensions) values (?, ?, ?, ?, ?, ?, ?, ?);";
        
                                if(!mysqli_stmt_prepare($stmt, $sqlInsert)) {
                                    echo "<p>Failed</p>";
                                }
                                else {
                                    if(empty($title) || empty($paragraph) || empty($price) || empty($count) || empty($dimensions)) {
                                        header("location: ../AllFurniture.php?error=emptyinput");
                                        exit();
                                    }
                                    //function is used to bind variables to the parameter markers of a prepared statement. ssssss are all string types
                                    mysqli_stmt_bind_param($stmt, "ssssssss", $title, $paragraph, $imageFullName, $category, $setImageOrder, $count, $price, $dimensions); // parameters that will binded to placeholders (?, ?...)
                                    mysqli_stmt_execute($stmt);  //it actually executes and data is uploaded to database
        
                                    move_uploaded_file($uploadedFileTemp, $fileDst); //built-in method. Takes 2 parameters - From - To
                                      
                                    header("location: ../AllFurniture.php?upoload=success");

                                }
                            }
                    }
                }
                else {
                    echo "<p>Error</p>";
                }
            }
            else {
                echo "<p>Allowed file types are .jpeg, .jpg, .png or .jfif</p>";
                exit();
            }
    }