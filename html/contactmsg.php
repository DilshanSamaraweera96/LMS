<?php  
session_start();
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 


//getting input

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $emailFrom = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];



    $mailTo = "vhasaral@gmail.com";
    $headers = "FROM : ".$emailFrom;
    $txt = "You have received an e-mail from ".$name.".\n\n".$msg;

    mail($mailTo, $subject, $txt, $headers);

    if(mail($mailTo, $subject, $txt, $headers)==true)
    {
        $_SESSION['message'] = "Your Mail Recevied!";
                $_SESSION['type'] = "alert-success";

                header("location:Contact.php");
    }
    else
    {
        $_SESSION['message'] = "Your Mail Didn't Received!";
                $_SESSION['type'] = "alert-danger";

                header("location:Contact.php");
    }
    
}











?>