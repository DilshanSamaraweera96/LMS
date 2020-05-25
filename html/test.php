<?php

$rownum= $_GET['rownum'];

echo $rownum;
//connection
$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli));
                
//select it                
$sql = "SELECT * FROM addbook WHERE row_id='$rownum'";
$result = mysqli_query($mysqli, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table> 
<?php
                //fetch cover images from database  
                while ($row = mysqli_fetch_array($result)){
                    
                
                echo"<tr><td><b>bookid:</b></td><td>".$row['bookid']."</td></tr>";
                echo"<tr><td><b>title:</b></td><td>".$row['title']."</td></tr>";   
                echo"<tr><td><b>category:</b></td><td>".$row['category']."</td></tr>";   
                echo"<tr><td><b>author:</b></td><td>".$row['author']."</td></tr>";   
                echo"<tr><td><b>language:</b></td><td>".$row['language']."</td></tr>";   
                    
                } ?>
</table>
    
</body>
</html>