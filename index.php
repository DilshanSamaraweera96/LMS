<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title>SipSewana Website</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/aos.css">
     
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">
<!-- Start-->
</head>

<body>

  


    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
<!-- toast alert when logged out -->
<?php
if(isset($_GET['signout']))
{
echo'    <div class="toast" id="myToast" style="position: absolute; top: 80px; right: 0; width: 300px; text-align: center; background: #bf4040; color:#ffffcc;">
<div class="toast-header" style="background: #ff3333; color:#ffffcc;">
    <div class="mr-auto"><i class="fa fa-grav"></i> Log Out!</div>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="toast-body">
    <div>You Have Been Logged Out!</a></div>
</div>
</div>';
echo'<script>    
    if(typeof window.history.pushState == "function") {
        window.history.pushState({}, "Hide", "index.php");
    }
</script>';
}
?>
<!-- toast alert when trying to go my account without logged in -->
<?php
if(isset($_GET['login']))
{
echo'    <div class="toast" id="myToast" style="position: absolute; top: 80px; right: 0; width: 300px; text-align: center; background: #ffa366; color:#ffffcc;">
<div class="toast-header" style="background: #ff751a; color:#ffffcc;">
    <div class="mr-auto"><i class="fa fa-grav"></i> Log In!</div>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="toast-body">
    <div>You Should Login First!</a></div>
</div>
</div>';
echo'<script>    
    if(typeof window.history.pushState == "function") {
        window.history.pushState({}, "Hide", "index.php");
    }
</script>';
}
?>

