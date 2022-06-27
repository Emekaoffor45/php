<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require_once '../../../vendor/autoload.php';
  // initialize return values
  $statusCode = 201;
  $message = '';
  $data = array();

  //get Customers from database

  $result = Source\Controller\CustomerController::getCustomers();

  // Get row count
  $num = mysqli_num_rows($result);

  try{
    // Check if any customer in database
    if($num > 0) {
    
        foreach($result as $row) {
            extract($row);

            $product_item = array(
                'customer_id' => $customer_id,
                'first_name' => $first_name,
                'last_name'=>$last_name,
                'birth_date' => $birth_date,
                'phone' => $phone,
                'address' => $address,
                'city' => $city
            );

            // Push to "data"
            array_push($data, $product_item);
        }
        //set message
        $message = 'Get customers successful';

    } else {
        // No customer
        $message = 'No customers to display';
    }
  }catch(Exception $e){
    $statusCode = 401;
    $message = 'Error getting customers.';
  }

  //return values
  echo json_encode(array(
      'status'  => $statusCode,
      'message' => $message,
      'data'    => $data
  ));
  

