<?php

session_start();

$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli)); 

 
    if(isset($_POST['update']))
    
    {
//image path to uploaded image
$target = "../upload/".basename($_FILES['cover']['name']); 
$aim = "../upload/".basename($_FILES['fimage']['name']); 
$way = "../upload/".basename($_FILES['nimage']['name']); 


 $id = $_POST['id'];     
        
$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$isbn = $_POST['isbn'];
$publisher = $_POST['publisher'];
$pages = $_POST['pages'];
$quantity = $_POST['quantity'];
$language = $_POST['language'];
$cover = $_FILES['cover']['name'];
$fimage = $_FILES['fimage']['name'];
$nimage = $_FILES['nimage']['name'];

$publisher = $mysqli->real_escape_string($publisher);
        
$sql= "UPDATE addbook SET title='$title', author='$author', category='$category', isbn='$isbn', publisher='$publisher', pages='$pages', quantity='$quantity', language='$language', cover='$cover', firstimage='$fimage', nextimage='$nimage' WHERE book_id='$id'";

                                                                                
        $right = $mysqli->query($sql);
   
        if((move_uploaded_file($_FILES['cover']['tmp_name'], $target)) && (move_uploaded_file($_FILES['fimage']['tmp_name'], $aim)) && (move_uploaded_file($_FILES['nimage']['tmp_name'], $way)) && ($right==true))
        {
    
            $_SESSION['message'] = "Book Has Been Updated!";
            $_SESSION['type'] = "alert-success";
    
            header("location:updatebooks.php");
        }
        else
        {
            $_SESSION['message'] = "Cant Update Book!Try Again!";
            $_SESSION['type'] = "alert-danger";
    
            header("location:updatebooks.php");
        }

    }
?>