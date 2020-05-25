<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Appointment.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate appointments object
  $appointment = new Appointment($db);

  // Appointment read query
  $result = $appointment->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any appointments
  if($num > 0) {
        // appointmet array
        $appointment_arr = array();
        $appointment_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $appointment_item = array(
            'appointment_id' => $appointment_id,
            'patient_name' => $patient_name,
            'age' => $age,
            'phone_no' => $phone_no,
            'appointment_date' => $appointment_date,
            'token_no' => $token_no,
            'doctor_id' => $doctor_id,
            'expiry_date' => $expiry_date
          );

          // Push to "data"
          array_push($appointment_arr['data'], $appointment_item);
        }

        // Turn to JSON & output
        echo json_encode($appointment_arr);

  } else {
        // No appointment
        echo json_encode(
          array('message' => 'No appointment found')
        );
  }
