<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

//DELETE ISSUED BOOK

if( isset($_GET['book']))
{

    
    $bookid = $_GET['book'];
    $memid= $_GET['mem'];
    

    //update quantity by +1 

    $redate = "SELECT * FROM issuebook WHERE bookid='$bookid' AND memberid='$memid' AND issuedate IS NOT NULL";

    $result = mysqli_query($mysqli,$redate);
 
    $recheck = mysqli_fetch_assoc($result);

    $upqty = $recheck['bookid'];
   
    $quan = "UPDATE addbook SET quantity = quantity +1 WHERE book_id='$upqty'";
 
    $quanres = mysqli_query($mysqli,$quan);



    //delete issue book data 

    $delmem = "DELETE FROM issuebook WHERE memberid ='$memid' AND bookid='$bookid' AND issuedate IS NOT NULL";

    $delright = $mysqli->query($delmem);

    if($delright && $quanres==true)
    {
        $_SESSION['message'] = "You Book Reservation Cancelled!";
        $_SESSION['type'] = "alert-danger";

        header("location:account.php");

        }
    else
        {
            $_SESSION['message'] = "ERROR!";
            $_SESSION['type'] = "alert-danger";

            header("location:account.php");
           
        }
}

//DELETE PENDING REQUEST

if( isset($_GET['pbook']))
{

    $pbook = $_GET['pbook'];
    $pmem = $_GET['pmem'];

    $delmemp = "DELETE FROM issuebook WHERE memberid ='$pmem' AND bookid='$pbook' AND issuedate IS NULL";

    $delrightp = $mysqli->query($delmemp);

    if($delrightp==true)
    {
        $_SESSION['msg'] = "Book Reservation Request Cancelled!";
        $_SESSION['ptype'] = "alert-danger";

        header("location:account.php");

        }
    else
        {
            $_SESSION['msg'] = "ERROR!";
            $_SESSION['ptype'] = "alert-danger";

            header("location:account.php");
           
        }
}