<?php

  // Instantiate DB & connect
  $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli));


  if(isset($_GET['book']))
  {

    
    $book_id = $_GET['book'];
    $user_id = $_GET['mem'];

  //Get current date & collect date

  $currentdate = date('Y-m-d');
  $collectdate = date('Y-m-d', strtotime($currentdate.'+3 days'));



  //get the book quantity;

  $sql = "SELECT quantity FROM addbook WHERE book_id='$book_id' ";
  $qtyresult = mysqli_query($mysqli,$sql);

  $row = mysqli_fetch_assoc($qtyresult);

  //insert data into issue table

  if($row['quantity'] > 0)
  {
    $sql= "INSERT INTO issuebook(memberid, bookid, issuedate, collectdate) VALUES ('$user_id','$book_id','$currentdate','$collectdate')";


    //update book quantity

    $upqty = "UPDATE addbook SET quantity = quantity -1 WHERE book_id=$book_id";

    $right = $mysqli->query($sql) && $mysqli->query($upqty);

    if($right==true)
      {
        header("location:reservesuccess.html");
      }
      else
      {
        header("location:bookerror.html");
      }
  
  }

  else
  {
    //send pending reservation to database

    $pensql= "INSERT INTO issuebook(memberid, bookid) VALUES ('$user_id','$book_id')";

    $penright = $mysqli->query($pensql);

    if($penright)
    {
      header("location:pendingmsg.html");
    }
    else 
    {
      header("location:bookerror.html");
    }

  }
}

?>