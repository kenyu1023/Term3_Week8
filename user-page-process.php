<?php
session_start();
if (isset($_POST["submit"])) {

    $targetDirectorythumbnails = "img/thumbnails/";
    $targetFileThumbnails = $targetDirectorythumbnails . basename($_FILES['thumbnailImgUploaded']['name']);
    $targetDirectorybigImg = "img/monsters/";
    $targetFileBigImg = $targetDirectorybigImg . basename($_FILES['BigImgUploaded']['name']);
    $uploadOk = true;

    include "db.php";
   

    if (!db_connect()) {
       
    } 
    else {
        $name = mysqli_real_escape_string(db_connect(), $_POST["name"]);
        $skill = mysqli_real_escape_string(db_connect(), $_POST["skill"]);
        $habitat = mysqli_real_escape_string(db_connect(), $_POST["habitat"]);
        $description = mysqli_real_escape_string(db_connect(), $_POST["description"]);
        $thumbnail = mysqli_real_escape_string(db_connect(), $targetFileThumbnails);
        $bigImg = mysqli_real_escape_string(db_connect(), $targetFileBigImg);

        if ($uploadOk == true) {
           
            move_uploaded_file($_FILES['thumbnailImgUploaded']['tmp_name'], $targetFileThumbnails) && (move_uploaded_file($_FILES['BiglImgUploaded']['tmp_name'], $targetFileBigimg));

            $insert = "INSERT INTO monstars_tb (name,skill,habitat,description,thumbnail,bigImg) VALUES ('" . $name . "','" . $skill . "','" . $habitat . "','" . $description . "','" . $thumbnail . "','" . $bigImg . "')";
                $resultInsert = mysqli_query(db_connect(), $insert);
                if ($resultInsert == true) {
                    header("location:user-page.php");
                }
            } 
            else {
                echo "Sorry your file upload fell at the last fence.";
            }
                
        }
    }

                
?>