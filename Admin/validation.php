<?php
session_start();

$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli)); 

if(isset($_POST['logbtn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM adminlogin  WHERE  username = '$username' AND password = '$password'";
    $result = $mysqli->query($sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_row($result);

    if ($count == 1) {

        $_SESSION['LoggedInUserId'] = $row[0];

        $admin = $_SESSION['LoggedInUserId'];

        header("location: html/welcome.html");
    } else {
        
        header('location: html/loginerror.html');
        
    }
    
}
?>




