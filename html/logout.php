<?php   
session_start(); //to ensure you are using same session
unset($_SESSION['LoggedInUserId']);
header("location:../index.php?signout"); //to redirect back to "index.php" after logging out
exit();
?>