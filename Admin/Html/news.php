<?php
session_start();
$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli)); 
 
if(isset($_POST['newssubmit'])){
//image path to uploaded image
$target = "../Images/News/".basename($_FILES['cover']['name']); 
        
$topic = $_POST['topic'];
$msg = ($_POST['msg']);
$cover = $_FILES['cover']['name'];

$topic = $mysqli->real_escape_string($topic);

$msg = $mysqli->real_escape_string($msg);

$ada = date('Y-m-d H:i:s');


        
$news="INSERT INTO booknews(topic, msg, cover, newsdate) VALUES ('$topic','$msg','$cover','$ada')";


$newsright = mysqli_query($mysqli,$news);
   
        if((move_uploaded_file($_FILES['cover']['tmp_name'], $target)) && $newsright==true)
        {
    
          $_SESSION['news'] = "New News added to your website!";
          $_SESSION['ntype'] = "alert-success";
  
          header("location:../Dashboard.php#news");
    
            
        }
        else
        {
          $_SESSION['news'] = "Cant add new news!";
          $_SESSION['ntype'] = "alert-danger";
  
          header("location:../Dashboard.php#news");
    
           
        }

     }
?>