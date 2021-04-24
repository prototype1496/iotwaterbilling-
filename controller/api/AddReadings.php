<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Heade");

require '../../db_connection/dbconfig.php'; 
require '../../model/SuperModel.php';


  
// get posted data
//$data = json_decode(file_get_contents("php://input"));
  $customerID = trim(filter_input(INPUT_GET, 'cutomer_id', FILTER_DEFAULT));
  $waterReading = trim(filter_input(INPUT_GET, 'water_reading', FILTER_DEFAULT));
    //  $customerID =   'CUST00000000027';
     // $waterReading = '500';
  $bill_stataus = 'UNPD';
  $updated_by = 'Adwino';

if(
    !empty($customerID) &&
    !empty($waterReading) &&
    !empty($bill_stataus) &&
    !empty($updated_by)
){
  
    // create the product
    if(SuperModel::add_meter_readings($customerID,$waterReading,$bill_stataus,$updated_by)){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
      //  echo json_encode(array("message" => "Product was created."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
       // echo json_encode(array("message" => "Unable to create product."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
   // echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>


