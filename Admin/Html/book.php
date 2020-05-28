<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

//DELETE SECTION

if( isset($_GET['delete']))
{

    $bookid = $_GET['delete'];

    $delbook = "DELETE FROM addbook WHERE book_id ='$bookid'";

    $delright = $mysqli->query($delbook);

    if($delright==true)
    {
        $_SESSION['message'] = "Book Has Been Deleted!";
        $_SESSION['type'] = "alert-danger";

        header("location:allbooks.php");

        }
    else
        {
            $_SESSION['message'] = "ERROR!";
            $_SESSION['type'] = "alert-danger";

            header("location:allbooks.php");
           
        }
}