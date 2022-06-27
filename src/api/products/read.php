<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require_once '../../../vendor/autoload.php';
  // initialize return values
  $statusCode = 201;
  $message = '';
  $data = array();

  //get Products from database

  $result = Source\Controller\ProductController::getProducts();

  // Get row count
  $num = mysqli_num_rows($result);

  try{
    // Check if any product in database
    if($num > 0) {
    
        foreach($result as $row) {
            extract($row);

            $product_item = array(
                'product_id' => $product_id,
                'name' => $name,
                'quantity_in_stock'=>$quantity_in_stock,
                'unit_price' => $unit_price,
            );

            // Push to "data"
            array_push($data, $product_item);
        }
        //set message
        $message = 'Get products successful';

    } else {
        // No product
        $message = 'No products to display';
    }
  }catch(Exception $e){
    $statusCode = 401;
    $message = 'Error getting Products.';
  }

  //return values
  echo json_encode(array(
      'status'  => $statusCode,
      'message' => $message,
      'data'    => $data
  ));
  

