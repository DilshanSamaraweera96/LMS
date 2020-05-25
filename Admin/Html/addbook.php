<?php

$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli)); 
 
    if(isset($_POST['uploadbtn']))
    
    {
//image path to uploaded image
$target = "../upload/".basename($_FILES['cover']['name']); 
$aim = "../upload/".basename($_FILES['fimage']['name']); 
$way = "../upload/".basename($_FILES['nimage']['name']); 
        
        
$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$language = $_POST['language'];
$cover = $_FILES['cover']['name'];
$fimage = $_FILES['fimage']['name'];
$nimage = $_FILES['nimage']['name'];
        
$sql= "INSERT INTO addbook(title, author, category, quantity, language, cover, firstimage, nextimage) VALUES ('$title','$author','$category','$quantity','$language','$cover','$fimage','$nimage')";


        $right = $mysqli->query($sql);
   
        if((move_uploaded_file($_FILES['cover']['tmp_name'], $target)) && (move_uploaded_file($_FILES['fimage']['tmp_name'], $aim)) && (move_uploaded_file($_FILES['nimage']['tmp_name'], $way)) && ($right==true))
        {
    
        header("location:success.html");
        }
        else
        {
       header("location:error.html");
        }

    }
?>