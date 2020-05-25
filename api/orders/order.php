<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  //$appointment = new Appointment($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  $user_id = $data->user_id; 
  $user_id = $data->book_id; 
