<?php
require_once '../../controller/super/SessionStart.php';
include '../../model/SuperModel.php';
include '../../db_connection/dbconfig.php';
$names = $_SESSION['rms_names'];

$get_position_stm = SuperModel:: get_user_types();

?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin Dashboared</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="../../plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../../plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="../../plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="../../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="../../plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="../../plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="../../plugins/c3/c3.min.css">
        <link rel="stylesheet" href="../../plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../../plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../../dist/css/theme.min.css">  
        <script src="../../src/js/vendor/modernizr-2.8.3.min.js"></script>
        
        <link rel="stylesheet" href="../../plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
       
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <!-- Nav Bar Start-->
                <?php require './navbar.php';?>
                 <!-- Nav Bar END-->
            </header>

            <div class="page-wrap">
<!--               Side Navigation Bar -->
               <?php require './sidebar.php';?>
<!--               Side Navigation Bar END -->

                <div class="main-content">
                    <div class="container-fluid">
                       
                        <div class="row">
                          
        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>Add User </h3></div>
                                    <div class="card-body">
                                        <form onsubmit="event.preventDefault(); validatepassword();" id="teacher_details"  method="post" action="../../controller/super/ActionPerformed.php" class="forms-sample">
                                            <div class="row">
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="username">Usernmae</label>
                                                        <input type="text" required="" class="form-control" name="username" id="username" placeholder="Username"/>
                                                    </div>  
                                                 </div>
                                                      <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input required="" type="password" name="password" class="form-control" id="password" placeholder="Password"/>
                                                    </div> 
                                                      </div>
                                                           <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="confirm_password">Confirm Password</label>
                                                        <input required="" type="password" class="form-control" id="confirm_password" placeholder="Confirm Paddword"/>
                                                    </div>  
                                            </div>
                                                          </div>
                                            <div class="row">
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input required=""  type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name"/>
                                                    </div>  
                                                 </div>
                                                      <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input required=""  type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name"/>
                                                    </div> 
                                                      </div>
                                                           <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="other_name">Other Name</label>
                                                        <input type="text" name="other_name" class="form-control" id="other_name" placeholder="Other Name"/>
                                                    </div>  
                                            </div>
                                                          </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="nrc">NRC</label>
                                                         <input  name="nrc" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="passport">Passport</label>
                                                         <input  name="passport" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="contact_no" class="bmd-label-floating">Contact No.</label>
                                                        <input required="" id="contact_no" name="contact_no" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                 
                                            </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email_address">Email address</label>
                                                        <input type="email"  name="email_address" class="form-control" id="email_address" placeholder="Email">
                                                         
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="gender_id">Gender</label>
                                                        <select class="form-control" id="gender_id" name="gender_id">
                                                              <option value="" disabled="disabled" selected="selected">Select Gender</option>
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="dob">Date Of Birth</label>
                                                        <input required="" type="date" class="form-control"  name="dob" id="dob" />
                                                    </div>
                                                </div>
                                            </div>
                                  
                                            
<!--                                            <div class="form-group">
                                                <label>File upload</label>
                                                <input type="file" name="img[]" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                    <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>-->
                                            
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                          
                          <div class="form-select-list">
                                        <select  required="" class="form-control custom-select-value" name="marital_status_id">
                                            <option value="" disabled="disabled" selected="selected">Select Marital Status</option>
                                            <option value="1">Married</option>
                                                <option value="2">Widow</option>
                                                <option value="3">Devorced</option>
                                                <option value="4">Single</option>
                                       </select>
                                    </div>
                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                             <div class="form-select-list">
                                     <select  required="" class="form-control custom-select-value" name="position_id">
                                         <option value="" disabled="disabled" selected="selected">User Type</option>
                                                                <?php
                                                            while ($row = $get_position_stm ->fetch(PDO::FETCH_ASSOC)) {
                                                               // print_r($row);
                                                            ?> 

                                                    <option value = "<?php echo $row['UserTypeMasterID']; ?>"> <?php echo $row['UserType']; ?> </option>


                                                            <?php } ?>
                                       </select>
                                           </div>
                        </div>
                                                </div>
                                                    
                                            </div>
                                            
                                            <div class="row">
                                                 <div class="col-md-6">
                                               <div class="form-group">
                                                        <label for="selected_province_id">Province</label>
                                                       <select required="" name="" id="selected_province_id" class="form-control " onchange="get_districts()">
                                                            <option value="" disabled="disabled" selected="selected" >-- Please select Province --</option>
                                                            <option value="1">Central</option>
                                                            <option value="2">Copperbelt</option>
                                                            <option value="3">Eastern</option>
                                                            <option value="4">Luapula</option>
                                                            <option value="5">Lusaka</option>
                                                             <option value="6">Muchinga</option>
                                                              <option value="7">Northern</option>
                                                               <option value="8">North Western</option>
                                                                <option value="9">Southern</option>
                                                                 <option value="10">Western</option>
                                                           </select>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="districts_by_provincId">District</label>
                                                      
                                                         <div id="districts_by_provincId" class="form-select-list">
                                    
                                                                         </div>
                                                    </div>
                                                 </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="parmary_address">Primary Address</label>
                                                        <textarea id="parmary_address" required="" name="parmary_address" class="form-control" rows="5"></textarea>
                                                    </div>
                                                 </div>
                                                
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="secondary_address">Secondary Address</label>
                                                        <textarea id="secondary_address" name="secondary_address" class="form-control" rows="5"></textarea>
                                                    </div>
                                                 </div>
                                                
                                                
                                                </div>
                                            
                                            
                        <button type="submit"  name="btn_add_iotbilling" value="btn_add_iotbilling" class="btn btn-primary mr-2">Submit Data</button>
                        <input name="btn_add_iotbilling" type="hidden" value="btn_add_iotbilling"  />              
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>

                 
                 
                 
                       
                     
                    </div>
                </div>

               

                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2020 IOT Billing All Rights Reserved.</span>
                    </div>
                </footer>
                
            </div>
        </div>
        
        
        

      
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        
         <script src="../../js/RelaodDistrict.js" type="text/javascript"></script>
         
        <script src="../../plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="../../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="../../plugins/screenfull/dist/screenfull.js"></script>
        <script src="../../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../../plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="../../plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="../../js/form-components.js"></script>
        <script src="../../plugins/moment/moment.js"></script>
        <script src="../../plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="../../plugins/d3/dist/d3.min.js"></script>
        <script src="../../plugins/c3/c3.min.js"></script>
        <script src="../../js/tables.js"></script>
        <script src="../../js/widgets.js"></script>
        <script src="../../js/charts.js"></script>
        <script src="../../dist/js/theme.min.js"></script>
        
        
        <script src="../../plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
         
        <script src="../../js/alerts.js"></script>
        
       <script>
           
        function validatepassword(){
        
         var password = document.getElementById("password").value;
         var confirm_password = document.getElementById("confirm_password").value;
         var form_teacher_details = document.getElementById("teacher_details");
         
         
       
			
			if ((password==null || password==""))
			{
			showInfoToast('Please enter your password !!');return false;
			}
			if((confirm_password==null || confirm_password==""))
                            {
		
                            showInfoToast('Please enter confirm password!!');return false;
			}
                        if((confirm_password!=password ))
                            {
			 showInfoToast('Passwords do not match');return false;
			}
			
			
			else
			form_teacher_details.submit();
                    
    } 
  </script>
        
       
    </body>
</html>
