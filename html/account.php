
<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 
?>

<!------Adding collect.php------->
<?php require_once 'cancel.php'; ?>

<?php
if(!isset($_SESSION['LoggedInUserId']))
{
  header("location:../index.php?login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title>Your Account</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/aos.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/account.css">

       <!------Data Tables--------------->
        <script src="../Admin/lib/jquery/jquery.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="../Admin/css/dataTables.bootstrap.min.css">
<!-- Start-->
</head>
<body>
   
    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="../index.php"><img src="../images/logo/logo.png"><font color=dodgerblue>SIP</font><font color="#8cc867">SEWANA</font></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="../index.php#home" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="aboutus.html" class="nav-link smoothScroll">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a href="book.php" class="nav-link smoothScroll">Books</a>
                    </li>

                    <li class="nav-item">
                        <a href="Contact.php" class="nav-link smoothScroll">Contact</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="account.php" class="nav-link smoothScroll">My Account</a>
                    </li>
                </ul>

                <ul class="social-icon ml-lg-3">
                    <li><a href="https://fb.com" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>

                                        <!----------------hide notification if userlogout  -->
                                        <?php
                    if(isset($_SESSION['LoggedInUserId']))
                     {

                    //connect db
                      $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli));

                       $userid =$_SESSION['LoggedInUserId'];
                      

                      //get notfication
                      $notif = "SELECT * FROM notification WHERE memberid = '$userid' ORDER BY notid DESC";
                      $notifquery = mysqli_query($mysqli, $notif);
                      $nm_rows= mysqli_num_rows($notifquery);
                      
                    
                     echo' <li>
                        <a class="btn" href="#" role="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i><span class="badge">'; if($nm_rows>0){echo $nm_rows;} echo'</span></a>

                        <div id="noti" class="dropdown-menu" aria-labelledby="dropdown1">';
        
                      if($nm_rows>0)
                      {
                        while($notifcheck = mysqli_fetch_array($notifquery))
                        {
                        
                         $notdate = $notifcheck['date']; 
                        
                            // <!-------notification msg------------>
                          echo ' <a class="dropdown-item" href="not.php?mem='.$userid.'&date='.$notdate.'">';
                          if($notdate) {
                            $notdate = date("F d, Y, g:i a", strtotime($notdate));
                          } else {
                              $notdate = '';
                          }
                          echo' <small>'; echo $notdate ; echo'</small><br>';
                            echo' '.$notifcheck["msg"].' </a>';

                           
                        
                        }
                      }
                      else
                      {
                        echo '<a class="dropdown-item" href="#">No Notification Found!</a>';
                      }
                    echo'
                      </div>
                     </li>';

                    }?>
                </ul>
            </div>

        </div>
    </nav>

