
<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 
?>
<?php require_once 'contactmsg.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Contact</title>

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
     <link rel="stylesheet" href="../css/contact.css">
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
    <!-- ---------------------------------------chat message--------------------------------------------------------------------------- -->
   

<section id="chat">
<div class="container">

<div class="col-lg-12 col-12 text-center mb-5">
<h2 data-aos="fade-up" data-aos-delay="200">Chat With Admin</h2>
<h6 data-aos="fade-up"><font color=dodgerblue>Inform your problems</font></h6>


</div>


<div class="container main-section" id="frame">
<div class="row">
<?php

if(isset($_SESSION['LoggedInUserId']))
  { 
    //get member names


    $userid =$_SESSION['LoggedInUserId'];

    $member = "SELECT * FROM user_register WHERE `mem-id`='$userid'";
    $member_result = mysqli_query($mysqli, $member);
    $member_details = mysqli_fetch_assoc($member_result);       
    $name = $member_details['fullname'];


      //select messages
      $sel_msg = "SELECT * FROM chat WHERE (msg_from='$name' AND msg_to='admin') OR (msg_from='admin' AND msg_to='$name') ORDER BY id ASC";
      $run_msg = mysqli_query($mysqli, $sel_msg);
    
      if($run_msg)
      {
          $num_msg = mysqli_num_rows($run_msg);
  
          if($num_msg==0)
          {
              echo '<div class="col-md-12 right-sidebar" data-aos="fade-up">
                  <div class="row">
                      <div class="col-md-12 right-header">
                          <div class="right-header-img">
                          <img src="../Admin/Images/chat1.png" alt="" />
                          </div>
                          <div class="right-header-detail">
                              <p style="text-transform:capitalize;">'.$name.'</p>
                          </div>
                      </div>
                  </div>';
  
                  echo '<div class="row">
                          <div class="col-md-12 right-header-contentChat">
                          <ul>
                              <li>
                                  <div class="rightside-left-chat">
                                      <span><i class="fa fa-circle" aria-hidden="true"></i> <small></small> </span><br><br>
                                      <p>Type Something to Start Conversation!</p>
                                  </div>
                              </li>
                              <li>
                                  <div class="rightside-right-chat">
                                      <span> <small></small><i class="fa fa-circle" aria-hidden="true"></i></span><br><br>
                                      <p>Type Something to Start Conversation!</p>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>';
          
                  echo'<div class="row">
                       <div class="col-md-12 right-chat-textbox">
                          <form action="chatadmin.php" method="post">
                          <input type="hidden" name="sendto" value="'.$name.'">
                          <input type="text" name="message" placeholder="Write your message..." required/>
                          <button class="submit" name="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                          </form>
                      </div>
                  </div>
              </div>'; 
          }
          else
          {
  
           echo '<div class="col-md-12 right-sidebar" data-aos="fade-up">
                    <div class="row">
                      <div class="col-md-12 right-header">
                          <div class="right-header-img">
                          <img src="../Admin/Images/chat1.png" alt="" />
                          </div>
                          <div class="right-header-detail">
                              <p style="text-transform:capitalize;">'.$name.'</p>
                          </div>
                      </div>
                      </div>';
                      
                      echo '<div class="row">
                                  <div class="col-md-12 right-header-contentChat">
                                  <ul>';
                                      while($read_msg = mysqli_fetch_assoc($run_msg))
                                      {
                                          $reply= $read_msg['msg_from'];
                                          $send= $read_msg['msg_to'];
                                          $msg = $read_msg['msg'];
                                          $date = $read_msg['date'];
  
                                          if($date) 
                                            {
                                              $date = date("F d, g:i a", strtotime($date));
                                            } 
                                            else 
                                            {
                                                $date = '';
                                            }
  
                                         if($reply=='admin' AND $send==($name))
                                          {
                                          echo'<li>
                                                  <div class="rightside-left-chat">
                                                      <span><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;
                                                      <b style="font-size:14px; text-transform:capitalize; color:#e6e6e6;">'.$reply.'</b>
                                                      <small>&nbsp;'.$date.'</small> </span><br><br>
                                                      <p style="font-size:14px;">'.$msg.'</p>
                                                  </div>
                                              </li>';
                                          }
                                          
                                          if($reply==($name) AND $send=='admin')
                                          {
                                          echo'	<li>
                                                  <div class="rightside-right-chat">
                                                  <span><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;
                                                   <b style="font-size:14px; text-transform:capitalize; color:#e6e6e6;">'.$reply.'</b>
                                                   <small>&nbsp;'.$date.'</small> </span><br><br>
                                                  <p style="font-size:14px;">'.$msg.'</p>
                                                  </div>
                                              </li>';
                                          }
                                      }
                      echo'	</ul>
                              </div>
                          </div>';
  
  
                          echo'<div class="row">
                          <div class="col-md-12 right-chat-textbox">
                             <form action="chatadmin.php" method="post">
                             <input type="hidden" name="sendto" value="'.$name.'">
                             <input type="text" name="message" placeholder="Write your message..." required/>
                             <button class="submit" name="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                             </form>
                         </div>
                     </div>
                 </div>'; 
          }
          
       }
     }
     else
     {
   echo '<div class="col-md-12 right-sidebar">
              <div class="row">
                  <div class="col-md-12 right-header">
                      <div class="right-header-img">
                      <img src="../Images/user.png" alt="" />
                      </div>
                      <div class="right-header-detail">
                          <p style="text-transform:capitalize;">LogIn First</p>
                      </div>
                  </div>
              </div>';
  
            echo '<div class="row">
                      <div class="col-md-12 right-header-contentChat">
                       <ul>
                          <li>
                              <div class="rightside-left-chat">
                                  <span><i class="fa fa-circle" aria-hidden="true"></i> <small></small> </span><br><br>
                                  <p>Please Login to Start Conversation!</p>
                              </div>
                          </li>
                          <li>
                              <div class="rightside-right-chat">
                                  <span> <small></small><i class="fa fa-circle" aria-hidden="true"></i></span><br><br>
                                  <p>Please Login to Start Conversation!</p>
                              </div>
                          </li>
                       </ul>
                      </div>
                  </div>';
            echo'<div class="row">
                  <div class="col-md-12 right-chat-textbox">
                     <input type="text" name="message" placeholder="Write your message..." required/>
                 </div>
             </div>
          </div>';
  
     }
     
   
   ?>


   </div>

   </div>

