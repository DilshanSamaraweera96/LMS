<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Doctor.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$doctor = new Doctor($db);

// Get ID
$doctor->doctor_id = isset($_GET['id']) ? $_GET['id'] : die();

$doctor->read_single();

// Create array
$doc_arr = array(
    'doctor_id' => $doctor->doctor_id,
    'doctor_name' => $doctor->doctor_name,
    'speciality' => $doctor->speciality,
    'available_days' => $doctor->available_days
);

// Make JSON
print_r(json_encode($doc_arr));
