<?php

$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli)); 

        //send msg to db
        if(isset($_POST['send']))
        {
        $member = $_POST['sendto'];
        $message = $_POST['message'];
        $today =  date('Y-m-d H:i:s');

        $message = $mysqli->real_escape_string($message);

        $send_msg = "INSERT INTO chat (msg_from, msg_to, msg, date, seen) VALUES ('$member','admin','$message','$today','no')";
        $check_msg = mysqli_query($mysqli,$send_msg);

        if($check_msg)
        {
            header("location:Contact.php#frame");

        }
        else
        {
            echo '<div class="alert alert-danger"><center>Cant Send Message</center><div>';
        }

        }
?>