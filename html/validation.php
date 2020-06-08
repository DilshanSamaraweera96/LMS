<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli));

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM user_register  WHERE  email = '$email' AND password = '$password'";
    
    $result = $mysqli->query($sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_row($result);
    echo $row[0];
    if ($count == 1) {
        $_SESSION['LoggedInUserId'] = $row[0];        
        $_SESSION['name'] = $row[1];

            
        header("location:logsuccess.php");
    } else {
        unset($_SESSION['LoggedInUserId']);
        header("location:loginerror.html");
    }
}
?>