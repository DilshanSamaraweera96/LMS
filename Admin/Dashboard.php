<?php require_once 'Html/news.php'?> 
<?php require_once 'Html/newscancel.php'?> 
<?php  
 // Instantiate DB & connect
 $mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 
?>
<?php
if(!isset($_SESSION['LoggedUser']))
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
  <link rel="stylesheet" href="css/javascript-calendar.css" type="text/css">
  <script src="lib/chart-master/Chart.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
    <!------Data Tables--------------->
    <script src="lib/jquery/jquery.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">

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
              <span>Comments </span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
          <li>
            <a href="Html/chat.php">
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
        <div class="row">
            <h1><b><font color="#fff">WELCOME </font><font color="#48cfad"> ADMIN</font></b></h1>
          </div>
          <!----------------------Adding auto cancel uncollected books  -->
          <?php include 'autoassign.php';?>
          <?php require_once 'returnnotification.php';?>
         
         
    <div id="projectFacts" class="sectionClass">
    
    <h2><b><font color="#48cfad">Statistics</font></b></h2>
    
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
    
<!--------------------------------------------------------------------- News ----------------------------------------------------------------->
     <section class="contact section" id="news">
     <div class="container">
                            
      <div class="row">

          <div class="col-md-6 col-12">
          <h2>News</h2>

            <!-- ALERT -->
            <?php
           if (isset($_SESSION['news']))
           { 
                         echo'<div class="alert ';echo ($_SESSION['ntype']) ;echo '" role="alert">
                          <center>';?>  <?php echo ($_SESSION['news']) ;?>
                          <?php unset ($_SESSION['news']); ?> <?php echo '</center></div>';

           }?>


                    <p><font color=red><i class="fa fa-file"></i> </font>Upload recent news in here.</p>
                        

                        <form action="Html/news.php" method="post" class="contact-form webform" enctype="multipart/form-data">
                            

                            <input type="text" class="form-control" name="topic" placeholder="Topic" required>

                            <textarea class="form-control" rows="5" name="msg" placeholder="Message" required></textarea>

                            <input type="file" class="form-control" name="cover" required>

                            <button type="submit" class="form-control" id="submit-button" name="newssubmit">Upload</button>
                        </form>
            </div>

           <div id="calendar" class="col-md-6 col-12 ">
                    <h4 class="cal"><font color=#339933>Calendar</font></h4>
                    
                    <div class="icalendar">
                    <div class="icalendar__month">
                    <div class="icalendar__prev" onclick="moveDate('prev')">
                    <span>&#10094</span>
                    </div>
                    <div class="icalendar__current-date">
                            <h2 id="icalendarMonth"></h2>
                            <div>
                                <div id="icalendarDateStr"></div>
                            </div>

                        </div>
                        <div class="icalendar__next" onclick="moveDate('next')">
                            <span>&#10095</span>
                        </div>
                    </div>
                    <div class="icalendar__week-days">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="icalendar__days"></div>
                    </div>
                
             </div>


            </div>

              <!-- News table -->

                   <h3 align="center">News Table</h3>  

                               <!-- ALERT -->
                               <?php
                                if (isset($_GET['delnews']))
                                { 
                                echo'<div class="alert alert-danger" role="alert"><center><b>Record Has Been Deleted!</center></b></div>';
                                echo'<script>    
                                if(typeof window.history.pushState == "function") {
                                window.history.pushState({}, "Hide", "Dashboard.php#issue_data");
                                }
                                </script>';

                                }?>
               
               <?php 

                  $getnews = "SELECT * FROM booknews ORDER BY newsid DESC";
                  $getnewsquery = mysqli_query($mysqli,$getnews);

                  if($getnewsquery)
                  {
                      $newsrow = mysqli_num_rows($getnewsquery);
                                      

                    //insert data into issue table

                    if($newsrow>0)
                    {
                      echo '<div class="table-responsive">  
                            <table id="issue_data" class="table table-striped table-bordered">  
                            <thead>  
                            <tr>
                                <td>News ID</td>    
                                <td>Topic</td>  
                                <td>Upload Date</td>  
                                <td>Action</td>   
                            </tr>  
                            </thead> '; 
                      
                      while ($getnewsrow = mysqli_fetch_array($getnewsquery))  
                      {  
                          echo '  
                          <tr>  
                                <td>'.$getnewsrow["newsid"].'</td>
                                <td>'.$getnewsrow["topic"].'</td>  
                                <td>'.$getnewsrow["newsdate"].'</td>  
                                <td><center><a id="collect" href="Html/newscancel.php?newsid='.$getnewsrow["newsid"].'" class="btn btn-danger">Remove</a></center></td>  
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
                  }
                

                ?>
                    
        </div>
    
             
</section>
    




    
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


  <script src="lib/javascript-calendar.js" type="text/javascript"></script>
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

  <script>  
 $(document).ready(function(){  
      $('#issue_data').DataTable();  
 });  
 </script>

 <!-- calendar -->
 <script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>

</html>
