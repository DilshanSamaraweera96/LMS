<?php

$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli)); 
 
    if(isset($_POST['regbtn']))
    
    {

        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $pno = $_POST['pno'];
        $password = $_POST['password'];

        //check email already in the register
        $chkEmail = "SELECT email FROM user_register WHERE email='$email'";
        $chkEmailQuery = mysqli_query($mysqli, $chkEmail);

        if($chkEmailQuery)
        {
            $emailNum = mysqli_num_rows($chkEmailQuery);

            if($emailNum==0)
            {

                $sql= "insert into user_register(fullname , address , email , phonenumber , password) values ('$name','$address','$email','$pno','$password')";

                $right = $mysqli->query($sql);
        
                if($right==true){
            
                header("location:success.html");
                }
                else
                {
                header("location:error.html");
                }
            }
            else
            {
                header("location:error.html");
            }

       }

    }
?>