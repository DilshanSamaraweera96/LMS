<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

if( isset($_GET['collect'])){

   $mem_id = $_GET['collect'];

   $bid = $_GET['book'];

   $getcdate = "SELECT * FROM issuebook WHERE memberid='$mem_id' AND bookid='$bid'";

   $getresult = mysqli_query($mysqli,$getcdate);

   $getcheck = mysqli_fetch_assoc($getresult);

   

   if(empty($getcheck['returndate']))
   {
            $collectdate = $getcheck['collectdate'];

            $returndate = date('Y-m-d', strtotime($collectdate.'+14 days'));

            $query = "UPDATE issuebook SET returndate ='$returndate' WHERE memberid='$mem_id' AND bookid='$bid'";

            $right = $mysqli->query($query);

            if($right==true)
                {
                $_SESSION['message'] = "Member Collected The Reserved Book!";
                $_SESSION['type'] = "alert-success";

                header("location:issuebooks.php");

                }
                else
                {
                    $_SESSION['message'] = "Sorry! Can't Collect The Book!";
                    $_SESSION['type'] = "alert-danger";

                    header("location:issuebooks.php");
                   
                }
    }
    else
    {
        $_SESSION['message'] = "Member ALREADY Collected Reserved Book!";
        $_SESSION['type'] = "alert-danger";
        header("location:issuebooks.php");

        
    }

}

?>