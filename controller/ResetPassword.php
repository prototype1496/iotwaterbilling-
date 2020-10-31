 <script src="../../js/Jnotify/jquery-1.12.4.min.js" type="text/javascript"></script>
<link href="../../js/Jnotify/jnoty.min.css" rel="stylesheet" type="text/css"/>
<script src="../../js/Jnotify/jnoty.min.js" type="text/javascript"></script>
<?php
//Load Composer's autoloader
require_once '../../db_connection/dbconfig.php';
 
require_once '../../model/SuperModel.php';
   
  $errors = array();

if (isset($_POST['submit'])) {
   
    // receive all input values from the form
   
    
    $otp = strip_tags(trim( $_POST['otp']));
    
    $id = strip_tags(trim( $_POST['id']));
  
  $userName = strip_tags(trim($_POST['username']));
    
  
    
   
    if(SuperModel::verify_parent_account($otp, $userName,$id)){
       
        if(SuperModel::verify_parents($otp, $userName,$id)){
            
            
        
        echo "
              
        <script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Account Verified Sccessfully Please Log In :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RMS/')},
            });   
            }); 
            </script>"; 
        }else{
             echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('OOOPS Somthing went wrong please try again later', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/RMS/')},
            });   
            }); 
            </script>"; 
        }
        
    }else{
        
          array_push($errors, "Wrong Code Entered");
    }
    
   
    
  
}