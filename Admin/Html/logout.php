<?php   
session_start(); //to ensure you are using same session
unset($_SESSION['LoggedUser']);
header("location:../adminlog.html"); //to redirect back to after logging out
exit();
?>