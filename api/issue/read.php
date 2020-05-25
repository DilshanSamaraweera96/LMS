<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/database.php';
  include_once '../../models/issue.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate order object
  $order = new order($db);

  // Doctor read query
  $result = $order->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any orders
  if($num > 0) {
        // appointmet array
        $order_arr = array();
        //$doc_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $order_item = array(
            'member_id' => $member_id,
            'book_id' => $book_id,
            'issuedate' => $issuedate,
            'returndate' => $returndate
          );

          // Push to "data"
          array_push($order_arr, $order_item);
        }

        // Turn to JSON & output
        echo json_encode($doc_arr);

  } else {
        // No order
        echo json_encode(
          array('message' => 'No issued book found')
        );
  }
