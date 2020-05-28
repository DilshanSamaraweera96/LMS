<?php

 $currentdate = date('Y-m-d');
 $collectdate = date('Y-m-d', strtotime($currentdate.'+20 days'));

 echo $currentdate;
 echo $collectdate;

 $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli));

 $sql = "SELECT quantity FROM addbook WHERE book_id='27' ";
 $qtyresult = mysqli_query($mysqli,$sql);

 $row = mysqli_fetch_assoc($qtyresult);



  if($row['quantity'] > 0)
  {
    $sql= "INSERT INTO days (today, nextday) VALUES ('$currentdate','$collectdate')";


    $right = $mysqli->query($sql);

    if($right==true)
      {
      echo "Notification : book resereved suucessful";
      }
      else
      {
      echo "Notification : book didnt reserved";
      }
  }
?>