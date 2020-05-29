<?php

$rownum= $_GET['rownum'];

//connection
$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli));
                
//select it                
$sql = "SELECT * FROM addbook WHERE book_id='$rownum'";
$result = mysqli_query($mysqli, $sql);

?>


<?php
session_start();
if(!isset($_SESSION['LoggedInUserId']))
{
  header("location:../index.php");
}
?>
<?php

    $mem= $_SESSION['id'];
   
    //CHECK BOOK COUNT OF SAME BOOK
    $check = "SELECT * FROM issuebook WHERE bookid='$rownum' AND memberid='$mem'";

    $checkresult = mysqli_query($mysqli, $check);

    $getcheck = mysqli_fetch_assoc($checkresult);

    $dil = $getcheck['bookid'];

    //GET ORDER COUNT OF SAME MEMBER

    $getcount = "SELECT COUNT('memberid') AS member FROM issuebook WHERE memberid='$mem'";

    $getcountquery = mysqli_query($mysqli,$getcount);

    $gecountresult = mysqli_fetch_assoc($getcountquery);

    $getcm = $gecountresult['member'];

?>

<!doctype html>
 <html>
<head>
<meta name="viewport" content="width = 1050, user-scalable = no" />
<script type="text/javascript" src="../extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="../extras/modernizr.2.5.3.min.js"></script>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/aos.css">
     
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/bookview.css">
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
                        <a href="../html/book.php" class="nav-link smoothScroll">Books</a>
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
 <!---Book----->
 <section id="bookcard">

<h6 class="section-title h1">Book Details</h6>

<div class="flipbook-viewport">
	<div class="container">
		<div class="flipbook" id="books">
		
    <?php

                //fetch cover images from database  
                while ($row = mysqli_fetch_array($result)){
                    
    echo '<div style="background-image:url(../Admin/upload/'.$row["cover"].');"></div>
          <div style="background-image:url(../images/Book/view/covers1.jpg)"></div>';
                    
    echo "<div class='viewbook'>
           <p>BookID</p>                
           <font color='#D3D3D3'><h1>".$row['book_id']."</h1></font>
           <font color='#fff'><h1>".$row['title']."</h1></font> 
           <font color='#862d2d'><h3>".$row['author']."</h3></font>
           <br><font color=' #6b6b47'><h3>IN</h3></font><font color=' #ffff66'><h3>".$row['language']."</h3></font>";
           //button
           if(empty($dil) && $getcm<3)
           {
           echo'<a href="reserve.php?book='.$row["book_id"].'&mem='.$mem.'">Reserve Book</a>';
           }
    
    echo "</div>";               
	  echo "<div class='preview'></div>";
    echo "<div style='background-image:url(../Admin/upload/".$row['firstimage'].");'></div>";
    echo "<div style='background-image:url(../Admin/upload/".$row['firstimage'].");'></div>";
    echo "<div style='background-image:url(../Admin/upload/".$row['nextimage'].");'></div>";
    echo "<div style='background-image:url(../Admin/upload/".$row['nextimage'].");'></div>";
    echo "<div style='background-image:url(../images/Book/view/covers2.jpg)'></div>";
    echo "<div style='background-image:url(../images/Book/view/endpage.jpg)'></div>";
                }
                echo "";

        ?>
      
		</div>
	</div>
</div>
<input type='hidden' id='hiddenUserId' value='<?php echo $_SESSION['LoggedInUserId']; ?>'/> 
</section>
     <!-- SCRIPTS -->
     <script src="../js/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/aos.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/custom.js"></script>
     
     
<script type="text/javascript">

function loadApp() {

	// Create the flipbook

	$('.flipbook').turn({
			// Width

			width:922,
			
			// Height

			height:600,

			// Elevation

			elevation: 50,
			
			// Enable gradients

			gradients: true,
			
			// Auto center this flipbook

			autoCenter: true

	});
}

// Load the HTML4 version if there's not CSS transform

yepnope({
	test : Modernizr.csstransforms,
	yep: ['../lib/turn.js'],
	nope: ['../lib/turn.html4.min.js'],
	complete: loadApp
});

