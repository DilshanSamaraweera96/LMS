<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
  include_once '../../config/Database.php';
  include_once '../../models/Appointment.php';

  $database = new Database();
  $db = $database->connect();

  $appointment = new Appointment($db);

  $data = json_decode(file_get_contents("php://input"));

  $appointment->appointment_id = $data->appointment_id;

  // cancel appointment
  if($appointment->cancel_appointment()) {
    echo json_encode(
      array('message' => 'Appointment cancelled')
    );
  } else {
    echo json_encode(
      array('message' => 'Appointment not cancelled')
    );
  }