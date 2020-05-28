<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

if( isset($_GET['return'])){

   $mem_id = $_GET['return'];

   $redate = "SELECT * FROM issuebook WHERE memberid='$mem_id'";

   $result = mysqli_query($mysqli,$redate);

   $recheck = mysqli_fetch_assoc($result);


    if(empty($recheck['completedate']))
    {


        //update quantity when return +1

        $upqty = $recheck['bookid'];
     
        $quan = "UPDATE addbook SET quantity = quantity +1 WHERE book_id='$upqty'";
     
        $quanres = mysqli_query($mysqli,$quan);

            $gavedate = date('Y-m-d');

            $query = "UPDATE issuebook SET completedate ='$gavedate' WHERE memberid='$mem_id'";

            $right = $mysqli->query($query);


            if($right && $quanres==true)
                {

                
                $_SESSION['message'] = "Member Returned The Reserved Book!";
                $_SESSION['type'] = "alert-success";

                header("location:returnbooks.php");

                }
                else
                {
                    $_SESSION['message'] = "Sorry! Can't Return The Book!";
                    $_SESSION['type'] = "alert-danger";

                    header("location:returnbooks.php");
                   
                }
    }
    else
    {
        $_SESSION['message'] = "Member ALREADY Returned Reserved Book!";
        $_SESSION['type'] = "alert-danger";
        header("location:returnbooks.php");

        
    }

}

?>