</div>
</section>
<script>
$(document).ready(function(){
    	var height = $(window).height();
    	$('.left-chat').css('height', (height - 92) + 'px');
    	$('.right-header-contentChat').css('height', (height - 163) + 'px');
    });
</script>

    <!--main content end-->

   
     <!-------------------------------------------- CONTACT--------------------------------------------------------------- -->
     <section class="contact section" id="contact">
          <div class="container">
              <!-- ALERT -->
          <?php
           if (isset($_SESSION['message']))
           { 
                         echo'<div class="alert ';echo ($_SESSION['type']) ;echo '" role="alert">
                          <center>';?>  <?php echo ($_SESSION['message']) ;?>
                          <?php unset ($_SESSION['message']); ?> <?php echo '</center></div>';

           }?>

               <div class="row">

                    <div class="ml-auto col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4 pb-2" data-aos="fade-down" data-aos-delay="200">Feel free to ask anything</h2>

                        <form action="contactmsg.php" method="post" class="contact-form webform" data-aos="fade-down" data-aos-delay="400" role="form">
                            <input type="text" class="form-control" name="name" placeholder="Name">

                            <input type="email" class="form-control" name="email" placeholder="Email">

                            <input type="text" class="form-control" name="subject" placeholder="Subject">

                            <textarea class="form-control" rows="5" name="msg" placeholder="Message"></textarea>

                            <button type="submit" class="form-control" id="submit-button" name="submit">Send Message</button>
                        </form>
                    </div>

                    <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600"><font color=dodgerblue>Where you can find us</font></h2>

                        <p data-aos="fade-up" data-aos-delay="800"><font color=red><i class="fa fa-map-marker mr-1"></i> </font>Mathugama Urban Counsil(SipSewana), Matugama,Kalutara,Sri Lanka.</p>

<!--Go to Google Maps,copy,share embed map-->
                        <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d990.9990405113432!2d80.116884!3d6.522166!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae3cd20eb0358df%3A0x436f627eb89e93c2!2sMatugama%20Urban%20Council!5e0!3m2!1sen!2slk!4v1583679173326!5m2!1sen!2slk" width="1920" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                           

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
     <script src="../js/aos.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/custom.js"></script>   
    
</body>
</html>