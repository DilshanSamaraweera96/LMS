<?php

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

//DELETE SECTION

if( isset($_GET['newsid']))
{

    $newsid = $_GET['newsid'];

    $delnews = "DELETE FROM booknews WHERE newsid ='$newsid'";

    $delright = $mysqli->query($delnews);

    if($delright==true)
    {
        header("location:../Dashboard.php?delnews#issue_data");

        }
    else
        {
            header("location:../Dashboard.php#issue_data");
           
        }
}