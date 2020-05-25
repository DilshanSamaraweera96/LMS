<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Book Store</title>

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
     <link rel="stylesheet" href="../css/book.css">
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
<!---Search Bar--->
     <section id="search">
     <div class="container">
     <div class="row"><div class="col-md-12"><h2>Search Book</h2></div></div>
           <div class="d-flex justify-content-center">
        <div class="searchbar">
          <input class="search_input" type="text" name="" placeholder="Search Book...">
          <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </div>
      </div> 
    </div>
    </section>

<!---Book Categories--->

<section id="booklist">
	<div class="container">
		<h6 class="section-title h1">Book Categories</h6>
		<div class="row">
			<div class="col-md-12 v" id="tabin">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
					
						<a class="nav-item nav-link active" data-toggle="tab" href="#nav-it" role="tab" aria-controls="nav-it" aria-selected="true">IT</a>
						
						<a class="nav-item nav-link" data-toggle="tab" href="#nav-maths" role="tab" aria-controls="nav-maths" aria-selected="false">Mathematics</a>
						
						<a class="nav-item nav-link" data-toggle="tab" href="#nav-science" role="tab" aria-controls="nav-science" aria-selected="false">Science</a>
						
						<a class="nav-item nav-link" data-toggle="tab" id="novel" href="#nav-novel" role="tab" aria-controls="nav-novel" aria-selected="false">Novel</a>
						
						<a class="nav-item nav-link " data-toggle="tab" href="#nav-art" role="tab" aria-controls="nav-art" aria-selected="true">Art</a>
						
						<a class="nav-item nav-link " data-toggle="tab" href="#nav-poe" role="tab" aria-controls="nav-poe" aria-selected="true">Poetry</a>
						
						<a class="nav-item nav-link " data-toggle="tab" href="#nav-health" role="tab" aria-controls="nav-health" aria-selected="true">Health</a>
						
						<a class="nav-item nav-link " data-toggle="tab" href="#nav-bio" role="tab" aria-controls="nav-bio" aria-selected="true">Biography</a>
						
						<a class="nav-item nav-link " data-toggle="tab" href="#nav-cook" role="tab" aria-controls="nav-cook" aria-selected="true">Cooking</a>
						
						<a class="nav-item nav-link " data-toggle="tab" href="#nav-bus" role="tab" aria-controls="nav-bus" aria-selected="true">Business</a>
						
						<a class="nav-item nav-link " data-toggle="tab" href="#nav-kids" role="tab" aria-controls="nav-kids" aria-selected="true">Kids</a>
						
						<a class="nav-item nav-link " data-toggle="tab" id="other" href="#nav-other" role="tab" aria-controls="nav-other" aria-selected="true">Other</a>
						
					</div>
				</nav>
				
<?php
//connection
$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli));
                
//select it                
$sql_it = "SELECT * FROM addbook WHERE category='IT'";
$result_it = mysqli_query($mysqli, $sql_it);

//select maths                
$sql_m = "SELECT * FROM addbook WHERE category='Mathematics'";
$result_m = mysqli_query($mysqli, $sql_m);                
                
//select science                
$sql_s = "SELECT * FROM addbook WHERE category='Science'";
$result_s = mysqli_query($mysqli, $sql_s);

//select novel                
$sql_n = "SELECT * FROM addbook WHERE category='Novel'";
$result_n = mysqli_query($mysqli, $sql_n);                

//select art                
$sql_art = "SELECT * FROM addbook WHERE category='Art'";
$result_art = mysqli_query($mysqli, $sql_art);

//select poetry                
$sql_poe = "SELECT * FROM addbook WHERE category='Poetry'";
$result_poe = mysqli_query($mysqli, $sql_poe); 
                
//select health                
$sql_h = "SELECT * FROM addbook WHERE category='Health'";
$result_h = mysqli_query($mysqli, $sql_h); 
                
//select biography                
$sql_bio = "SELECT * FROM addbook WHERE category='Biography'";
$result_bio = mysqli_query($mysqli, $sql_bio); 
                
//select business              
$sql_bus = "SELECT * FROM addbook WHERE category='Business'";
$result_bus = mysqli_query($mysqli, $sql_bus); 
                
