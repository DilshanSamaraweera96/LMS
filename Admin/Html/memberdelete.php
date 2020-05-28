<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

//DELETE SECTION

if( isset($_GET['delete']))
{

    $memid = $_GET['delete'];

    $delmem = "DELETE FROM user_register WHERE `mem-id` ='$memid'";

    $delright = $mysqli->query($delmem);

    if($delright==true)
    {
        $_SESSION['message'] = "Member Account Has Been Deleted!";
        $_SESSION['type'] = "alert-danger";

        header("location:member.php");

        }
    else
        {
            $_SESSION['message'] = "ERROR!";
            $_SESSION['type'] = "alert-danger";

            header("location:member.php");
           
        }
}