<!-- toast alert when comment wrong -->
<?php
if(isset($_GET['comment']))
{
echo'    <div class="toast" id="myToast" style="position: absolute; top: 80px; right: 0; width: 300px; text-align: center; background: #bf4040; color:#ffffcc;">
<div class="toast-header" style="background: #ff3333; color:#ffffcc;">
    <div class="mr-auto"><i class="fa fa-grav"></i> Comment!</div>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="toast-body">
    <div>Your Comment Didnt Recived!</a></div>
</div>
</div>';
echo'<script>    
    if(typeof window.history.pushState == "function") {
        window.history.pushState({}, "Hide", "index.php");
    }
</script>';
}
?>


        <div class="container">
            

            <a class="navbar-brand" href="index.php"><img src="Images/logo/logo.png"><font color=dodgerblue>SIP</font><font color="#8cc867">SEWANA</font></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a href="html/book.php" class="nav-link smoothScroll">Books</a>
                    </li>

                    <li class="nav-item">
                        <a href="html/Contact.php" class="nav-link smoothScroll">Contact</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="html/account.php" class="nav-link smoothScroll">My Account</a>
                    </li>
                </ul>

                <ul class="social-icon ml-lg-3">
                        
                        <!------------HIDE BUTTON LOGGED IN--------------->
                        
                   <li><button class="btn bordered mt-0" data-toggle="modal" 
                                       
                                        <?php 
                                       
                                        if(isset($_SESSION['LoggedInUserId']))
                                        {
                                            echo "hidden='hidden'";
                                        }?>data-target="#membershipForm">LOG IN</button></li>
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
                          echo ' <a class="dropdown-item" href="html/not.php?mem='.$userid.'&date='.$notdate.'">';
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



     <!-- HERO -->
     <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

            <div class="bg"></div>

               <div class="container">
                    <div class="row">

                         <div class="col-lg-8 col-md-10 mx-auto col-12">
                              <div class="hero-text mt-5 text-center">

                                    <h6 data-aos="fade-up" data-aos-delay="300">Today a reader, Tomorrow a leader!</h6>

                                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Increase your knowledge at SipSewana</h1>

                                    <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Get started</a>

                                    <a href="html/faq.html" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">learn more</a>
                                   
                              </div>
                         </div>

                    </div>
               </div>
     </section>


     <section class="feature" id="feature">
        <div class="container">
            <div class="row">

                <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-3 text-white" data-aos="fade-up">New to the SipSewana?</h2>

                    <h6 class="mb-4 text-white" data-aos="fade-up">Click the button below and get your free membership now.</h6>

                    <p data-aos="fade-up" data-aos-delay="200">Libraria is free free education library system to help knowledge hungry readers. Join here & become one of a member of our society.</p>

                    <a href="html/signup.html" class="btn custom-btn bg-color mt-3" data-aos="fade-up" data-aos-delay="300">Become a member today</a>
                </div>

                <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                     <div class="about-working-hours">
                          <div>

                                <h2 class="mb-4 text-white" data-aos="fade-up" data-aos-delay="500">Working hours</h2>

                               <strong class="d-block" data-aos="fade-up" data-aos-delay="600">Sunday : Closed</strong>

                               <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Monday - Friday</strong>

                                <p data-aos="fade-up" data-aos-delay="800">8:00 AM - 5:00 PM</p>

                                <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Saturday</strong>

                                <p data-aos="fade-up" data-aos-delay="800">9:00 AM - 4:00 PM</p>
                               </div>
                          </div>
                     </div>
                </div>

            </div>
            
    </section>


     <!-- ABOUT -->
     <section class="about section" id="about">
               <div class="container">
                    <div class="row">

                            <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                                <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Hello, we are <font color=dodgerblue>Sip</font><font color="#8cc867">Sewana</font></h2>

                                <p data-aos="fade-up" data-aos-delay="400">We aim to delight you with extraordinary customer service – whether in person, by telephone, or online. Our expert team of educators and support staff is here for you. A vital component of life is education, Libraria delivers high-quality public education for all.</p>
                                <br>
                                
                                <a class="btn bordered mt-0" href="html/aboutus.html" data-aos="fade-up" data-aos-delay="300">Read More>></a>


                            </div>

                            <div class="ml-lg-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                                <div class="team-thumb">
                                    <img src="images/team/team-image.jpg" class="img-fluid" alt="Trainer">

                                    <div class="team-info d-flex flex-column">

                                        <h3>Janaki Kuruppu</h3>
                                        <span><font color="brown" size="4"><b>Librarian</b></font></span>

                                    </div>
                                </div>
                            </div>

                            <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                                <div class="team-thumb">
                                    <img src="images/team/team-image01.jpg" class="img-fluid" alt="Trainer">

                                    <div class="team-info d-flex flex-column">

                                        <h3>Niroshan Pieries</h3>
                                        <span><font color="brown" size="4"><b>Support Team</b></font></span>
                                    </div>
                                </div>
                            </div>

                    </div>
               </div>
     </section>


     <!-- CLASS -->
     <section class="class" id="class">
               <div class="container">
                    <div class="row">

                            <div class="col-lg-12 col-12 text-center mb-5">
                               <h2 data-aos="fade-up" data-aos-delay="200">Recently Added</h2>
                                <h6 data-aos="fade-up"><font color=dodgerblue>Time to Read</font></h6>

                                
                             </div>

                            <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                                <div class="box">
                                  <div class="figure">
                                      <img src="images/recent/front1.jpg">
                                      <div class="caption">
                                         <div class="about">
                                             <p><font color="#FAFF3A "><i class="fa fa-certificate"></i></font>&nbsp;<font color=dodgerblue> Title :</font><font color="#8cc867"> The Jewish Revolutionary Spirit</font><br>
                                              
                                               <font color="#FAFF3A "><i class="fa fa-certificate"></i></font>&nbsp;<font color=dodgerblue>  Author :</font> <font color="#8cc867">E.Michael Jones</font><br>
                                                
                                                 <font color="#FAFF3A "><i class="fa fa-certificate"></i></font>&nbsp;<font color=dodgerblue>  Category : </font><font color="#8cc867">Religious</font></p>
                                             <div class="btfront bordered">
                                             <a href="html/book.php#other"><font color="#fff" size="4"><b>Check Now</b></font></a>
                                             </div>
                                             
                                         </div>
                                          
                                      </div>
                                  </div>  
                                </div>
                            </div>
                            
                            
                            
                            

                            <div class="mt-5 mt-lg-0 mt-md-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                                <div class="box">
                                  <div class="figure">
                                      <img src="images/recent/front2.jpg">
                                      <div class="caption">
                                         <div class="about">
                                             <p><font color="#FAFF3A "><i class="fa fa-certificate"></i></font>&nbsp;<font color=dodgerblue> Title :</font><font color="#8cc867"> The Serpent's Secret</font><br>
                                              
                                               <font color="#FAFF3A "><i class="fa fa-certificate"></i></font>&nbsp;<font color=dodgerblue>  Author :</font> <font color="#8cc867">Sayantani Gasputa</font><br>
                                                
                                                 <font color="#FAFF3A "><i class="fa fa-certificate"></i></font>&nbsp;<font color=dodgerblue>  Category : </font><font color="#8cc867"> Novel</font></p>
                                             <div class="btfront bordered">
                                             <a href="html/book.php#novel"><font color="#fff" size="4"><b>Check Now</b></font></a>
                                             </div>
                                             
                                         </div>
                                          
                                      </div>
                                  </div>  
                                </div>
                            </div>
                            
                            
                            
                            

                            <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                                <div class="box">
                                  <div class="figure">
                                      <img src="images/recent/front3.jpg">
                                      <div class="caption">
                                         <div class="about">
                                             <p><font color="#FAFF3A "><i class="fa fa-certificate"></i></font>&nbsp;<font color=dodgerblue> Title :</font><font color="#8cc867">  Harry Poter & Philosopher's Stone</font><br>
                                              
                                               <font color="#FAFF3A "><i class="fa fa-certificate"></i></font>&nbsp;<font color=dodgerblue>  Author :</font> <font color="#8cc867">J.K.Rowling</font><br>
                                                
                                                 <font color="#FAFF3A "><i class="fa fa-certificate"></i></font>&nbsp;<font color=dodgerblue>  Category : </font><font color="#8cc867"> Novel</font></p>
                                             <div class="btfront bordered">
                                             <a href="html/book.php#novel"><font color="#fff" size="4"><b>Check Now</b></font></a>
                                             </div>
                                             
                                         </div>
                                          
                                      </div>
                                  </div>  
                                </div>
                            </div>

                    </div>
                    <br><br><br>
                    <div class="btread">
              <a href="html/book.php" bordered>CHECK MORE>></a>
              </div>
               </div>
               
               <img src="images/wave.png" class="bottom-img">
     </section>

