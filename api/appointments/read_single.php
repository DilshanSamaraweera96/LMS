<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Appointment.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$appointment = new Appointment($db);

// Get ID
$appointment->patient_id = isset($_GET['id']) ? $_GET['id'] : die();

$appointment->read_single_by_patient();

// Create array
$appointment_arr = array(
    'patient_id' => $appointment->patient_id,
    'patient_name' => $appointment->patient_name,
    'age' => $appointment->age,
    'phone_no' => $appointment->phone_no,
    'appointment_date' => $appointment->appointment_date,
    'token_no' => $appointment->token_no,
    'doctor_id' => $appointment->doctor_id,
    'appointment_id' => $appointment->appointment_id,
    'expiry_date' => $appointment->expiry_date
);

// Make JSON
print_r(json_encode($appointment_arr));
