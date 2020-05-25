<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Appointment.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $appointment = new Appointment($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $appointment->patient_name = $data->patient_name;
  $appointment->patient_id = $data->patient_id;
  $appointment->age = $data->age;
  $appointment->phone_no = $data->phone_no;
  $appointment->doctor_id = $data->doctor_id;
  $appointment->appointment_date = date('Y-m-d',strtotime($data->appointment_date));

  // Create appointment
  $token_no = $appointment->create();

  if($token_no > 0) {
    echo json_encode(
      $token_no
    );
  } else {
    echo json_encode(
      array('message' => 'Appointment Not Created')
    );
  }
