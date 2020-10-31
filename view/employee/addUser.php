<?php
require_once '../../controller/super/SessionStart.php';
include '../../model/SuperModel.php';
include '../../db_connection/dbconfig.php';
$names = $_SESSION['rms_names'];

$get_position_stm = SuperModel:: get_user_types();

?>

<!doctype html>
<html lang="en">

<head>
  <title>Add User</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  
   <script src="../../js/Jnotify/jquery-1.12.4.min.js" type="text/javascript"></script>
        <link href="../../js/Jnotify/jnoty.min.css" rel="stylesheet" type="text/css"/>

</head>

<body class="dark-edition">
  <div class="wrapper ">
    <?php include './sidebar.php'; ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)"> IOT BASED FLOOD MONITORING AND ALERTING SYSTEM</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <span class="bmd-form-group"><div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div></span>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                <div class="ripple-container"></div></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">0</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                
                    <a class="dropdown-item" href="../../controller/super/Logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
		</div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <form onsubmit="event.preventDefault(); validatepassword();" id="teacher_details"  method="post" action="../../controller/super/ActionPerformed.php">
		  <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add User</h4>
                  <p class="card-category">Welcome To The IOT BASED FLOOD MONITORING AND ALERTING SYSTEM</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input required="" name="username" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input required="" id="password" name="password" type="password" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confierm Password</label>
                          <input required="" id="confirm_password"  type="password" class="form-control">
                        </div>
                      </div>
                    </div>
                   <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input required="" name="first_name" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input required="" name="last_name" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Other Name</label>
                          <input name="other_name" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                      
                      <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">NRC</label>
                          <input name="nrc" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Passport</label>
                          <input  name="passport" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact No.</label>
                          <input required="" name="contact_no" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                      
                      <div class="row">
                           <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input name="email_address" type="email" class="form-control"><br>
                        </div>
                      </div>
                          <div class="col-md-4">
                        <div class="form-group">
                          <div class="form-select-list">
                                        <select required="" class="form-control custom-select-value" name="gender_id">
                                            <option value="" disabled="disabled" selected="selected">Select Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                
                                       </select>
                                    </div>
                        </div>
                      </div>
                          
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date Of Birth</label>
                          <input required="" type="date"  name="dob" class="form-control" />
                        </div>
                      </div>
                      
                      
                    </div>
                      
                      <div class="row">
                          <div class="col-md-4">
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
                          
                          
                      <div class="col-md-4">
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
                      
                      
                      
                    
                    <label>Address Details</label>
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          
                                    <div class="form-select-list">
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
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div id="districts_by_provincId" class="form-select-list">
                                    
                                </div>
                                      
                        </div>
                      </div>
                    </div>
                   <div class="row">
                       <input name="btn_add_teacher" value="btn_add_teacher" type="hidden"/>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Primary Address</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Enter Primary Address</label>
                            <textarea required="" name="parmary_address" class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>Secondary Address</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Enter Secondary Address</label>
                            <textarea  name="secondary_address" class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    <button type="submit" name="btn_add_teacher" value="btn_add_teacher" class="btn btn-primary pull-right">Add User</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
            </form>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href=#">
                  IOT BASED FLOOD MONITORING AND ALERTING SYSTEM
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script> R.M.S 
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
 
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
  
   <script src="../../js/RelaodDistrict.js" type="text/javascript"></script>
<!--   <script src="../../js/RelaodSubjects.js" type="text/javascript"></script>
   -->
 
  <script src="./assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
    <script src="../../js/Jnotify/jnoty.min.js" type="text/javascript"></script>

  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
    
    
    
    
//    
//    function validate_couse_1_selection(){
//            var couse_1 = document.getElementById("subject_id").value;
//              var couse_2 = document.getElementById("subject_id2").value;
//         var couse_3 = document.getElementById("subject_id3").value;
//       
//        
//            
//            if ((couse_2==null || couse_2==""))
//			{
//			couse_2 = -1;
//			}
//                        
//                         if ((couse_3==null || couse_3==""))
//			{
//			couse_3 = -1;
//			}
//                        
//                        
//                     
//      
//            var i = 0;
//            var items = [couse_2,couse_3];
//            
//            for (i;i<2;i++){
//                if(couse_1 == items[i]){
//                    var couse_1 = document.getElementById("subject_id").value="";
//                          $.jnoty('You can not select same subject twice', {
//                                                        sticky: false,
//                                                        header: 'Notification',
//                                                        theme: 'jnoty-info',
//
//                                                    });
//                    }
//                }
//            
//        }
//        
//        
//        function validate_couse_2_selection(){
//            var couse_1 = document.getElementById("subject_id").value;
//               var couse_2 = document.getElementById("subject_id2").value;
//         var couse_3 = document.getElementById("subject_id3").value;
//        
//        
//            
//            if ((couse_1==null || couse_1==""))
//			{
//			couse_1 = -1;
//			}
//                        
//                         if ((couse_3==null || couse_3==""))
//			{
//			couse_3 = -1;
//			}
//                        
//                        
//                     
//      
//            var i = 0;
//            var items = [couse_1,couse_3];
//            
//            for (i;i<2;i++){
//                if(couse_2 == items[i]){
//                     document.getElementById("subject_id2").value="";
//                          $.jnoty('You can not select same subject twice', {
//                                                        sticky: false,
//                                                        header: 'Notification',
//                                                        theme: 'jnoty-info',
//
//                                                    });
//                    }
//                }
//            
//        }
//        
        
        
//       function validate_couse_3_selection(){
//            var couse_1 = document.getElementById("subject_id").value;
//             
//         var couse_2 = document.getElementById("subject_id2").value;
//         var couse_3 = document.getElementById("subject_id3").value;
//        
//            
//            if ((couse_1==null || couse_1==""))
//			{
//			couse_1 = -1;
//			}
//                        
//                         if ((couse_2==null || couse_2==""))
//			{
//			couse_2 = -1;
//			}
//                        
//                        
//                     
//      
//            var i = 0;
//            var items = [couse_1,couse_2];
//            
//            for (i;i<2;i++){
//                if(couse_3 == items[i]){
//                    document.getElementById("subject_id3").value="";
//                          $.jnoty('You can not select same subject twice', {
//                                                        sticky: false,
//                                                        header: 'Notification',
//                                                        theme: 'jnoty-info',
//
//                                                    });
//                    }
//                }
//            
//        }
        
        
        function validatepassword(){
        
         var password = document.getElementById("password").value;
         var confirm_password = document.getElementById("confirm_password").value;
         var form_teacher_details = document.getElementById("teacher_details");
         
         
       
			
			if ((password==null || password==""))
			{
			
                        $.jnoty('Please enter your password !!', {
                                                        sticky: false,
                                                        header: 'Notification',
                                                        theme: 'jnoty-info',

                                                    });return false;
			}
			if((confirm_password==null || confirm_password==""))
                            {
			
                            $.jnoty('Please enter confirm password!!', {
                                                        sticky: false,
                                                        header: 'Notification',
                                                        theme: 'jnoty-info',

                                                    });return false;
			}
                        if((confirm_password!=password ))
                            {
			 $.jnoty('Passwords do not match', {
                                                        sticky: false,
                                                        header: 'Notification',
                                                        theme: 'jnoty-info',

                                                    });return false;
			}
			
			
			else
			form_teacher_details.submit();
                    
    } 
  </script>
</body>

</html>