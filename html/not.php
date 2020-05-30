<?php

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

if( isset($_GET['mem'])){

   $mem_id = $_GET['mem'];
   $date = $_GET['date'];

   $date= date('Y-m-d H:i:s', strtotime($date));

   //set memberid and date to null
   echo $date;
   echo $mem_id;

   $not="DELETE FROM notification WHERE memberid='$mem_id' AND date='$date'";
   $notquery = mysqli_query($mysqli,$not);

    if($notquery==true)
   {
   header("location:../index.php");
   }
}