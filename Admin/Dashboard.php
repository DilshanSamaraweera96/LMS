<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 
?>
<?php
session_start();
if(!isset($_SESSION['LoggedInUserId']))
{
  header("location:adminlog.html");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SipSewana Admin Panel</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>

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
      <a href="Dashboard.php" class="logo"><b>Sip<span>Sewana</span></b></a>
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
          <li><a class="logout" href="html/logout.php">Logout</a></li>
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
          <p class="centered"><img src="Images/logo.png" class="img-circle" width="80"></p>
          <h5 class="centered">Welcome</h5>
          <li class="mt">
            <a class="sub-menu" href="Dashboard.php">
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
              <li><a href="Html/addbooks.html">Add books</a></li>
              <li><a href="Html/updatebooks.php">Update books</a></li>
              <li><a href="Html/allbooks.php">All books</a></li>
            </ul>
          </li>
          
          <li class="sub-menu">
            <a href="Html/pending.php">
              <i class="fa fa-archive"></i>
              <span>Pending Reservations</span>
              </a>
          </li>
          
          <li class="sub-menu">
            <a href="Html/issuebooks.php">
              <i class="fa fa-bookmark"></i>
              <span>Issue books</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="Html/returnbooks.php">
              <i class="fa fa-address-book"></i>
              <span>Return books</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="Html/fine.php">
              <i class="fa fa-info-circle"></i>
              <span>Fine Details</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="Html/member.php">
              <i class="fa fa-th"></i>
              <span>Member Details</span>
              </a>
          </li>
          <li>
            <a href="Html/contact.php">
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
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
            <h1><b><font color="#bf4040">WELCOME </font><font color="#ac7339"> ADMIN</font></b></h1>
          </div> 
         
    <div id="projectFacts" class="sectionClass">
    
    <h2><b><font color="#5c5c3d">Summary</font></b></h2>
    
    <div class="fullWidth">
        <div class="projectFactsWrap ">

        <!-- Get Total Books -->
    
    <?php

    $sumb = "SELECT SUM(quantity) AS sum FROM addbook";

    $sumresult = mysqli_query($mysqli,$sumb);

    $sumcheck = mysqli_fetch_array($sumresult);

    $totalbooks = $sumcheck['sum'];
 
    ?>
            <div class="item">
                <img src="Images/gif/books.gif">
                <p class="number"><?php echo "$totalbooks"; ?></p>
                <span></span>
                <p>Total Books</p>
            </div>

        <!-- Get Issue book Count -->

                      <?php

                      $ist = "SELECT COUNT(issuedate) AS isdate FROM issuebook WHERE returndate IS NULL AND issuedate IS NOT NULl";

                      $isresult = mysqli_query($mysqli,$ist);

                      $ischeck = mysqli_fetch_array($isresult);

                      $totalisdate = $ischeck['isdate'];

                      ?>
            <div class="item">
                <img src="Images/gif/isue.gif">
                <p class="number"><?php echo "$totalisdate"; ?></p>
                <span></span>
                <p>Issue Books</p>
            </div>
        
        <!-- Return books count -->

                  <?php

                  $ret = "SELECT COUNT(returndate) AS redate FROM issuebook WHERE completedate IS NULL";

                  $result = mysqli_query($mysqli,$ret);

                  $recheck = mysqli_fetch_array($result);

                  $totalredate = $recheck['redate'];

                  ?>
            <div class="item">
                <img src="Images/gif/return.gif">
                <p class="number"><?php echo "$totalredate"; ?></p>
                <span></span>
                <p>Return Books</p>
            </div>

        <!-- Get Members Count-->

                <?php

                $mem = "SELECT COUNT(`mem-id`) AS memcount FROM user_register";

                $memresult = mysqli_query($mysqli,$mem);

                $memcheck = mysqli_fetch_array($memresult);

                $totalmem = $memcheck['memcount'];
            
                ?>

            <div class="item">
                <img src="Images/gif/user.gif">
                <p class="number"><?php echo "$totalmem"; ?></p>
                <span></span>
                <p>Total Members</p>
            </div>
        </div>
    </div>
</div> 
         
          <h3>Let's Get Started..!</h3>
          <div class="sentence">
             <p>1.You can check Available books.<br></p>
             <p>2.You can Add new books & remove books if you want.<br></p>
             <p>3.You can accept or reject member's book orders.<br></p>
             <p>4.You can add penalty for late book submission.<br></p>
             <p>6.You can search any book or any member or any record using search options.<br></p>
             <p>6.You can check member details and remove.<br></p>
             <p>7.You can check user's messages<br></p>
          
          </div>



    <!--------------------------- AUTO PROCESS RESERVE NOT COLLECT--------------------------------->
    <?php
    
    
    $getcollect = "SELECT * from issuebook where returndate IS NULL AND issuedate IS NOT NULL";

    $collectquery = mysqli_query($mysqli,$getcollect);


    while(!empty($colectres = mysqli_fetch_assoc($collectquery)))
    {
       
    $cdate = $colectres['collectdate'];
    $today = date('Y-m-d');

    //convert string to object
    $coldate = new DateTime($cdate);
    $ada = new DateTime($today);

    // calculates the difference between DateTime objects 
    $interval = date_diff($ada,$coldate);

    // printing result in days format 
     $x=$interval->format('%R%a');
    
    //auto process
    if($x>=0)
    {
      //if difference > =0 CONTINUE normal process
    }
    else
    {
      //IF <0 EXCUTE AUTO PROCESS
      $cmem = $colectres['memberid'];
      $cbook = $colectres['bookid'];

              //Check avalibility of pending request

              $pen = "SELECT * FROM issuebook WHERE issuedate IS NULL AND bookid='$cbook'";

              $penr = mysqli_query($mysqli,$pen);
      
              $penc = mysqli_fetch_assoc($penr);
      
              $p = $penc['memberid'];
      
      
             //check quantity is 0
      
              $chkqty = "SELECT quantity FROM addbook WHERE book_id='$cbook'";
      
              $chkres = mysqli_query($mysqli, $chkqty);
      
              $chkchk = mysqli_fetch_assoc($chkres);
      
              $c= $chkchk['quantity'];
      
      
              //issue dates to pending reservations
      
              if($c==0 && !empty($p))
              {
                  $currentdate = date('Y-m-d');
                  $collectdate = date('Y-m-d', strtotime($currentdate.'+3 days'));
      
                  $assign = "UPDATE issuebook SET issuedate='$currentdate', collectdate='$collectdate' WHERE memberid='$p'";
      
                  $assignr = mysqli_query($mysqli, $assign);
      
                  //reduce quantity
      
                  if($assignr == true)
                  {    
                      $reqty ="UPDATE addbook SET quantity = quantity -1 WHERE book_id='$cbook'";
      
                      $reqtyr = mysqli_query($mysqli, $reqty);

                                //SET NOTIFICATION 

                                $adasaduda = date('Y-m-d H:i:s');

                                //Get msg into variable
                    
                                $gtmsg= "SELECT msg FROM notification WHERE msgid=4";
                    
                                $colmsg = mysqli_query($mysqli,$gtmsg);
                    
                                $colmsgcheck = mysqli_fetch_assoc($colmsg);
                    
                                $msg = $colmsgcheck['msg'];
                    
                    
                    
                                $not = "INSERT INTO notification(memberid, msg, date) VALUES ('$p','$msg','$adasaduda')";
                    
                                $notquery = mysqli_query($mysqli, $not);
                    
                                //notification entered.
      
                      if($reqtyr == true && $notquery==true)
                      {
      
                        echo'<div class="alert alert-success" role="alert"><center><b>Book AUTOMATICALLY Assigned to Pending Reservations!</center></b></div>';
      
      
                      }
                      else
                      {
      
                        echo'<div class="alert alert-danger" role="alert"><center><b>Error!</center></b></div>';
      
                      }
      
                  }
              }

      //delete uncollect order

      $delissue = "DELETE FROM issuebook WHERE memberid='$cmem' AND bookid='$cbook'";

      $delquery = mysqli_query($mysqli, $delissue);

                    //SET NOTIFICATION 

                    $heta = date('Y-m-d H:i:s');

                    //Get msg into variable
        
                    $delmsg= "SELECT msg FROM notification WHERE msgid=5";
        
                    $deletemsg = mysqli_query($mysqli,$delmsg);
        
                    $deletemsgcheck = mysqli_fetch_assoc($deletemsg);
        
                    $delmsg = $deletemsgcheck['msg'];
        
        
        
                    $notdeletemsg = "INSERT INTO notification(memberid, msg, date) VALUES ('$cmem','$delmsg','$heta')";
        
                    $notdeletemsgquery = mysqli_query($mysqli, $notdeletemsg);
        
                    //notification entered.

      if($delquery==true && $notdeletemsgquery==true)
      {
        $reqty ="UPDATE addbook SET quantity = quantity +1 WHERE book_id='$cbook'";

        $reqtyr = mysqli_query($mysqli, $reqty);

        if($reqtyr == true)
        {

        echo'<div class="alert alert-danger" role="alert"><center><b>Reservation removed cuz didnt collect the book before due time</center></b></div>';


        }
        else
        {

          echo'<div class="alert alert-danger" role="alert"><center><b>Error!</center></b></div>';

        }
      }
      //delete end

    }
    
    } 
    ?>  
      
    <!----------------------------------------------------------------- AUTO PROCESS END---------------------------------------------------------- -->
    
      </section>
    </section>
    <!--main content end-->
       
         
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
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to SipSewana!',
        // (string | mandatory) the text inside the notification
        text: 'You are logged into Sipsewana         Dashboard.Hover me if you want to close.Have a great Day.',
        // (string | optional) the image to display on the left
        image: 'Images/logo.png',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script src="counter.js"></script>

</body>

</html>
