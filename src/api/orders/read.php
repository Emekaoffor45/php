<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require_once '../../../vendor/autoload.php';
  // initialize return values
  $statusCode = 201;
  $message = '';
  $data = array();

  //get Orders from database

  $result = Source\Controller\OrderController::getOrders();

  // Get row count
  $num = mysqli_num_rows($result);

  try{
    // Check if any order in database
    if($num > 0) {
    
        foreach($result as $row) {
            extract($row);

            $product_item = array(
                'order_id' => $order_id,
                'customer_id' => $customer_id,
                'order_date' => $order_date,
                'status'=>$status,
                'comments' => $comments,
                'shipped_date' => $shipped_date,
                'shipper_id' => $shipper_id,
            );

            // Push to "data"
            array_push($data, $product_item);
        }
        //set message
        $message = 'Get orders successful';

    } else {
        // No order
        $message = 'No order to display';
    }
  }catch(Exception $e){
    $statusCode = 401;
    $message = 'Error getting orders.';
  }

  //return values
  echo json_encode(array(
      'status'  => $statusCode,
      'message' => $message,
      'data'    => $data
  ));
  

