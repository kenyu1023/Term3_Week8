<?php
session_start();

?>
<?php include "partials/header.php"; ?>

<!DOCTYPE html>
<html>
    <body>

        <div class="login">
            <h1>Login</h1>
            <form action="user-page.php" method="post">

                <div class="login-form">
                    <label>Username</label></div>
                    <input type="text"
                           name="username"
                           placeholder="User Name" />

                    <label>Password</label>
                    <input type="text"
                           name="password"
                           placeholder="Password" />

                    <input type="submit"
                           value="Log in"
                           name="submit">
            </form>
        </div>
        
        <?php
            if(isset($_POST["submit"]) AND !empty($_POST["username"])) {

                include "db.php";

                if(!db_connect()) {
                    echo"<p>Connection Failed</p>";
                }
                else {

                    $username = mysqli_real_escape_string(db_connect(),$_POST["username"]);
                    $password = mysqli_real_escape_string(db_connect(),$_POST["password"]);

                    $query = "SELECT * FROM login_tb
                                  WHERE username = '$username' AND password = '$password'";

                    $queryResult = mysqli_query(db_connect(), $query);

                    $row = mysqli_num_rows($queryResult);

                    if($row == 1){
                        $_SESSION["uname"] = $username;
                        header("location:user-page.php");
                    }
                    else {
                        echo "<p>Username or Password is invaild</p>";
                    }  
                }     
            }

        if(isset($_SESSION["uname"])) {
            header("location:user-page.php");
        } 

        ?>
    </body>
</html>