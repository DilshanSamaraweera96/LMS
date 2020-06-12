<?php


$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 


?>


<!DOCTYPE html>
<html lang="en">
<head>

     <title>Pending Dates</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/aos.css">
     <script src="../js/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/checkdate.css">
<!-- Start-->
</head>
<body>
<div class="container bootstrap snippet">
 
<?php 
 if( isset($_GET['dbook']))
 {


    
    $bookid = $_GET['dbook'];
    $bname = $_GET['bname'];
     
     echo $bname;

            //Check collectdate avalibility of pending request

            $pen = "SELECT * FROM issuebook WHERE  bookid='$bookid' AND returndate IS NULL AND collectdate IS NOT NULL ORDER BY issueid ASC";

            $penr = mysqli_query($mysqli,$pen);

            $prows= mysqli_num_rows($penr);
  

   echo'<div class="text-wrapper">
           <div class="subtitle">
            '.$bname.'
           </div>

    <div class="row">
    	<ul class="notes">
            <li>
                <div class="rotate-1 lazur-bg">
                    
                    <h4>Collect Date</h4>';
            if($prows>0)
            {
    
            $penc = mysqli_fetch_assoc($penr);
    
            $p = $penc['collectdate'];

            echo'<p>Nearest Collecting Date For This Book Is, '.$p.'</p>';
            
            }
            else
            {
            echo '<p>All previous members collected this book within collect date.Check the earlist return date.</p>';
            }
     
            echo'</div>
            </li>   
            <li>
                <div class="rotate-2 red-bg">
                    
                    <h4>Return Date</h4>';
                 //Check returndate avalibility of pending request

            $repen = "SELECT * FROM issuebook WHERE  bookid='$bookid' AND completedate IS NULL AND returndate IS NOT NULL ORDER BY issueid ASC";

            $repending = mysqli_query($mysqli,$repen);

            $rerows= mysqli_num_rows($repending);

            if($rerows>0)
            {
                while($getret = mysqli_fetch_assoc($repending))
                {
                    $rdate = $getret['returndate'];
                    $today = date('Y-m-d');
                
                    //convert string to object
                    $returndate = new DateTime($rdate);
                    $ada = new DateTime($today);
                
                    // calculates the difference between DateTime objects 
                    $interval = date_diff($ada,$returndate);
                
                    // printing result in days format 
                     $x=$interval->format('%R%a');

                    
                    //auto process
                    if($x>=0)
                    {
                      $gotreturn = $rdate;//break if the first returndate appears
                      break; 
                    
                    }
                   
                }
               
                //get variable if the returndate exist
                if(!empty($gotreturn))
                {
                    echo "<p>Nearest Return Date For This Book Is, ".$gotreturn."</p>";
                }
                else
                {
                    echo"all returndate passed the currentdate";
                }
    

            }
            else
            {
                echo '<p style="text-transform:capitalize;">There is no returndate listed regaring to this book!</p>';
            }


                    
                echo'</div>
            </li>    
            <li>
                <div class="rotate-1 yellow-bg">
                    
                    <h4 style="font-size:20px;">Special Note</h4>
                    <p style="font-size:14px;">These given days only for getting an idea of how many days do you have to wait for getting your reserved book.
                    We are not sure the date when the members hand over on time.So We recommend you to check at least 4 times a week whether your reservation accepted or not.
                    Also we will send you an email as soon as book reserved to your reservation.</p>
                    
                </div>
            </li>   
		</ul> 

	</div>
   		    <div class="buttons">
            <a class="button" href="account.php">Go back</a>
            </div> 
    </div>
    ';
 }
    ?>
</div>
</body>
</html>