<script src="../../js/Jnotify/jquery-1.12.4.min.js" type="text/javascript"></script>
<link href="../../js/Jnotify/jnoty.min.css" rel="stylesheet" type="text/css"/>
<script src="../../js/Jnotify/jnoty.min.js" type="text/javascript"></script>
<?php

     require_once '../super/SessionStart.php';
     
     
     // based on where you downloaded and unzipped the SDK
//require  '../../lib/sms/src/Twilio/autoload.php';

    
    require_once '../../db_connection/dbconfig.php';
    require_once '../../model/TeacherModel.php';
   
     require_once '../../model/SuperModel.php';
     
  
    require_once '../../entities/EmailService.php';
    require_once '../../entities/HMSUSER.php';
     require_once '../../entities/Doctor.php';
 
 
 if (isset ($_POST['btn_add_iotbilling']))
 {
       
      $username = trim(filter_input(INPUT_POST, 'username', FILTER_DEFAULT));
      $password = trim(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));
      $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_DEFAULT));
      $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_DEFAULT));
      $other_name = trim(filter_input(INPUT_POST, 'other_name', FILTER_DEFAULT));
      $nrc = trim(filter_input(INPUT_POST, 'nrc', FILTER_DEFAULT));
      $passport = trim(filter_input(INPUT_POST, 'passport', FILTER_DEFAULT));
       $contact_no = trim(filter_input(INPUT_POST, 'contact_no', FILTER_DEFAULT));
      $date_of_birth = trim(filter_input(INPUT_POST, 'dob', FILTER_DEFAULT));
      $marital_status_id = trim(filter_input(INPUT_POST, 'marital_status_id', FILTER_DEFAULT));
      $gender_id = trim(filter_input(INPUT_POST, 'gender_id', FILTER_DEFAULT));
      $email_address = trim(filter_input(INPUT_POST, 'email_address', FILTER_DEFAULT));
      
       $position_id = trim(filter_input(INPUT_POST, 'position_id', FILTER_DEFAULT));
   
       
       
      
      $district_id = trim(filter_input(INPUT_POST, 'district_id', FILTER_DEFAULT));
      $zip_code = trim(filter_input(INPUT_POST, 'zip_code', FILTER_DEFAULT));
      $primary_address = trim(filter_input(INPUT_POST, 'parmary_address', FILTER_DEFAULT));
      $secondary_address = trim(filter_input(INPUT_POST, 'secondary_address', FILTER_DEFAULT));
      $updatedby  = $_SESSION['rms_username'];
      
      
    
      
         
      
       $hassed_passsword =  password_hash($password, PASSWORD_DEFAULT);
    
    
    if (!isset($secondary_address) || $secondary_address == Null || $secondary_address == "" ){
        
        $secondary_address = 'NULL';
    }
    
    
   if (!isset($nrc) || $nrc == Null || $nrc == "" ){
        
        $nrc = 'NULL';
    }
    
    
     if (!isset($passport) || $passport == Null || $passport == "" ){
        
        $passport = 'NULL';
    }
    
    
    
     if (!isset($other_name) || $other_name == Null || $other_name == "" ){
        
        $other_name = 'NULL';
    }
    
    if (!isset($email_address) || $email_address == Null || $email_address == "" ){
        
        $email_address = 'NULL';
    }
  
   // print_r($nrc.' '.$passport.' '.$username.', '.$hassed_passsword.', '.$first_name.' , '.$last_name.', '.$other_name.', '.$contact_no.', '.$gender_id.', '.$marital_status_id.', '.$date_of_birth.', '.$position_id.', '.$updatedby.', '.$district_id.', '.$primary_address.', '.$secondary_address.', '.$email_address);
      if(SuperModel::create_iot_user($nrc,$passport,$username,$hassed_passsword,$first_name,$last_name,$other_name,$contact_no,$gender_id,$marital_status_id,$date_of_birth,$position_id,$updatedby,$district_id,$primary_address,$secondary_address,$email_address))
              {
           if ($position_id==2){
               echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('User Sccessfully Added :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/iotwaterbilling/view/admin/addcutomer.php')},
            });   
            }); 
            </script>";  
        }
        else{
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('User Sccessfully Added :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/iotwaterbilling/view/admin/addadmin.php')},
            });   
            }); 
            </script>";  
        }
               
       
          }else
              {
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('User Not Successfully Added change username and contact no then try again', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/iotwaterbilling/view/admin/addadmin.php')},
            });   
            }); 
            </script>"; 
              }
 } else if (isset ($_POST['btn_add_area']))
 {
       
      $areaname = trim(filter_input(INPUT_POST, 'areaname', FILTER_DEFAULT));
      $discription = trim(filter_input(INPUT_POST, 'discription', FILTER_DEFAULT));
      $address = trim(filter_input(INPUT_POST, 'address', FILTER_DEFAULT));
      $district_id = trim(filter_input(INPUT_POST, 'district_id', FILTER_DEFAULT));
      $updatedby  = $_SESSION['rms_username'];
      
     
  
      if(SuperModel::create_iot_area($areaname,$discription,$address,$district_id,$updatedby))
              {
          
                  echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Area Sccessfully Added :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/flood/view/admin/addArea.php')},
            });   
            }); 
            </script>";  
       
          }else
              {
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Area Not Successfully Added try again', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/flood/view/admin/addArea.php')},
            });   
            }); 
            </script>"; 
              }
 }else if (isset ($_POST['btn_add_fatality']))
 {
       
      $area_id = trim(filter_input(INPUT_POST, 'area_id', FILTER_DEFAULT));
      $date = trim(filter_input(INPUT_POST, 'date', FILTER_DEFAULT));
      $affected_population = trim(filter_input(INPUT_POST, 'affected_population', FILTER_DEFAULT));
      $affected_falcilites = trim(filter_input(INPUT_POST, 'affected_falcilites', FILTER_DEFAULT));
      $affected_homes = trim(filter_input(INPUT_POST, 'affected_homes', FILTER_DEFAULT));
       $no_deaths = trim(filter_input(INPUT_POST, 'no_deaths', FILTER_DEFAULT));
      $updatedby  = $_SESSION['rms_username'];
      
     
  
      if(SuperModel::add_iot_fertalites($area_id,$date,$affected_population,$affected_falcilites,$affected_homes,$no_deaths,$updatedby))
              {
          
                  echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Fatalitie Sccessfully Added :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/flood/view/admin/addFetalities.php')},
            });   
            }); 
            </script>";  
       
          }else
              {
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Fatalitie Not Successfully Added try again', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/flood/view/admin/addFetalities.php')},
            });   
            }); 
            </script>"; 
              }
 }
 else if (isset ($_POST['btn_add_readings']))
 {
       
      $areaname = trim(filter_input(INPUT_POST, 'area_id', FILTER_DEFAULT));
      $hight = trim(filter_input(INPUT_POST, 'hight', FILTER_DEFAULT));
     
      $updatedby  = $_SESSION['rms_username'];
      
     
  
      if(SuperModel::create_iot_reading($areaname,$hight,$updatedby))
              {
          
                  echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Reaading Sccessfully Added :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/flood/view/admin/addReadings.php')},
            });   
            }); 
            </script>";  
       
          }else
              {
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Reaading Not Successfully Added try again', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/flood/view/admin/addReadings.php')},
            });   
            }); 
            </script>"; 
              }
 }
 else if (isset ($_POST['Test']))
 {
   echo'test';
 }