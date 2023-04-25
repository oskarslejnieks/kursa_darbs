<?php   
     $file = $_FILES['file'];

        $fileName = $_POST['filename'];

        $uploadedFileName = $file['name'];
        $uploadedFileTemp = $file['tmp_name'];
        
        if(empty($fileName)) { // if this has been left empty
            $fileName = "gallery";
        }
        else {
            $newFile = strtolower(str_replace(" ", "-",$fileName)); // small caps and built-in function str_replace that replaces any symbol, so if there is spacebar, it will instead join with - symbol                                                // 
        }
        $fileExt = explode(".",$uploadedFileName); // take a part of the name of the file to get only extension
        $lowerStrExt = strtolower(end($fileExt)); //grabs last index of an array so u get for example .jpg
        
        $allowedType = array("jpeg", "jpg", "png", "jfif"); // what kind of filetypes are allowed

        $imageFullName = $newFile . "." . uniqid("", false) . "." . $lowerStrExt; // makes uniq id after picture's name
        $fileDst = "catalogImages/" . $imageFullName;


        move_uploaded_file($uploadedFileTemp, $fileDst);