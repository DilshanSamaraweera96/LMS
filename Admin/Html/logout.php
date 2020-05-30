<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:../adminlog.html"); //to redirect back to after logging out
exit();
?>