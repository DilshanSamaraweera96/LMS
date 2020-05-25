 <!DOCTYPE html>
<html>
<head>
<title>MediLife Login Form</title>
     <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <!----boostrap---->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <!----fontawesome---->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body style=" background: url(../Images/login.jpeg); background-size :100%;" >

</body>
</html>
 
 
 
 
 <?php

$mysqli = new mysqli('localhost' , 'root' , '12345' , 'medilife') or die(mysqli_error($mysqli)); 

if(isset($_POST['reset'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    
    
    $sql = "SELECT * FROM adminlogin  WHERE  username = '$username'";
    $result = $mysqli->query($sql);
    $count = mysqli_num_rows($result);

    if ($count == 0)
        { 
        
        echo("<div class='p-3 mb-2 bg-danger text-white text-center'>You can't change Username..!</div>" );
        header('Refresh: 3; url=changepassword.html');
       
        }
    
        elseif($password == $conpassword)
        {
            
        $mysqli->query("UPDATE adminlogin SET password='$password' WHERE username = '$username'") or die($mysqli->error);
        
        echo("<div class='p-3 mb-2 bg-success text-white text-center'>Congratulations You have successfully changed your password..!</div>" );
        header('Refresh: 4; url=../index.html');
        }
       else
        {
           
        echo("<div class='p-3 mb-2 bg-danger text-white text-center'>Passwords do not match..!</div>" );
        header('Refresh: 3; url=changepassword.html');   
       
        }
       
        
        }
    
    
    
     
     

?>