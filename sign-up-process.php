
<?php 

function prevent($this, $connection) {
    stripslashes($this);
    mysqli_real_escape_string($connection, $this);
    return $this;
}

if(isset($_POST['username']) AND isset($_POST['password'])){

    include "db.php";

    if(!$connection) {
        echo "Connection Failed";
    }
    else {

        $username =  $_POST['username'];
        $password =  $_POST['password'];

        prevent($username, $connection);
        prevent($password, $connection);

        // password_hash()
        // Creates a password hash using a strong one-way
        // hashing algorithm. The first parameter is the password
        // you want to hash while the second specifies the algorithim.
        // A random salt is added to the hash as well
        $hashSaltPassword = password_hash($password, PASSWORD_DEFAULT);

        $insert = "INSERT INTO login_tb (username, password) 
					   VALUES ('$username', '$hashSaltPassword')";

        $insertResult = mysqli_query($connection, $insert);

        //header("location: signUpSuccess.php");

        if($insertResult) {
            echo "<h1>Sign Up Successful</h1>";
        }
        else {
            echo "<p>Sign Up FAILED</p>";
        }
    }
}
?>
