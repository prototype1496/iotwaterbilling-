<script src="../../js/Jnotify/jquery-1.12.4.min.js" type="text/javascript"></script>
<link href="../../js/Jnotify/jnoty.min.css" rel="stylesheet" type="text/css"/>
<script src="../../js/Jnotify/jnoty.min.js" type="text/javascript"></script>
<?php

require  '../../lib/sms/src/Twilio/autoload.php';
  require_once '../../db_connection/dbconfig.php';
   
   
     require_once '../../model/SuperModel.php';
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;


$sid    = "AC156c9d8ee6875a827884ac06a98c8243";
$token  = "d2db65a07490bde6dfbd08842c644530";
$twilio = new Client($sid, $token);
$reult = SuperModel::get_cutomer_sms_data();


      
while ( $row = $reult->fetch(PDO::FETCH_ASSOC)){
    
    try {
                
          $message = $twilio->messages
                  ->create("+260973609319", // to
                           ["body" => "IOT Water Bill ".$row['mesg'], "from" => "+16146826115"]
                  );

           $message->sid; 
          } catch (Exception $exc) {
              //echo $exc->getTraceAsString();
          }
}

 echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Bill Dispatch Complet :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/iotwaterbilling/view/employee/index.php')},
            });   
            }); 
            </script>"; 
 