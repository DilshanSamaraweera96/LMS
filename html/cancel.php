<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

//DELETE ISSUED BOOK

if( isset($_GET['book']))
{


    
    $bookid = $_GET['book'];
    $memid= $_GET['mem'];

            //Check avalibility of pending request

            $pen = "SELECT * FROM issuebook WHERE issuedate IS NULL AND bookid='$bookid' ORDER BY issueid ASC";

            $penr = mysqli_query($mysqli,$pen);
    
            $penc = mysqli_fetch_assoc($penr);
    
            $p = $penc['memberid'];
    
    
           //check quantity is 0
    
    
            $chkqty = "SELECT quantity FROM addbook WHERE book_id='$bookid'";
    
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
                    $reqty ="UPDATE addbook SET quantity = quantity -1 WHERE book_id='$bookid'";
    
                    $reqtyr = mysqli_query($mysqli, $reqty);
    
                                            //SET NOTIFICATION 
    
                                            $ada = date('Y-m-d H:i:s');
    
                                            //Get msg into variable
                                
                                            $gtmsg= "SELECT msg FROM notification WHERE msgid=4";
                                
                                            $colmsg = mysqli_query($mysqli,$gtmsg);
                                
                                            $colmsgcheck = mysqli_fetch_assoc($colmsg);
                                
                                            $msg = $colmsgcheck['msg'];
                                
                                
                                
                                            $not = "INSERT INTO notification(memberid, msg, date) VALUES ('$p','$msg','$ada')";
                                
                                            $notquery = mysqli_query($mysqli, $not);
                                
                                            //notification entered.
    
                }
            }
    

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
        $_SESSION['message'] = "Your Book Reservation Cancelled!";
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