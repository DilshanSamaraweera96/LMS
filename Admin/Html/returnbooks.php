<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

 $query = "SELECT
 i.memberid,
 u.fullname,
 i.bookid,
 b.title,
 i.returndate,
 i.completedate
 
 FROM
 issuebook i
 INNER JOIN
 user_register u ON i.memberid = u.`mem-id`
 INNER JOIN
 addbook b ON i.bookid = b.book_id 
 WHERE i.returndate IS NOT NULL
 ORDER BY i.issueid DESC";
 
$book = mysqli_query($mysqli, $query); 

$right = $mysqli->query($query);

$num_rows= mysqli_num_rows($book);

 ?>

<!------Adding return.php------->
<?php require_once 'return.php'; ?>



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
  <link href="../css/issuebooks.css" rel="stylesheet">
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

              <!----------Show ALert Message------------>
              <?php
              if (isset($_SESSION['message']))
              { 
              echo'<div class="alert ';echo ($_SESSION['type']) ;echo '" role="alert">
                <center>';?>  <?php echo ($_SESSION['message']) ;?>
              <?php unset ($_SESSION['message']); ?> <?php echo '</center></div>';

              }?>



                <h3 align="center">Book Returning Details</h3>  
                <br /> 
                <?php 
                        //insert data into RETURN table

                        if($num_rows>0)
                       {
                          echo '<div class="table-responsive">  
                                <table id="issue_data" class="table table-striped table-bordered">  
                                <thead>  
                                <tr>  
                                    <td>Member ID</td>  
                                    <td>Member Name</td>  
                                    <td>Book ID</td>  
                                    <td>Title</td>  
                                    <td>Due Return Date</td>
                                    <td>Returned Date</td>
                                    <td>Return Status</td>  
                                </tr>  
                                </thead> '; 
                          
                          while ($row = mysqli_fetch_array($book))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["memberid"].'</td>  
                                    <td>'.$row["fullname"].'</td>  
                                    <td>'.$row["bookid"].'</td>  
                                    <td>'.$row["title"].'</td>  
                                    <td>'.$row["returndate"].'</td>
                                    <td>'.$row["completedate"].'</td>
                                    <td><center><a id="collect" href="return.php?return='.$row["memberid"].'" class="btn btn-primary">Return</a></center></td>
                                    
                               </tr>  
                               ';  
                               
                          }  
                          
                           echo '</table>  
                           </div>';   
                        }
                        else
                        {
                          echo '<h6><i class="fa fa-certificate"></i> &nbsp;Doesnt have any data yet.</h6>';

                        }
                        
                ?>

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
  
 
  
  <!-- js placed at the end of the document so the pages load faster -->
  

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
