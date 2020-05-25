
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
                                        session_start();
                                        if(isset($_SESSION['LoggedInUserId']))
                                        {
                                            echo "hidden='hidden'";
                                        }?>data-target="#membershipForm">LOG IN</button></li>
                    <li><a href="https://fb.com" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                    
                    <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
                        
   
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
          <!-- News 1 -->  
         <div class="row page">
             
                <div class="col-md-4 col-12 newscover" data-aos="fade-up" data-aos-delay="600">
                 <img src="images/news/news1.png">

                </div>

                <div class="col-md-7 col-12">
                          <div class="letters">

                            <h2 class="mb-4 text-black" data-aos="fade-up" data-aos-delay="500">RWA retires RITA Awards, debuts the 'Vivian'</h2>

                              <p class="d-block" data-aos="fade-up" data-aos-delay="600">The Romance Writers of America will permanently retire its annual RITA Awards, which it has presented annually since 1982, and introduce a new award, the Vivian, named after RWA founder Vivian Stephens.<br><br>

                              The move to retire the RITAs follows a controversy related to issues of diversity at the organization this winter that saw the resignation of its newly-instated president and its entire board of directors, as well as the cancellation of this year's planned RITA Awards ceremony. In January, the RWA announced that it planned to hold the RITAs again "to celebrate 2019 and 2020 romances" in 2021.</p>
                          </div>
                     </div>
                </div>
                
            <!-- News2 -->
                 <div class="row page">
             
                <div class="col-md-4 col-12 newscover" data-aos="fade-up" data-aos-delay="600">
                 <img src="images/news/news2.jpg">

                </div>

                <div class="col-md-7 col-12">
                          <div class="letters">

                            <h2 class="mb-4 text-black" data-aos="fade-up" data-aos-delay="500">The story behind ‘The Great Realisation,’ a post-pandemic bedtime tale</h2>

                              <p class="d-block" data-aos="fade-up" data-aos-delay="600">Before the pandemic, Tomos Roberts read his poems to crowds around London who, he confesses, were often more interested in what they were drinking than what he was saying. Now, hunkered down and out of work, he’s found a far more attentive audience that stretches around the world — and includes people who haven’t yet reached drinking age.<br>
                              Roberts’s poem, “The Great Realisation,” was released on YouTube on April 29 and has been viewed tens of millions of times. A simple rhyming tale read as a bedtime story, it takes on heavy themes — corporate greed, familial alienation, the pandemic — and somehow comes up with a happy ending. Set in an unspecified future, the poem looks back on pre-pandemic life and imagines a “great realisation” sparked by the scourge.</p>
                          </div>
                     </div>
                </div>
                
                <!-- News3 -->
                 <div class="row page">
             
                <div class="col-md-4 col-12 newscover" data-aos="fade-up" data-aos-delay="600">
                 <img src="images/news/news3.jpg">

                </div>

                <div class="col-md-7 col-12">
                          <div class="letters">

                            <h2 class="mb-4 text-black" data-aos="fade-up" data-aos-delay="500">Colson Whitehead: Black author makes Pulitzer Prize history</h2>

                              <p class="d-block" data-aos="fade-up" data-aos-delay="600">US author Colson Whitehead has become only the fourth writer ever to win the Pulitzer Prize for fiction twice.The African-American author was honored for The Nickel Boys, which chronicles the abuse of black boys at a juvenile reform school in Florida.<br>
                              Whitehead, a 50-year-old New Yorker, won the 2017 prize in the same category for his book Underground Railroad. With one for each week, we’ll get to rank up our Rocket Pass 6 with a twist. The four modes to be introduced are Dropshot Rumble, Beach Ball, Boomer Ball, and Rocket League’s latest addition (and casualty), Heatseeker.Before him, only Booth Tarkington, William Faulkner and John Updike had won the Pulitzer for fiction twice.</p>
                          </div>
                     </div>
                </div>
                
                
                  <!-- News4 -->
                 <div class="row page">
             
                <div class="col-md-4 col-12 newscover" data-aos="fade-up" data-aos-delay="600">
                 <img src="images/news/news4.jpg">

                </div>

                <div class="col-md-7 col-12">
                          <div class="letters">

                            <h2 class="mb-4 text-black" data-aos="fade-up" data-aos-delay="500">Marvel Comics AUGUST 2020 Solicitations Cover Gallery</h2>

                              <p class="d-block" data-aos="fade-up" data-aos-delay="600">Marvel Comics has released its August 2020 solicitations, largely pieced together from titles that were not released in April and May along with titles that were rescheduled from June and July due to comic book distribution interruptions stemming from coronavirus.<br>
                              Almost 30 years after the landmark story Future Imperfect, legendary INCREDIBLE HULK scribe Peter David returns to the far-future version of the Hulk known as Maestro — the master of what remains of the world. With astounding art from HULK veteran Dale Keown and up-and-comer Germán Peralta, Maestro will answer questions that have haunted Hulk fans for years — and inspire some new ones.</p>
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

</body>
</html>