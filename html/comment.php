<?php
//connect db

$mysqli = new mysqli('localhost','root','12345','sipsewana') or die(mysqli_error($mysqli));

if(isset($_POST['comment']))
{

    $user = $_POST['user'];
    $cmtmsg = $_POST['commsg'];
    $cmtdate = date('Y-m-d H:i:s');

    //get user name

    $getUserName = "SELECT fullname FROM user_register WHERE `mem-id`='$user'";
    $UserNameQuery = mysqli_query($mysqli,$getUserName);

    if($UserNameQuery==true)
    {
        $getResult = mysqli_fetch_assoc($UserNameQuery);
        $fullname = $getResult['fullname'];

        $cmt = "INSERT INTO comments(member,comment,comdate) VALUES ('$fullname','$cmtmsg','$cmtdate')";
        $cmtresult = mysqli_query($mysqli,$cmt);

        if($cmtresult==true)
        {
            header("location:../index.php#comments");
        }
        else
        {
            header("location:../index.php?comment");
        }
   }

}