<!-- Tabs -->
<section id="accountd">
	<div class="container">
		<h6 class="section-title h1">Account Details</h6>
		<div class="row">
			<div class="col-md-12 v" id="tabin">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" data-toggle="tab" href="#nav-member" role="tab" aria-controls="nav-member" aria-selected="true">Member Details</a>
						<a class="nav-item nav-link " data-toggle="tab" href="#nav-issue" role="tab" aria-controls="nav-issue" aria-selected="true">Issue Book</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-return" role="tab" aria-controls="nav-return" aria-selected="false">Return Book</a>
                        <a class="nav-item nav-link " data-toggle="tab" href="#nav-pen" role="tab" aria-controls="nav-pen" aria-selected="true">Pending Reservations</a>
						<a class="nav-item nav-link" data-toggle="tab" href="#nav-fine" role="tab" aria-controls="nav-fine" aria-selected="false">Fine Details</a>
						
						
						
					</div>
                </nav>
                <!-- account details -->
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					
					<div class="tab-pane fade show active" id="nav-member" role="tabpanel" aria-labelledby="nav-member-tab">
                    <div class="container">
					<table class="table table-striped">
                    <tbody>

                    <?php
                    $userid =$_SESSION['LoggedInUserId'];

                    //get account detials from member table
                    $loginuser = "SELECT * FROM user_register WHERE `mem-id`='$userid'";
                    $loginuserquery = mysqli_query($mysqli, $loginuser);

                    if($loginuserquery)
                    {
                        $loginuserresult = mysqli_fetch_assoc($loginuserquery);

                    echo '<tr>
                    <th><i class="fa fa-star"></i> &nbsp;Member ID</th>
                    <td>'; echo $userid; echo'</td>
                    </tr>
                    <tr>
                      <th><i class="fa fa-star"></i> &nbsp;Full Name</th>
                        <td>'; echo' '.$loginuserresult["fullname"].' </td>
           
                    </tr>
                    <tr>
                      <th><i class="fa fa-star"></i> &nbsp;Address</th>
                        <td>'; echo' '.$loginuserresult["address"].' </td>
                    </tr>
                      <tr>
                      <th><i class="fa fa-star"></i> &nbsp;Email</th>
          	            <td>'; echo' '.$loginuserresult["email"].' </td>

                        </tr>
                    <tr>
                    <th><i class="fa fa-star"></i> &nbsp;Phone Number</th>
                    <td>'; echo' '.$loginuserresult["phonenumber"].' </td>
                    </tr>';
                    }
                    else
                    {
                        echo "CAN'T GET USER DETAILS";
                    }


					?>
					                   
                    </tbody>
                    </table>
					</div>	
					    
					
					   </div>
                    
                    
                    <!-- issue details -->
                    <div class="tab-pane fade" id="nav-issue" role="tabpanel" aria-labelledby="nav-issue-tab">
                    <?php
                     $userid =$_SESSION['LoggedInUserId'];
                     
                     $geti = "SELECT
                     i.memberid,
                     u.fullname,
                     i.bookid,
                     b.title,
                     i.issuedate,
                     i.collectdate
                     
                     FROM
                     issuebook i
                     INNER JOIN
                     user_register u ON i.memberid = u.`mem-id`
                     INNER JOIN
                     addbook b ON i.bookid = b.book_id
                     WHERE memberid = '$userid' AND returndate IS NULL AND i.issuedate IS NOT NULL";

                     $giresult = mysqli_query($mysqli,$geti);

                     $rows= mysqli_num_rows($giresult);


                    ?>

                    <!-- issue table -->
                    <section id="lms">

                    <?php
                    if (isset($_SESSION['message']))
                    { 
                    echo'<div class="alert ';echo ($_SESSION['type']) ;echo '" role="alert">
                     <center>';?>  <?php echo ($_SESSION['message']) ;?>
                     <?php unset ($_SESSION['message']); ?> <?php echo '</center></div>';

                    }?>

                    <div class="container">
                    <div class="table-responsive">
                        
                    
                    <?php

                    if($rows > 0)
                    {

                     echo '<table id="issue_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Member ID</td>  
                                    <td>Member Name</td>  
                                    <td>Book ID</td>  
                                    <td>Title</td>  
                                    <td>Issue Date</td>
                                    <td>Collect Date</td>
                                    <td>Action</td>  
                               </tr>  
                          </thead> '; 
                           
                          while ($gicheck = mysqli_fetch_array($giresult))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$gicheck["memberid"].'</td>  
                                    <td>'.$gicheck["fullname"].'</td>  
                                    <td>'.$gicheck["bookid"].'</td>  
                                    <td>'.$gicheck["title"].'</td>  
                                    <td>'.$gicheck["issuedate"].'</td>
                                    <td>'.$gicheck["collectdate"].'</td>
                                    <td><center><a href="cancel.php?book='.$gicheck["bookid"].'&mem='.$gicheck["memberid"].'" class="btn btn-danger">Cancel</a></center></td>   
                                    </tr> ';
                                }  
                                 
                          echo '</table>'; 
                          }
                          else
                          {
      
                              echo'<h6><b><font color="#555"><i class="fa fa-certificate"></i> &nbsp;You Dont Have Any Reserved Books To COLLECT Yet!</font></b></h6>';
      
                          }               
                          ?>  
                    </div>
                    </div>
                    </section>


					</div>
                    
                    
                    <!-- add return details -->
					<div class="tab-pane fade" id="nav-return" role="tabpanel" aria-labelledby="nav-return-tab">



                    <?php
                     $userid =$_SESSION['LoggedInUserId'];
                     
                     $getr = "SELECT
                     i.memberid,
                     u.fullname,
                     i.bookid,
                     b.title,
                     i.issuedate,
                     i.collectdate,
                     i.returndate,
                     i.completedate
                     
                     FROM
                     issuebook i
                     INNER JOIN
                     user_register u ON i.memberid = u.`mem-id`
                     INNER JOIN
                     addbook b ON i.bookid = b.book_id
                     WHERE memberid = '$userid' AND returndate IS NOT NULL AND completedate IS NULL";

                     $gresult = mysqli_query($mysqli,$getr);


                     $num_rows= mysqli_num_rows($gresult);
                     


                    ?>

                    <!-- return table -->
                    <section id="lms">
                    <div class="container">
                    <div class="table-responsive">
                        
                    
                    <?php 

                if($num_rows>0)
                   {
                    echo' <table id="issue_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Member ID</td>  
                                    <td>Member Name</td>  
                                    <td>Book ID</td>  
                                    <td>Title</td>  
                                    <td>Issue Date</td>
                                    <td>Collect Date</td>
                                    <td>Return Date</td>  
                               </tr>  
                          </thead> '; 
     
                          while ($grcheck = mysqli_fetch_array($gresult))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$grcheck["memberid"].'</td>  
                                    <td>'.$grcheck["fullname"].'</td>  
                                    <td>'.$grcheck["bookid"].'</td>  
                                    <td>'.$grcheck["title"].'</td>  
                                    <td>'.$grcheck["issuedate"].'</td>
                                    <td>'.$grcheck["collectdate"].'</td>
                                    <td>'.$grcheck["returndate"].'</td>
                                    
                                </tr> ';
                          }  
                           
                    echo '</table>'; 
                    }
                    else
                    {

                        echo'<h6><b><font color="#555"><i class="fa fa-certificate"></i> &nbsp;You Dont Have Any Reserved Books To Return Yet!</font></b></h6>';

                    }               
                    ?> 
                    </div>
                    </div>
                    </section>



                    </div>

                    <!--  Pending table-->
                    
                    <div class="tab-pane fade" id="nav-pen" role="tabpanel" aria-labelledby="nav-pen-tab">


                    <?php
                     $userid =$_SESSION['LoggedInUserId'];
                     
                     $getpen = "SELECT
                     i.memberid,
                     u.fullname,
                     i.bookid,
                     b.title,
                     i.issuedate,
                     i.collectdate
                     
                     FROM
                     issuebook i
                     INNER JOIN
                     user_register u ON i.memberid = u.`mem-id`
                     INNER JOIN
                     addbook b ON i.bookid = b.book_id
                     WHERE memberid = '$userid' AND returndate IS NULL AND i.issuedate IS NULL  ";

                     $penresult = mysqli_query($mysqli,$getpen);

                     $prows= mysqli_num_rows($penresult);


                    ?>

                    <!-- pending table -->
                    <section id="lms">

                    <?php
                    if (isset($_SESSION['msg']))
                    { 
                    echo'<div class="alert ';echo ($_SESSION['ptype']) ;echo '" role="alert">
                     <center>';?>  <?php echo ($_SESSION['msg']) ;?>
                     <?php unset ($_SESSION['msg']); ?> <?php echo '</center></div>';

                    }?>

                    <div class="container">
                    <div class="table-responsive">
                        
                    
                    <?php
                    

                    if($prows > 0)
                    {

                     echo '<table id="issue_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Member ID</td>  
                                    <td>Member Name</td>  
                                    <td>Book ID</td>  
                                    <td>Title</td>  
                                    <td>Issue Date</td>
                                    <td>Collect Date</td>
                                    <td>Action</td>  
                               </tr>  
                          </thead> '; 
                           
                          while ($pcheck = mysqli_fetch_array($penresult))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$pcheck["memberid"].'</td>  
                                    <td>'.$pcheck["fullname"].'</td>  
                                    <td>'.$pcheck["bookid"].'</td>  
                                    <td>'.$pcheck["title"].'</td>  
                                    <td>'.$pcheck["issuedate"].'</td>
                                    <td>'.$pcheck["collectdate"].'</td>
                                    <td><center><a href="cancel.php?pbook='.$pcheck["bookid"].'&pmem='.$pcheck["memberid"].'" class="btn btn-danger">Cancel</a></center></td>   
                                    </tr> ';
                                    echo' <p><b><font color="#555" size="3px"><i class="fa fa-certificate"></i> &nbsp;How long do you have to wait to get "'.$pcheck["title"].'" book?</font></b>
                                    <a href="checkdate.php?dbook='.$pcheck["bookid"].'&bname='.$pcheck["title"].'" class="btn btn-primary" style=" font-size:10px;";>CHECK NOW</a></p><br>';                              
                                }  
                                 
                          echo '</table>'; 

                        
                          }
                          else
                          {
      
                              echo'<h6><b><font color="#555"><i class="fa fa-certificate"></i> &nbsp;You Dont Have Any Pending Book Reservations To CHECK!</font></b></h6>';
      
                          }
                          
                          
                          ?>  
                    </div>
                    </div>
                    
                    </section>

					</div>
                    
                    <!---------------fine details ------------------->
					<div class="tab-pane fade" id="nav-fine" role="tabpanel" aria-labelledby="nav-fine-tab">


                    <?php
                     $userid =$_SESSION['LoggedInUserId'];
                     
                     $fine = "SELECT
                     i.memberid,
                     u.fullname,
                     i.bookid,
                     b.title,
                     i.returndate,
                     i.completedate,
                     i.fine
                     
                     FROM
                     issuebook i
                     INNER JOIN
                     user_register u ON i.memberid = u.`mem-id`
                     INNER JOIN
                     addbook b ON i.bookid = b.book_id
                     WHERE memberid = '$userid' AND i.fine IS NOT NULL AND i.payday IS NULL";

                     $getfine = mysqli_query($mysqli,$fine);

                     $fine_rows= mysqli_num_rows($getfine);


                    ?>

                    <!-- return table -->
                    <section id="lms">
                    <div class="container">
                    <div class="table-responsive">
                        
                    
                    <?php 

                if($fine_rows>0)
                   {
                    echo' <table id="issue_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Member ID</td>  
                                    <td>Member Name</td>  
                                    <td>Book ID</td>  
                                    <td>Title</td>  
                                    <td>Due Return Date</td>
                                    <td>Returned Date</td>
                                    <td>Penalty</td>  
                               </tr>  
                          </thead> '; 
     
                          while ($finecheck = mysqli_fetch_array($getfine))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$finecheck["memberid"].'</td>  
                                    <td>'.$finecheck["fullname"].'</td>  
                                    <td>'.$finecheck["bookid"].'</td>  
                                    <td>'.$finecheck["title"].'</td>  
                                    <td>'.$finecheck["returndate"].'</td>
                                    <td>'.$finecheck["completedate"].'</td>
                                    <td>'.$finecheck["fine"].'</td>
                                    
                                </tr> ';
                          }  
                           
                    echo '</table>'; 
                    }
                    else
                    {

                        echo'<h6><b><font color="#555" size="4px"><i class="fa fa-certificate"></i> &nbsp;You dont have any payment to pay for Fine!<br>
                        <i class="fa fa-certificate"></i> &nbsp;If you dont return the book within due date,Rs.5 penalty added everyday until you returned the book.!</font></b></h6>';

                    }               
                    ?> 
                    </div>
                    </div>
                    </section>

					</div>
					
					
					
				</div>
			
			</div>
		</div>
	</div>