//select cooking                
$sql_cook = "SELECT * FROM addbook WHERE category='Cooking'";
$result_cook = mysqli_query($mysqli, $sql_cook); 
                
//select kids                
$sql_kids = "SELECT * FROM addbook WHERE category='Kids'";
$result_kids = mysqli_query($mysqli, $sql_kids); 
                
//select other                
$sql_other = "SELECT * FROM addbook WHERE category='Other'";
$result_other = mysqli_query($mysqli, $sql_other); 
?>
				
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
				
				<!---IT------>
					
				<div class="tab-pane fade show active" id="nav-it" role="tabpanel" aria-labelledby="nav-it-tab">
						
                <div class="row" id="bookcard">
                
                <?php
                //fetch cover images from database  
                while ($row = mysqli_fetch_array($result_it)) 
                {
                
                echo "<a href='view.php?rownum=".$row['book_id']."'>";
                echo "<img src='../Admin/upload/".$row['cover']."'>";
                echo "</a>";
                    
                }
                ?>

				</div>
				</div>
                    
                    
                    <!---MATHS------>   
                    <div class="tab-pane fade" id="nav-maths" role="tabpanel" aria-labelledby="nav-profile-maths">
                
                    <div class="row" id="bookcard">
                    
                    <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_m)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>
					    
				    </div>
				    
				    <!---SCIENCE------>
					
					<div class="tab-pane fade" id="nav-science" role="tabpanel" aria-labelledby="nav-science-tab">
					
					<div class="row" id="bookcard">
               
                    <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_s)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>

					</div>
					
					<!---NOVEL------>
					
					<div class="tab-pane fade" id="nav-novel" role="tabpanel" aria-labelledby="nav-novel-tab">
					
					<div class="row" id="bookcard">
               
                   <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_n)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>

					</div>
					
					<!---ART------>
					
					<div class="tab-pane fade" id="nav-art" role="tabpanel" aria-labelledby="nav-art-tab">
					
					<div class="row" id="bookcard">
               
                   <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_art)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>

					</div>
					
					<!---POETRY------>
					
					<div class="tab-pane fade" id="nav-poe" role="tabpanel" aria-labelledby="nav-poe-tab">
					
					<div class="row" id="bookcard">
               
                   <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_poe)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>

					</div>
					
					<!---HEALTH------>
					
					<div class="tab-pane fade" id="nav-health" role="tabpanel" aria-labelledby="nav-health-tab">
					
					<div class="row" id="bookcard">
               
                   <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_h)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>

					</div>
					
					<!---BIOLOGY------>
					
					<div class="tab-pane fade" id="nav-bio" role="tabpanel" aria-labelledby="nav-bio-tab">
					
					<div class="row" id="bookcard">
               
                   <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_bio)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>

					</div>
					
					<!---COOKING------>
					
					<div class="tab-pane fade" id="nav-cook" role="tabpanel" aria-labelledby="nav-cook-tab">
					
					<div class="row" id="bookcard">
               
                   <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_cook)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>

					</div>
					
					<!---BUSINESS------>
					
					<div class="tab-pane fade" id="nav-bus" role="tabpanel" aria-labelledby="nav-bus-tab">
					
					<div class="row" id="bookcard">
               
                   <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_bus)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>

					</div>
					
					<!---KIDS------>
					
					<div class="tab-pane fade" id="nav-kids" role="tabpanel" aria-labelledby="nav-kids-tab">
					
					<div class="row" id="bookcard">
               
                   <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_kids)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>

					</div>
					
					<!---OTHER------>
					
					<div class="tab-pane fade" id="nav-other" role="tabpanel" aria-labelledby="nav-other-tab">
					
					<div class="row" id="bookcard">
               
                   <?php
                    //fetch cover images from database  
                    while ($row = mysqli_fetch_array($result_other)) 
                    {
                
                    echo "<a href='view.php?rownum=".$row['book_id']."'>";
                    echo "<img src='../Admin/upload/".$row['cover']."'>";
                    echo "</a>";
                    
                    }
                    ?>
                
                    </div>

					</div>
				</div>
			
			</div>
		</div>
	</div>
</section>

 <!---Footer----->
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
    
    

