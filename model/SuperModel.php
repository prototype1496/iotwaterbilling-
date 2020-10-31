<?php

class SuperModel{
    //NEW NEW WATER BILLING 

    
    
    public static function add_meter_readings($customerID,$waterReading,$bill_stataus,$updated_by) {
        
       
       
      $rounded_value  =  round($waterReading,2);
      
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user master tabble
            $query1 = "INSERT INTO `water_reading_db`.`readings` (`CutomerID`, `waterreading`, `priviousreading`, `billamount`, `billstatus`, `UpdatedBy`) VALUES ('$customerID', '$waterReading',  GetPrivouseReading( '$customerID'), ClaculateUnitCharge($waterReading), 'UNPD', 'Awino-1');";
            
           
            $stm = $conn->prepare($query1);
            
           
            $stm->execute();


            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
           // echo $exc->getMessage();
            return FALSE;
        }
    }
    
     public static function get_cutomer_sms_data() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetSMSData();";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
     public static function get_cutomer_readings($customer_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetCustomerReadings('$customer_id');";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
    
     public static function get_cutomer_bill_data() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetCustomerOwedAmounts();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
    public static function get_cutomer_invoice_bills($customer_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetCustomerInvoiceBills('$customer_id');";
        $stm = $conn->query($query);
        
            return $stm;
      
   }
   
    public static function get_cutomer_invoice_details($customer_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetCustomerInvoiceDeatils('$customer_id')";
        $stm = $conn->query($query);
       $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row;
      
   }
   
   public static function get_cutomer_invoice_paid_bills($customer_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetCustomerInvoicePaidBills('$customer_id');";
        $stm = $conn->query($query);
        
            return $stm;
      
   }
   
   
    public static function get_cutomer_invoice_paiddetails($customer_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetCustomerInvoicePayidDeatils('$customer_id')";
        $stm = $conn->query($query);
       $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row;
      
   }
   
     public static function get_dashboared_data() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetDashboaredData()";
        $stm = $conn->query($query);
       $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row;
      
   }
   
    public static function get_user_types() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetUserTypes();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
    //NEW NEW WATER BILLING END 
    
    
    
    
    
    
    //NEW RMS
    
    public static function upload_results($studenNo,$markObtained,$remark,$SubjectCode,$year,$termID,$updatebBy) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        
        
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user master tabble
            $query1 = "UPDATE studentdetails SET IsWiten = 1, MarkObtained = :markObtained, Remarks = :remark, UpdatedBy = :updateby WHERE StudentNo = :studenNo AND SubjectCode = :SubjectCode AND `Year` = :year AND TermMaterID = :termID;";
            $stm = $conn->prepare($query1);
            $stm->execute(array(':markObtained'=>$markObtained, ':remark'=>$remark, ':studenNo'=>$studenNo, ':SubjectCode'=>$SubjectCode,':year'=>$year,':termID'=>$termID,':updateby'=>$updatebBy));


            
            
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
           // echo $exc->getMessage();
            return FALSE;
        }
    }
    
    public static function verify_parents($otp,$username,$id) {
        //the below function creates a teacher in the database
        
        
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user master tabble
            $query1 = "UPDATE usermaster SET IsActive = 1 WHERE PublicID = '$id' AND OTP = '$otp' AND UserName = '$username';";
            
            $stm = $conn->prepare($query1);
            
           
            $stm->execute();

            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
            echo $exc->getMessage();
            return FALSE;
        }
    }
    
     public static function verify_parent_account($otp,$username,$id) {
        //this functiion is used to authenticate the user by usinng only the user name and reterning details of the user
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "SELECT * FROM usermaster UM WHERE UM.PublicID = '$id' AND UM.OTP = '$otp' AND UM.UserName = '$username'";
        $stm = $conn->prepare($query);
        $stm->execute();

        if ($stm->rowCount() > 0) {

         
            return TRUE;
        }else{
           return FALSE; 
            
        }
    }
    
    
    
    
 
    
    
   
    
     public static function register_parent($nrc,$passport,$username,$password,$first_name,$last_name,$other_name,$contact_no,$gender,$marital_status,$date_of_birth,$usertypeid,$updatedby,$district,$parmary_address,$secondary_address,$email_address,$otp) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        
        $sequenceNo = SuperModel::get_sequence_id(14);
        
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user master tabble
            $query1 = "INSERT INTO `rms_db`.`usermaster` (`PublicID`, `NRC`, `Passport`, `UserName`, `Password`, `FirstName`, `LastName`, `OtherName`, `EmailAddress`, `ContactNo`, `GenderID`, `MaritalStatusID`, `DOB`, `UserTypeID`,`UpdatedBy`, `IsActive`,`OTP`) VALUES ('$sequenceNo', '$nrc','$passport','$username','$password','$first_name','$last_name','$other_name', '$email_address','$contact_no','$gender','$marital_status','$date_of_birth','$usertypeid','$updatedby', '0','$otp');";
            
            $stm = $conn->prepare($query1);
            
           
            $stm->execute();

            
