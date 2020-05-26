<?php
session_start();

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
						<a class="nav-item nav-link" data-toggle="tab" href="#nav-fine" role="tab" aria-controls="nav-fine" aria-selected="false">Fine Details</a>
						<a class="nav-item nav-link" data-toggle="tab" href="#nav-message" role="tab" aria-controls="nav-message" aria-selected="false">Message Center</a>
						<a class="nav-item nav-link " data-toggle="tab" href="#nav-not" role="tab" aria-controls="nav-not" aria-selected="true">Notifications</a>
						
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					
					<div class="tab-pane fade show active" id="nav-member" role="tabpanel" aria-labelledby="nav-member-tab">
					
					<div class="container">
					<table class="table table-striped">
                    <tbody>
                    <tr>
                    <th><i class="fa fa-star"></i> &nbsp;Member ID</th>
                    <td><?php echo $_SESSION['id']; ?></td>
                    </tr>
                    <tr>
                      <th><i class="fa fa-star"></i> &nbsp;Full Name</th>
                        <td><?php echo $_SESSION['name']; ?></td>
           
                    </tr>
                    <tr>
                      <th><i class="fa fa-star"></i> &nbsp;Address</th>
                        <td><?php echo $_SESSION['add']; ?></td>
                    </tr>
                      <tr>
                      <th><i class="fa fa-star"></i> &nbsp;Email</th>
          	            <td><?php echo $_SESSION['mail']; ?></td>

                        </tr>
                    <tr>
                    <th><i class="fa fa-star"></i> &nbsp;Phone Number</th>
                    <td><?php echo $_SESSION['pno']; ?></td>
                    </tr>
                    </tbody>
                    </table>
					</div>	
					    
					
					   </div>
                    
                    
                    
                    <div class="tab-pane fade" id="nav-issue" role="tabpanel" aria-labelledby="nav-issue-tab">
					    MULTIPICATION
					</div>
					
					<div class="tab-pane fade" id="nav-return" role="tabpanel" aria-labelledby="nav-return-tab">

					</div>
					
					<div class="tab-pane fade" id="nav-fine" role="tabpanel" aria-labelledby="nav-fine-tab">

					</div>
					
					<div class="tab-pane fade" id="nav-message" role="tabpanel" aria-labelledby="nav-message-tab">

					</div>
					
					<div class="tab-pane fade" id="nav-not" role="tabpanel" aria-labelledby="nav-not-tab">

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
    
    