</script>



  <script>
    
    $(document).ready(function() {

      // var scroll = new SmoothScroll('a[href*="#"]');

      $("#books").on("click", ".js-order", function(){
        let bookId = parseInt($(this).attr("data-book-id"));
        
        orderBook(bookId);
      });

      function orderBook(bookId){
       let vm = {
         book_id : bookId,
         user_id : parseInt($("#hiddenUserId").val())
       };

        $.ajax({
          url: "/LMS/api/orders/order.php",
          method: "POST",
          data: JSON.stringify(vm),
          ContentType: "application/json",
          success: function(result) {
            
          },
          error: function(jqXHR, textStatus, errorThrown) {
            //console.log(jqXHR.responseText);
          }
        });
      }

      // let doctors = [];
      // let specializedDoctors = [];
      // const weekDayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      // const patientId = $("#hiddenPatientId").val();

      // bindDoctorsList();


      // $("#cmbSpeciality").on("change", function() {
      //   specializedDoctors = [];
      //   $("#cmbDoctor").empty();
      //   $("#cmbDoctor").append(
      //     $("<option></option>").val("").html("Select a doctor")
      //   );

      //   let speciality = $(this).val();

      //   if (doctors.length < 1 || !speciality) return;

      //   specializedDoctors = doctors.filter(function(doctor) {
      //     return doctor.speciality == speciality
      //   });

      //   $.each(specializedDoctors, function(index, item) {
      //     $("#cmbDoctor").append(
      //       $("<option></option>").val(item.doctor_id).html(item.doctor_name));
      //   });

      // });

      // $("#cmbDoctor").on("change", function() {
      //   let doctor_id = $(this).val();

      //   $("#cmbDay").empty();
      //   $("#cmbDay").append(
      //     $("<option></option>").val("").html("Select a doctor available day")
      //   );

      //   if (specializedDoctors.length < 1 || !doctor_id) return;

      //   let doctorAvailableDays = specializedDoctors.filter(function(doctor) {
      //     return doctor.doctor_id == doctor_id
      //   })[0].available_days.split(',');

      //   $.each(doctorAvailableDays, function(index, item) {
      //     $("#cmbDay").append(
      //       $("<option></option>").val(item).html(item)
      //     );
      //   });
      // });

      // $("#cmbDay").on("change", function() {
      //   $("#txtAppointmentDate").val("");
      //   let indexOfSelectedDate = weekDayNames.indexOf($(this).val());
      //   let indexOfCurrentDate = new Date().getDay();

      //   let appointmentDate = new Date();

      //   appointmentDate.setDate(appointmentDate.getDate() + (indexOfSelectedDate + (7 - indexOfCurrentDate)) % 7);
      //   $("#txtAppointmentDate").val(appointmentDate.toLocaleDateString());

      // });

      // $("#btnSave").click(function() {
      //   let patient_name = $("#txtName").val();
      //   let age = $("#txtAge").val();
      //   let phone_no = $("#txtPhone").val();
      //   let appointment_date = $("#txtAppointmentDate").val();
      //   let doctor_id = $("#cmbDoctor").val();

      //   if (!patient_name) {
      //     toastr.error("Patient name field is required.");
      //     return;
      //   }
      //   if (!age) {
      //     toastr.error("Age field is required.");
      //     return;
      //   }
      //   if (!phone_no) {
      //     toastr.error("Phone no field is required.");
      //     return;
      //   }
      //   if (!$("#cmbSpeciality").val()) {
      //     toastr.error("Please select a speciality.");
      //     return;
      //   }
      //   if (!$("#cmbDoctor").val()) {
      //     toastr.error("Please select a doctor.");
      //     return;
      //   }
      //   if (!$("#cmbDay").val()) {
      //     toastr.error("Please select a doctor available day.");
      //     return;
      //   }
      //   if (!appointment_date) {
      //     toastr.error("Appointment date field is required.");
      //     return;
      //   }

      //   let appointment = {
      //     patient_name,
      //     age,
      //     phone_no,
      //     appointment_date,
      //     doctor_id,
      //     patient_id: patientId
      //   };

      //   $.ajax({
      //     url: "/Medilife/api/appointments/create.php",
      //     method: "POST",
      //     data: JSON.stringify(appointment),
      //     ContentType: "application/json",
      //     success: function(result) {
      //       //console.log(result);
      //       Swal.fire({
      //         title: 'Appointment Created.',
      //         html: `Your token is ${result}!`,
      //         type: 'success',
      //         onClose: () => {
      //           location.reload(true);
      //         }
      //       });
      //       //alert(`Your token is ${result}`);
      //       $("#txtTokenNo").val(result);
      //     },
      //     error: function(jqXHR, textStatus, errorThrown) {
      //       //console.log(jqXHR.responseText);
      //     }
      //   });

      // });

      // $("#btnCancel").click(function() {
      //   const swalWithBootstrapButtons = Swal.mixin({
      //     customClass: {
      //       confirmButton: 'btn btn-success',
      //       cancelButton: 'btn btn-danger'
      //     },
      //     buttonsStyling: false
      //   })

      //   swalWithBootstrapButtons.fire({
      //     title: 'Are you sure?',
      //     text: "Your appointment will be cancelled.",
      //     type: 'warning',
      //     showCancelButton: true,
      //     confirmButtonText: 'Yes, cancel appointment!',
      //     cancelButtonText: 'No, keep appointment!',
      //     reverseButtons: true
      //   }).then((result) => {
      //     if (result.value) {
      //       cancelAppointment();
      //     } else {

      //     }
      //   });

      //   function cancelAppointment() {
      //     let appointment = {
      //       appointment_id: $("#hiddenAppointmentId").val()
      //     };

      //     $.ajax({
      //       url: "/Medilife/api/appointments/cancel_appointment.php",
      //       method: "DELETE",
      //       data: JSON.stringify(appointment),
      //       ContentType: "application/json",
      //       success: function(result) {
      //         Swal.fire({
      //           title: 'Cancelled.',
      //           html: 'Appointment has been cancelled.',
      //           type: 'success',
      //           onClose: () => {
      //             location.reload(true);
      //           }
      //         });
      //         // alert("Appointment cancelled.");
      //         // location.reload(true);
      //       },
      //       error: function(jqXHR, textStatus, errorThrown) {
      //         // console.log(jqXHR.responseText);
      //       }
      //     });
      //   }
      // });

      // function bindDoctorsList() {
      //   $.ajax({
      //     url: "/Medilife/api/doctors/read.php",
      //     method: "GET",
      //     success: function(result) {
      //       doctors = result;
      //       bindControls();
      //       //  console.log(doctors);
      //     },
      //     error: function(jqXHR, textStatus, errorThrown) {
      //       console.log(jqXHR.responseText);
      //     }
      //   });
      // }

      // function bindControls() {
      //   $.ajax({
      //     url: `/Medilife/api/appointments/read_single.php?id=${patientId}`,
      //     method: "GET",
      //     success: function(result) {
      //       if (result.appointment_id) {
      //         $("#hiddenAppointmentId").val(result.appointment_id);
      //         $("#txtName").val(result.patient_name);
      //         $("#txtAge").val(result.age);
      //         $("#txtPhone").val(result.phone_no);
      //         $("#txtTokenNo").val(result.token_no);
      //         $("#txtAppointmentDate").val(result.appointment_date);
      //         $("#btnSave").attr("disabled", true);
      //         $("#dvCancel").attr("visibility", 'visible');
      //         $("#dvCancel").show();

      //         let doctor = doctors.filter(function(doc) {
      //           return doc.doctor_id == result.doctor_id
      //         })[0];

      //         $("#cmbSpeciality").val(doctor.speciality).change();
      //         $("#cmbDoctor").val(result.doctor_id).change();
      //         $("#cmbDay").val(weekDayNames[new Date(result.appointment_date).getDay()]).change();
      //       } else {
      //         $("#dvCancel").hide();
      //       }
      //     },
      //     error: function(jqXHR, textStatus, errorThrown) {
      //       console.log(jqXHR.responseText);
      //     }
      //   });
      // }

    });
  </script>

</body>
</html>