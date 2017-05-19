<?php
session_start();
if (isset($_POST["logout"]) && !isset($_SESSION["uname"])) {
    unset($_SESSION['uname']);
    session_destroy();
    header("location:login.php");
}
include "partials/header.php";
?>

<div class="user-page">
        <h1>Welcome!</h1>
        <div class="user-form">
            <form action="user-page-process.php" method="post" enctype="multipart/form-data">
                <label>Thumbnail Image</label>
                <input type="file"
                       id="thumbnailImg"
                       name="thumbnailImgUploaded" />
                
                <label>Big Image</label>
                <input type="file"
                       id="BigImg"
                       name="BigImgUploaded" />
            
                <label>Name</label>
                
                    <input type="text"
                           name="name"
                           id="name"
                           placeholder="Name">
  
                    <label>Skill</label>

                    <select name="skill">
                        <option>lorem ipsum</option>
                        <option>lorem ipsum</option>
                        <option>lorem ipsum</option>
                        <option>lorem ipsum</option>
                        <option>lorem ipsum</option>
                    </select>

                    <label>Habitat</label>

                    <input type="text"
                           name="habitat"
                           id="habitat"
                           placeholder="Habitat">

                    <label>Description</label>
                    <textarea name="description"
                              id="description"
                              placeholder="Description"></textarea>      
                
                    <input type="submit"
                           name="submit"
                           value="Submit" />
                
            </form>

            <form action="user-page.php" method="post">
                <input type="submit"  name="logout" value="Log out" /> 
            </form>
        </div>
    </div>

