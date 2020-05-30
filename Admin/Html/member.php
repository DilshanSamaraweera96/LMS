<?php

  $mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli)); 

  $result = $mysqli->query("SELECT * FROM user_register") or die($mysqli->error);

?>

<!------Adding collect.php------->
<?php require_once 'memberdelete.php'; ?>

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
  <link href="../css/member.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>
  
    <!------Data Tables--------------->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">

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
          <li><a class="logout" href="logout.php">Logout</a></li>
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
              <span>Contact </span>
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
       
     <section id="lms">
           <div class="container">
             
          <?php
           if (isset($_SESSION['message']))
           { 
          echo'<div class="alert ';echo ($_SESSION['type']) ;echo '" role="alert">
            <center>';?>  <?php echo ($_SESSION['message']) ;?>
          <?php unset ($_SESSION['message']); ?> <?php echo '</center></div>';}?>



          
                <h3 align="center">Member Details</h3>  
                <br />  
                
                <h6><i class="fa fa-certificate"></i> &nbsp;You can view member details in here.</h6>
                
                <div class="table-responsive">  
                     <table id="issue_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                               <td>MemberID</td>
                               <td>Full Name</td>
                               <td>Address</td> 
                               <td>Email</td>
                               <td>PhoneNumber</td>
                               <td>Action</td> 
                               </tr>  
                          </thead>  
                          <?php  
                          while ($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["mem-id"].'</td>  
                                    <td>'.$row["fullname"].'</td>  
                                    <td>'.$row["address"].'</td>  
                                    <td>'.$row["email"].'</td>  
                                    <td>'.$row["phonenumber"].'</td>
                                    <td><center><a href="memberdelete.php?delete='.$row["mem-id"].'" class="btn btn-danger">Delete</a></center></td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div> 

      
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

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>
  
    <script>  
 $(document).ready(function(){  
      $('#issue_data').DataTable();  
 });  
 </script>

</body>

</html>
