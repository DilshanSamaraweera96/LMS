<?php


$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

$bid ='';
$title = '';
$author = '';
$isbn= '';
$publisher= '';
$pages= '';
$quan= '';



//EDIT SECTION

if( isset($_GET['edit']))
{

   $bookid = $_GET['edit'];
   
   $edit = "SELECT * FROM addbook WHERE book_id='$bookid'";

   $result = $mysqli->query($edit);

   if($result == true)
   {
    $row = mysqli_fetch_array($result);


      $bid = $row['book_id'];
      $title = $row['title'];
      $author = $row['author'];
      $isbn= $row['isbn'];
      $publisher= $row['publisher'];
      $pages= $row['pages'];
      $quan = $row['quantity'];
      

   }
   else
   {

   }

}
?>     
<!------Adding collect.php------->
<?php require_once 'update.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SipSewana Admin Panel</title>


  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/updatebooks.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>

</head>

<body>
  <section id="container">
    <!-- TOP BAR CONTENT & NOTIFICATIONS -->
    
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="../Dashboard.php" class="logo"><b>Sip<span>Sewana</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../adminlog.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="../Images/logo.png" class="img-circle" width="80"></p>
          <h5 class="centered">Welcome</h5>
          <li class="mt">
            <a class="sub-menu" href="../Dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Books</span>
              </a>
            <ul class="sub">
              <li><a href="addbooks.html">Add books</a></li>
              <li><a href="updatebooks.php">Update books</a></li>
              <li><a href="allbooks.php">All books</a></li>
            </ul>
          </li>
          
         <li class="sub-menu">
            <a href="pending.php">
            <i class="fa fa-archive"></i>
            <span>Pending Reservations</span>
            </a>
          </li>
          
          <li class="sub-menu">
            <a href="issuebooks.php">
              <i class="fa fa-bookmark"></i>
              <span>Issue books</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="returnbooks.php">
              <i class="fa fa-address-book"></i>
              <span>Return books</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="fine.php">
              <i class="fa fa-info-circle"></i>
              <span>Fine Details</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="member.php">
              <i class="fa fa-th"></i>
              <span>Member Details</span>
              </a>
          </li>
          <li>
          <a href="contact.php">
              <i class="fa fa-envelope"></i>
              <span>Comments </span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
          <li>
            <a href="chat.php">
              <i class="fa fa-comments"></i>
              <span>Chat </span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
            <!--main content start-->
        <section id="main-content">
        <section class="wrapper">
      <!----------Show ALert Message------------>
              <section id="lms">         
                 <div class="container"> 

                 <?php
                 if (isset($_SESSION['message']))
                 { 
                 echo'<div class="alert ';echo ($_SESSION['type']) ;echo '" role="alert">
                  <center>';?>  <?php echo ($_SESSION['message']) ;?>
                  <?php unset ($_SESSION['message']); ?> <?php echo '</center></div>';

                 }?>
                
              
                 </div>
                </section>

      <!---------ALert-------------->
      
      
        <div class="container">
			<div class="main">
				<div class="main-center">
				<h5>Update Books</h5>
          <form method="post" action="update.php" enctype="multipart/form-data">
          
				<input type="hidden" class="form-control" name="id" value="<?php echo $bid; ?>"/>
						
						
						<div class="form-group">
							<label>Book Title</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="title" value="<?php echo $title; ?>" placeholder="Enter Book Name" required/>
							</div>
						</div>

						<div class="form-group">
							<label>Book Author</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
									<input type="text" class="form-control" value="<?php echo $author; ?>" name="author" placeholder="Enter Author Name" required/>
							</div>
						</div>

						<div class="form-group">
							<label>Book Category</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i></span>
									<select class="form-control" name="category" required>
									<option>Choose Book Category</option>
                                    <option value="IT">IT</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Science">Science</option>
                                    <option value="Novel">Novel</option>
                                    <option value="Art">Art</option>
                                    <option value="Poetry">Poetry</option>
                                    <option value="Health">Health</option>
                                    <option value="Biography">Biography</option>
                                    <option value="Cooking">Cooking</option>
                                    <option value="Business">Business</option>
                                    <option value="Kids">Kids</option>
                                    <option value="Other">Other</option>
                                    
                                   </select>
								</div>
            </div>
            
            <div class="form-group">
							<label>ISBN Number</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
									<input type="text" class="form-control" value="<?php echo $isbn; ?>" name="isbn"  placeholder="Enter ISBN Number" required/>
								</div>
            </div>
            
            <div class="form-group">
							<label>Publisher</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-upload"></i></span>
									<input type="text" class="form-control" value="<?php echo $publisher; ?>" name="publisher" placeholder="Enter Book Publisher" required/>
								</div>
            </div>
            
            <div class="form-group">
							<label>Book Pages</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-file"></i></span>
									<input type="number" class="form-control" value="<?php echo $pages; ?>" name="pages" placeholder="Enter Book Pages" required/>
								</div>
						</div>

						<div class="form-group">
							<label>Book Quantity</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
									<input type="number" class="form-control" value="<?php echo $quan; ?>" name="quantity" placeholder="Enter Book Quantity" required/>
								</div>
						</div>

						<div class="form-group">
							<label>Book Language</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true"></i></span>
									<select class="form-control" name="language" required>
									<option>Choose Language</option>
                                    <option value="Sinhala">Sinhala</option>
                                    <option value="English">English</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Russian">Russian</option>
                                    <option value="Chinese">Chinese</option>
                                    
                                    </select>
								</div>
						</div>
						
						<div class="form-group">
							<label>Book Cover</label>
								<div class="input-group">
								    <span class="input-group-addon"></span>
									<input type="file" class="form-control" name="cover" >
								</div>
						</div>
						
						<div class="form-group">
							<label>1st image</label>
								<div class="input-group">
								<span class="input-group-addon"></span>
									<input type="file" class="form-control" name="fimage" >
								</div>
						</div>
						
						<div class="form-group">
							<label>2nd image</label>
								<div class="input-group">
								<span class="input-group-addon"></span>
									<input type="file" class="form-control" name="nimage" >
								</div>
						</div> 
						
						

				<button type="submit" name="update">Update</button>
                    
     
						
          </form>
          
				</div><!--main-center"-->
			</div><!--main-->
    </div><!--container-->
    
        </section>
        </section>

      
       
        
         
           <!--footer start-->
    <footer class="footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Sipsewana</strong>. All Rights Reserved
        </p>
      </div>
    </footer>
    <!--footer end-->
  </section>
  
  
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>

</body>

</html>
