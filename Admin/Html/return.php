<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli));

if( isset($_GET['return'])){

   $mem_id = $_GET['return'];

   $bid = $_GET['book'];

   $redate = "SELECT * FROM issuebook WHERE memberid='$mem_id' AND bookid='$bid'";

   $result = mysqli_query($mysqli,$redate);

   $recheck = mysqli_fetch_assoc($result);


    if(empty($recheck['completedate']))
    {

        //Check avalibility of pending request

        $pen = "SELECT * FROM issuebook WHERE issuedate IS NULL AND bookid='$bid'";

        $penr = mysqli_query($mysqli,$pen);

        $penc = mysqli_fetch_assoc($penr);

        $p = $penc['memberid'];


       //check quantity is 0

        $upqty = $recheck['bookid'];

        $chkqty = "SELECT quantity FROM addbook WHERE book_id='$upqty'";

        $chkres = mysqli_query($mysqli, $chkqty);

        $chkchk = mysqli_fetch_assoc($chkres);

        $c= $chkchk['quantity'];


        //issue dates to pending reservations

        if($c==0 && !empty($p))
        {
            $currentdate = date('Y-m-d');
            $collectdate = date('Y-m-d', strtotime($currentdate.'+3 days'));

            $assign = "UPDATE issuebook SET issuedate='$currentdate', collectdate='$collectdate' WHERE memberid='$p'";

            $assignr = mysqli_query($mysqli, $assign);

            //reduce quantity

            if($assignr == true)
            {    
                $reqty ="UPDATE addbook SET quantity = quantity -1 WHERE book_id='$upqty'";

                $reqtyr = mysqli_query($mysqli, $reqty);

                if($reqtyr == true)
                {

                $_SESSION['msg'] = "Book AUTOMATICALLY Assigned to Pending Reservations!";
                $_SESSION['ptype'] = "alert-success";

                header("location:returnbooks.php");


                }
                else
                {

                $_SESSION['msg'] = "Can't Assign Book to Pending Reservations!";
                $_SESSION['ptype'] = "alert-danger";

                header("location:returnbooks.php");

                }

            }
        }
    


    //update quantity when return +1

    $quan = "UPDATE addbook SET quantity = quantity +1 WHERE book_id='$upqty'";

    $quanres = mysqli_query($mysqli,$quan);


        //set complete date

            $gavedate = date('Y-m-d');

            $query = "UPDATE issuebook SET completedate ='$gavedate' WHERE memberid='$mem_id' AND bookid='$bid'";

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