<!-- NEWS -->
     <section id="news">
   

            <div class="col-lg-12 col-12 text-center mb-5">
            <h2 data-aos="fade-up" data-aos-delay="200"> <font color="dodgerblue">Recent News</font></h2>
            <h6 data-aos="fade-up">get to know everything<font color=dodgerblue></font></h6> 
            </div>

  <!-- get news data from table -->
<?php

  //connect db
  $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli));
 //create pagination
     $limit = 3;  
     if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
     $start_from = ($page-1) * $limit;  
 
  $getnews = "SELECT * FROM booknews ORDER BY newsid DESC LIMIT $start_from, $limit";
  $getnewsquery = mysqli_query($mysqli,$getnews);

  if($getnewsquery)
  {
  while($getresult = mysqli_fetch_assoc($getnewsquery))
  {
  
    $newsdate= $getresult['newsdate'];

    if($newsdate) {
      $newsdate = date("F d, Y, g:i a", strtotime($newsdate));
    } else {
        $newsdate = '';
    }


  echo'  <div class="row page">
             
    <div class="col-md-4 col-12 newscover" data-aos="fade-up" data-aos-delay="600">
     <img src="Admin/Images/News/';echo''.$getresult["cover"].'">

    </div>

    <div class="col-md-7 col-12">
              <div class="letters">

                <h2 class="mb-4 text-black" data-aos="fade-up" data-aos-delay="500">';echo' '.$getresult["topic"].' </h2>
                <p class="d-block" data-aos="fade-up" data-aos-delay="600"><font color="#404040"><b>';echo $newsdate; echo'</b></font> </p>
                  <p class="d-block" data-aos="fade-up" data-aos-delay="600">';echo' '.$getresult["msg"].'</p>
              </div>
         </div>
    </div>';
  }
  } 
  else
  {
    echo "something happend!";
  }

  
?>
        
         <!-- get news data from table end -->

<!-- pagination show code -->
<?php  
$getnews = "SELECT COUNT(newsid) FROM booknews";  
$getnewsquery = mysqli_query($mysqli,$getnews);  
$newsrow = mysqli_fetch_row($getnewsquery);  
$total_records = $newsrow[0];  
$total_pages = ceil($total_records / $limit);  
echo "<nav><ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             echo "<li><a href='index.php?page=".$i."#news'>".$i."</a></li>";  
};  
echo "</ul></nav>";   
?>
           
</section>
     
     
     
<!--------------COMMENTS------------------->