</section>


<!-- Footer -->
        <footer>
        	<div class="footer-top">
		        <div class="container">
		        	<div class="row">
		        		<div class="col-md-4 col-lg-4 footer-about wow fadeInUp">
		        			<a class="navbar-brand" href="index.html"><img src="../Images/logo/logo.png"><font color=dodgerblue>SIP</font><font color="#8cc867">SEWANA</font></a>
		        			<p>
		        				Libraria is free free education library system to help knowledge hungry readers.We welcome all the members who like to join with us.
		        			</p>
		        			<p>Our Team</p>
	                    </div>
		        		<div class="col-md-4 col-lg-4 offset-lg-1 footer-contact wow fadeInDown">
		        			<h3>Contact</h3>
		                	<p><i class="fa fa-home"></i> Address: Mathugama Urban Counsil(SipSewana), Matugama,Kalutara,Sri Lanka.</p>
		                	<p><i class="fa fa-phone"></i> Phone: 071 345 7894</p>
		                	<p><i class="fa fa-envelope"></i> Email: <a href="www.gmail.com">sipsewana@gmail.com</a></p>
		                	
	                    </div>
	                    <div class="col-md-4 col-lg-3 footer-social wow fadeInUp">
	                    	<h3>Follow us</h3>
	                    	<p>
	                    		<a href="#"><i class="fa fa-facebook"> &nbsp;Facebook</i></a> <br>
								<a href="#"><i class="fa fa-twitter">&nbsp;Twitter</i></a> <br>
								<a href="#"><i class="fa fa-instagram">&nbsp;Instagram</i></a>
							</p>	
				<!------------HIDE BUTTON IF NOT LOGGED IN--------------->
								<div id="footer"> <a href="logout.php" 
                                       <?php
                                        if(!isset($_SESSION['LoggedInUserId']))
                                        {
                                            echo "hidden='hidden'";
                                        }?>><i class="fa fa-power-off"></i>&nbsp;LOGOUT</a> 
								</div>
	                    	
	                    </div>
		            </div>
		        </div>
	        </div>
	        <div class="footer-bottom">

	           			<div class="footer-copyright">
	                    	<p> &copy; Copyrights <strong>Sipsewana</strong>. All Rights Reserved</p>
	                    </div>
	        </div>
        </footer>


     <!-- SCRIPTS -->
     <script src="../js/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/aos.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/custom.js"></script>
     
</body>
</html>
    
    