//                
////                //Insets data in address table                                                                                                  
            $query3 = "INSERT INTO `address` (`PrimaryAddress`, `SecondaryAddress`, `DistrictID`, `UserMaterID`) VALUES ('$parmary_address', '$secondary_address', '$district', '$sequenceNo');";
            $stm2 = $conn->prepare($query3);
            $stm2->execute();

            
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
           // echo $exc->getMessage();
            return FALSE;
        }
    }
    
     public static function create_pupil($nrc,$passport,$username,$password,$first_name,$last_name,$other_name,$contact_no,$gender_id,$marital_status_id,$date_of_birth,$usertypeid,$updatedby,$email_address,$gardian_name_1,$gardian_name_2,$subject_code_1,$subject_code_2,$subject_code_3,$subject_code_4,$subject_code_5,$subject_code_6,$subject_code_7,$subject_code_8,$class_code) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        
        $studentNo = SuperModel::get_student_no(3);
        
         $stm = SuperModel::get_active_terms();
         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
         $term_name = $row['TEMID'];
         
         $mid_term_naem  = $row['MIDTERMID'];
        
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user master tabble
            $query1 = "INSERT INTO `rms_db`.`usermaster` (`PublicID`, `NRC`, `Passport`, `UserName`, `Password`, `FirstName`, `LastName`, `OtherName`, `EmailAddress`, `ContactNo`, `GenderID`, `MaritalStatusID`, `DOB`, `UserTypeID`,`UpdatedBy`, `IsActive`) VALUES ('$studentNo', '$nrc','$passport','$username','$password','$first_name','$last_name','$other_name', '$email_address','$contact_no','$gender_id','$marital_status_id','$date_of_birth','$usertypeid','$updatedby', '1');"; 
            $stm = $conn->prepare($query1);
            $stm->execute();

            
             //Insets data into user master tabble
            $query1 = "INSERT INTO `rms_db`.`studentmaster` (`StudentNo`, `ParentMaleName`, `ParentFemaleName`, `UpdatedBy`, `IsActive`,`ClassMasterPublicID`) VALUES ('$studentNo', '$gardian_name_1', '$gardian_name_2', '$updatedby', '1','$class_code');"; 
            $stm = $conn->prepare($query1);
            $stm->execute();
            
            
            
             //Insets data into user master tabble
            $query3 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_1', YEAR(CURDATE()), '$term_name', '$updatedby');"; 
            $stm3 = $conn->prepare($query3);
            $stm3->execute();
            
            $query4 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_2', YEAR(CURDATE()), '$term_name', '$updatedby');"; 
            $stm4 = $conn->prepare($query4);
            $stm4->execute();
            
            
             //Term start 
            $query5 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_3', YEAR(CURDATE()), '$term_name', '$updatedby');"; 
            $stm5 = $conn->prepare($query5);
            $stm5->execute();
            
            
             $query6 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_4', YEAR(CURDATE()), '$term_name', '$updatedby');"; 
            $stm6 = $conn->prepare($query6);
            $stm6->execute();
            
            
            $query7 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_5', YEAR(CURDATE()), '$term_name', '$updatedby');"; 
            $stm7 = $conn->prepare($query7);
            $stm7->execute();
            
            
              $query8 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_6', YEAR(CURDATE()), '$term_name', '$updatedby');"; 
            $stm8 = $conn->prepare($query8);
            $stm8->execute();
            
            
            if ($subject_code_7 != "NULL" ){
             $query9 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_7', YEAR(CURDATE()), '$term_name', '$updatedby');"; 
            $stm9 = $conn->prepare($query9);
            $stm9->execute();
            }
            
            if ($subject_code_8 != "NULL" ){
            $query11 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_8', YEAR(CURDATE()), '$term_name', '$updatedby');"; 
            $stm11 = $conn->prepare($query11);
            $stm11->execute();
            }
            
            
            
            //Mid Term Start 
             $query1 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_1', YEAR(CURDATE()), '$mid_term_naem', '$updatedby');"; 
            $stm = $conn->prepare($query1);
            $stm->execute();
            
            
            $query1 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_2', YEAR(CURDATE()), '$mid_term_naem', '$updatedby');"; 
            $stm = $conn->prepare($query1);
            $stm->execute();
            
            
            $query1 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_3', YEAR(CURDATE()), '$mid_term_naem', '$updatedby');"; 
            $stm = $conn->prepare($query1);
            $stm->execute();
            
            $query1 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_4', YEAR(CURDATE()), '$mid_term_naem', '$updatedby');"; 
            $stm = $conn->prepare($query1);
            $stm->execute();
            
            $query1 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_5', YEAR(CURDATE()), '$mid_term_naem', '$updatedby');"; 
            $stm = $conn->prepare($query1);
            $stm->execute();
            
            
            $query1 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_6', YEAR(CURDATE()), '$mid_term_naem', '$updatedby');"; 
            $stm = $conn->prepare($query1);
            $stm->execute();
            
            if ( $subject_code_7 != "NULL" ){
            $query1 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_7', YEAR(CURDATE()), '$mid_term_naem', '$updatedby');"; 
            $stm = $conn->prepare($query1);
            $stm->execute();
            }
            
            if ($subject_code_8 != "NULL" ){
            
            $query1 = "INSERT INTO `rms_db`.`studentdetails` (`StudentNo`, `SubjectCode`, `Year`, `TermMaterID`, `UpdatedBy`) VALUES ('$studentNo', '$subject_code_8', YEAR(CURDATE()), '$mid_term_naem', '$updatedby');"; 
            $stm = $conn->prepare($query1);
            $stm->execute();
            }
            //End Mid Term 
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
          // echo $exc->getMessage();
            return FALSE;
        }
    }
    
     
     public static function get_one_topic_qestions($topic_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetQuestionByTopicID('$topic_id');";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
   
   
   public static function get_one_qestions($qestion_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetQestionByID('$qestion_id');";
                  
             $stm = $conn->query($query);
       $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row['Qestion'];
      
   }
    
     public static function get_active_terms() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetActiveTerms();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
    
    
     public static function get_all_subjectts() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAllSubjects();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   public static function get_all_classes() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAllClassesGrade();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
    public static function get_student_report_card($year,$student_no,$term_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetStudentReportCard('$year','$student_no','$term_id')";
        $stm = $conn->query($query);
     
            return $stm;
      
   }
   
   public static function get_student_details($student_no,$term_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetStudentDetails('$student_no','$term_id')";
        $stm = $conn->query($query);
       $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row;
      
   }
   
   
   
    
       public static function get_teacher_positions() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetTeachersPositions();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
      public static function get_teacher_departments() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetTeacherDepartment();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
    public static function get_terms() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetTems();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
    public static function get_all_terms() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAllTerms();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
    public static function get_teacher_taught_sbjects($public_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetTeacherTaughtSubjectByID('$public_id');";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
    public static function get_register_pupils() {
       //this function gets the name and the student numeber for lading a combo box 
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetRegisteredPupil();";
        $stm = $conn->query($query);
     
         
            return $stm;
      
   }
    public static function get_student_info() {
       //this function gets the name and the student numeber for lading a combo box 
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetStudentInfo();";
        $stm = $conn->query($query);
     
         
            return $stm;
      
   }
   
   
   public static function get_parent_child_info($paernt_contact) {
       //this function gets the name and the student numeber for lading a combo box 
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetChildDetilsByParentNo('$paernt_contact');";
        $stm = $conn->query($query);
     
       
            return $stm;
      
   }
   
   function get_districts_by_provinceid($provinceid) {
        //This function is used to load the districts whih a given province ID
         $Connection = new Connection();
        $conn = $Connection->connect();

        // this is the stored procidure from the datbaes that is loading the destrics after passing in an province ID 
        $query = "CALL GetDistrictByProvinceId(:province);";


     
        $stm = $conn->prepare($query);
        $stm->execute(array(':province' => $provinceid));

        if ($stm->rowCount() > 0) {

             //What the beow lines of code are doing is they are loading a districts and displying them in a dropdown using php

            echo "  <div class=''>  <div >    <select class='form-control' id='district_id' name='district_id' required='required' ><option value='' selected disabled=''>Select District</option>";
            while ( $row = $stm->fetch(PDO::FETCH_ASSOC)) {


                echo "<option value=" . $row['districtId'] . ">" . $row['name'] . "</option>";
                //echo "<option vlaue='21'>".$row['name']."</option>";name
            }

            echo"</select><br>";
        } else {

            echo "  <div > <select class='form-control' name='district_id' required='required'><option value=''  selected disabled='' >Select District</option> </select><br>  </div>";
        }
            
        
        
    }
    
    
    function get_topics_by_subject_id($subject_id) {
        $Connection = new Connection();
           $conn = $Connection->connect();
        $query = "CALL GetAllTopicsBySubjectID('$subject_id');";
        $stm = $conn->query($query);
     
         
            return $stm;
      
        
    }
    
    
    
     function get_subjects_by_department_id($depatemnt_code) {
        //This function is used to load the districts whih a given province ID
         $Connection = new Connection();
        $conn = $Connection->connect();

        // this is the stored procidure from the datbaes that is loading the destrics after passing in an province ID 
        $query = "CALL GetsSubjectsByDepartmentCode(:department_code);";


     
        $stm = $conn->prepare($query);
        $stm->execute(array(':department_code' => $depatemnt_code));

        if ($stm->rowCount() > 0) {

             //What the beow lines of code are doing is they are loading a districts and displying them in a dropdown using php

            echo "  <div class=''>  <div >    <select class='form-control' onchange='validate_couse_1_selection()' id='subject_id' name='subject_id' required='required' ><option value='' selected disabled=''>Select Subject 1</option>";
            while ( $row = $stm->fetch(PDO::FETCH_ASSOC)) {


                echo "<option value=" . $row['SujectCode'] . ">" . $row['SubjectName'] . "</option>";
                //echo "<option vlaue='21'>".$row['name']."</option>";name
            }

            echo"</select><br>";
        } else {

            echo "  <div > <select class='form-control' name='subject_id' required='required'><option value=''  selected disabled='' >Select Subject 1</option> </select><br>  </div>";
        }
            
        
        
    }
    
    
    
    function get_subjects_by_department_id2($depatemnt_code) {
        //This function is used to load the districts whih a given province ID
         $Connection = new Connection();
        $conn = $Connection->connect();

        // this is the stored procidure from the datbaes that is loading the destrics after passing in an province ID 
        $query = "CALL GetsSubjectsByDepartmentCode(:department_code);";


     
        $stm = $conn->prepare($query);
        $stm->execute(array(':department_code' => $depatemnt_code));

        if ($stm->rowCount() > 0) {

             //What the beow lines of code are doing is they are loading a districts and displying them in a dropdown using php

            echo "  <div class=''>  <div >    <select class='form-control' onchange='validate_couse_2_selection()' id='subject_id2' name='subject_id2' required='required' ><option value='' selected disabled=''>Select Subject 2</option>";
            while ( $row = $stm->fetch(PDO::FETCH_ASSOC)) {


                echo "<option value=" . $row['SujectCode'] . ">" . $row['SubjectName'] . "</option>";
                //echo "<option vlaue='21'>".$row['name']."</option>";name
            }

            echo"</select><br>";
        } else {

            echo "  <div > <select class='form-control' name='subject_id2' required='required'><option value=''  selected disabled='' >Select Subject 2</option> </select><br>  </div>";
        }
            
        
        
    }
    
    
    
    
    function get_subjects_by_department_id3($depatemnt_code) {
        //This function is used to load the districts whih a given province ID
         $Connection = new Connection();
        $conn = $Connection->connect();

        // this is the stored procidure from the datbaes that is loading the destrics after passing in an province ID 
        $query = "CALL GetsSubjectsByDepartmentCode(:department_code);";


     
        $stm = $conn->prepare($query);
        $stm->execute(array(':department_code' => $depatemnt_code));

        if ($stm->rowCount() > 0) {

             //What the beow lines of code are doing is they are loading a districts and displying them in a dropdown using php

            echo "  <div class=''>  <div >    <select class='form-control' onchange='validate_couse_3_selection()' id='subject_id3' name='subject_id3' ><option value='' selected disabled=''>Select Subject 3</option>";
            while ( $row = $stm->fetch(PDO::FETCH_ASSOC)) {


                echo "<option value=" . $row['SujectCode'] . ">" . $row['SubjectName'] . "</option>";
                //echo "<option vlaue='21'>".$row['name']."</option>";name
            }

            echo"</select><br>";
        } else {

            echo "  <div > <select class='form-control' name='subject_id3' ><option value=''  selected disabled='' >Select Subject 3</option> </select><br>  </div>";
        }
            
        
        
    }
    // END RMS 
    
    
     public static function get_parent_no($contact_number) {
      
        $Connection = new Connection();
        $conn = $Connection->connect();

        
        
        $query = "SELECT CONCAT ('+26',GetContactNo('$contact_number')) AS 'ContactNo'";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();

         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
            return $row['ContactNo'];
      
    }
    
      public static function get_sequence_id($sequence_number) {
      
        $Connection = new Connection();
        $conn = $Connection->connect();

        
        
        $query = "CALL GetSequence($sequence_number);";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();

         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
            return $row['SequnceNumber'];
      
    }
    
    
    public static function get_student_no($sequence_number) {
      
        $Connection = new Connection();
        $conn = $Connection->connect();

        
        
        $query = "CALL GetStudentNo($sequence_number);";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();

         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
            return $row['SequnceNumber'];
      
    }
    
     
    
   
           public static function get_provinces() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetProvinces();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
           
    
     
    }
    
       
         
   