<section class="content-item" id="comments">
       <img src="images/wavecmt.png" class="bottom-img">   
        <div class="col-lg-12 col-12 text-center mb-5">
       <h2 data-aos="fade-up" data-aos-delay="200"><font color="#ffff80">What's On Your Mind</font></h2>
        <h6 data-aos="fade-up"><font color=#99ffff>Add a comment</font></h6>
        </div>
        
    <div class="container">
    	<div class="row">
           
      <?php if(isset($_SESSION['LoggedInUserId'])){

         $userid =$_SESSION['LoggedInUserId'];
          
        echo ' <div class="newcmt">
        <h6 data-aos="fade-up"><b><font color="#fff">New Comment</font></b></h6></div>
           
             
        <div class="col-sm-12 comment-form"  data-aos="fade-up">
               <form action="html/comment.php" method="post">
               <input type="hidden" name="user" value="'.$userid.'">
                <textarea class="form-control" rows="3" name="commsg" placeholder="Your message" required=""></textarea>
                <button type="submit" class="btn btn-primary pull-right" name="comment">Comment</button>
                </form>
        </div>
        
        </div> ';
      }
      ?> 	
                  
                
                
      <div class="col-sm-12"> 
        <?php

     //create pagination
     $climit = 5;  
     if (isset($_GET["cpage"])) { $cpage  = $_GET["cpage"]; } else { $cpage=1; };  
     $cstart_from = ($cpage-1) * $climit;  

        //read comments in the db table
        $readcmt = "SELECT *
                    FROM comments
                    ORDER BY comid DESC LIMIT $cstart_from, $climit";

        $readcmtresult = mysqli_query($mysqli, $readcmt);

        if($readcmtresult)
        {

          $totcmt = "SELECT COUNT(comid) FROM comments";  
          $totres = mysqli_query($mysqli, $totcmt); 
          $totrun = mysqli_fetch_row($totres);
          $totalcmt = $totrun[0]; 
                  
            echo'<h3><b><font color="#b3ffb3"  data-aos="fade-up">'.$totalcmt.' Comments</font></b></h3>';
                  
            // COMMENT - START -->
          
          while($readcmtcheck = mysqli_fetch_assoc($readcmtresult))
          {
            $cmtdate= $readcmtcheck['comdate'];

            if($cmtdate) 
            {
              $cmtdate = date("F d, Y, g:i a", strtotime($cmtdate));
            } 
            else 
            {
                $cmtdate = '';
            }
            
            
               echo'  <div class="media"  data-aos="fade-up">
                      <img class="media-object pull-left" src="images/comment.png" alt="">
                      <div class="media-body">
                          <h4 class="media-heading" style="text-transform:capitalize;">'.$readcmtcheck["member"].'</h4>
                          <p>'.$readcmtcheck["comment"].'</p>
                          <p class="datecmt"><i class="fa fa-calendar"></i> &nbsp; '.$cmtdate.'</p>               
                      </div>
                  </div>';
          }
        }
        else
        {
          echo "error";
        }
                // COMMENT  - END --> ?>



                
            </div>
        </div>
    </div>
                   <?php
                    //pagination show code -->
                  
                    $readcmt = "SELECT COUNT(comid) FROM comments";  
                    $readcmtresult = mysqli_query($mysqli, $readcmt); 
                    $readcmtcheck = mysqli_fetch_row($readcmtresult);  
                    $ctotal_records = $readcmtcheck[0];  
                    $ctotal_pages = ceil($ctotal_records / $climit);  
                    echo "<nav><ul class='pagination'>";  
                    for ($i=1; $i<=$ctotal_pages; $i++) {  
                                 echo "<li><a href='index.php?cpage=".$i."#comments'>".$i."</a></li>";  
                    };  
                    echo "</ul></nav>";   
                    ?>
</section>

<!-- Footer -->
        <footer>
        	<div class="footer-top">
		        <div class="container">
		        	<div class="row">
		        		<div class="col-md-4 col-lg-4 footer-about wow fadeInUp">
		        			<a class="navbar-brand" href="index.html"><img src="Images/logo/logo.png"><font color=dodgerblue>SIP</font><font color="#8cc867">SEWANA</font></a>
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
								<div id="footer"> <a href="html/logout.php" 
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


    <!-- Modal -->
    <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <div class="modal-content">
          <div class="modal-header">

            <h2 class="modal-title" id="membershipFormLabel">Login Form</h2>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form class="membership-form webform" role="form" action="html/validation.php" method="post">
                <input type="email" class="form-control" name="email" placeholder="Email" required>

                <input type="password" class="form-control" name="password" placeholder="Password" required>


                <button type="submit" class="form-control" id="submit-button" name="submit">Log In</button>

                <div class="custom-control">
                <a  data-toggle="modal" href="#passReset">Forgot Password?</a>

                </div>
            </form>
          </div>

          <div class="modal-footer"></div>

        </div>
      </div>
    </div>

    <!-- Modal 2-->
    <div class="modal fade" id="passReset" tabindex="-1" role="dialog" aria-labelledby="passResetLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <div class="modal-content">
          <div class="modal-header">

            <h2 class="modal-title" id="passReset">Password Reset</h2>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form class="membership-form webform" role="form">
                <input type="email" class="form-control" name="cf-name" placeholder="Email" required>

                <input type="password" class="form-control" name="cf-password" placeholder="Password" required>
                
                <input type="password" class="form-control" name="cf-password" placeholder="Confirm Password" required>


                <button type="submit" class="form-control" id="submit-button" name="submit">Reset Password</button>


            </form>
          </div>

          <div class="modal-footer"></div>

        </div>
      </div>
    </div>



     <!-- SCRIPTS -->
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

 <!-- toast js code -->
 <script>
$(document).ready(function(){
        $("#myToast").toast({ delay: 3500 });
        $("#myToast").toast('show');
    }); 
</script>



</body>
</html>