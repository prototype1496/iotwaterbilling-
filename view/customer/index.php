<?php 
require '../../controller/super/SessionStart.php';
require '../../db_connection/dbconfig.php';
require '../../model/SuperModel.php';
$customer_id = $_SESSION['rms_public_id'];
$get_cutomer_stm = SuperModel:: get_cutomer_invoice_bills($customer_id);


$get_cutomer_stm2 = SuperModel:: get_cutomer_invoice_paid_bills($customer_id);


$get_cutomer_stm_bill2 = SuperModel:: get_cutomer_invoice_paiddetails($customer_id);

$get_cutomer_stm_bill = SuperModel:: get_cutomer_invoice_details($customer_id);
$get_dashboared_stm = SuperModel:: get_dashboared_data();

?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dashboared</title>
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
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="../../plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="../../plugins/c3/c3.min.css">
        <link rel="stylesheet" href="../../plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../../plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../../dist/css/theme.min.css">
        <script src="../../src/js/vendor/modernizr-2.8.3.min.js"></script>
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
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Date</h6>
                                                 <h2><?php echo date('d-m-y'); ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-calendar"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">.</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Balance</h6>
                                                <h2><?php echo $amount = $get_cutomer_stm_bill['Payableamount'];?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-credit-card"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">.</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%;"></div>
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
<!--                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-lg-8 col-md-12">
                                                <h3 class="card-title">Visitors By Countries</h3>
                                                <div id="visitfromworld" style="width:100%; height:350px"></div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="row mb-15">
                                                    <div class="col-9">India</div>
                                                    <div class="col-3 text-right">28%</div>
                                                    <div class="col-12">
                                                        <div class="progress progress-sm mt-5">
                                                            <div class="progress-bar bg-green" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-15">
                                                    <div class="col-9"> UK</div>
                                                    <div class="col-3 text-right">21%</div>
                                                    <div class="col-12">
                                                        <div class="progress progress-sm mt-5">
                                                            <div class="progress-bar bg-aqua" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-15">
                                                    <div class="col-9"> USA</div>
                                                    <div class="col-3 text-right">18%</div>
                                                    <div class="col-12">
                                                        <div class="progress progress-sm mt-5">
                                                            <div class="progress-bar bg-purple" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-9">China</div>
                                                    <div class="col-3 text-right">12%</div>
                                                    <div class="col-12">
                                                        <div class="progress progress-sm mt-5">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="min-height: 422px;">
                                    <div class="card-header"><h3>Donut chart</h3></div>
                                    <div class="card-body">
                                        <div id="c3-donut-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                 
                 
                 <div class="row">
                            <div class="col-lg-3 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center"> 
                                            <img src="../../img/user-1.jpg" class="rounded-circle" width="150" />
                                            <h4 class="card-title mt-10"><?php echo $get_cutomer_stm_bill['CutomerName'];?></h4>
                                            <p class="card-subtitle">IOT Water Customer</p>
                                            <div class="row text-center justify-content-md-center">
                                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">0</font></a></div>
                                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">0</font></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-0"> 
                                    <div class="card-body"> 
                                        
                                        <small class="text-muted d-block pt-10">Address</small>
                                        <h6><?php echo $get_cutomer_stm_bill['PrimaryAddress'];?><br><?php echo $get_cutomer_stm_bill['Location'];?></h6>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-7">
                                <div class="card">
                                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Current Bill</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Payment History</a>
                                        </li>
                                     
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                            <div class="card-body">
                                                <div >
                                               
                                                    
                                                    
                                                    
                                                    <div class="card">
                            <div class="card-header row">
                                <div class="col col-sm-3">
                                    <div class="card-options d-inline-block">
                                        <a href="#"><i class="ik ik-inbox"></i></a>
                                        <a href="#"><i class="ik ik-plus"></i></a>
                                        <a href="#"><i class="ik ik-rotate-cw"></i></a>
                                        <div class="dropdown d-inline-block">
                                            <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">More Action</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-6">
                                    <div class="card-search with-adv-search dropdown">
                                        <form action="">
                                            <input type="text" class="form-control global_filter" id="global_filter" placeholder="Search.." required>
                                            <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                            <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            
                                        </form>
                                    </div>
                                </div>
                             
                            </div>
                            <div class="card-body">
                                <table id="advanced_table" class="table">
                                    <thead>
                                        <tr>
                                           
                                           
                                             <th>Reading</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                          <th>.</th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                           <?php
                                                            while ($row = $get_cutomer_stm ->fetch(PDO::FETCH_ASSOC)) {
                                                               // print_r($row);
                                                            ?> 
            
                                        <tr>
                                            
                                           
                                            <td><?php echo $row['waterreading']; ?></td>
                                            <td>K <?php echo $row['UnitRate']; ?></td>
                                            <td><?php echo $row['Amount']; ?></td>
                                            <td><?php echo $row['Date']; ?></td>
                                            
                                             <td>.</td>
                                          
                                        </tr>
                                         <?php } ?>
                                          <br> <br><tr>
                                            
                                           
                                           <td>.</td>
                                            <td>Sub Total:<?php echo $get_cutomer_stm_bill['TotalAmount']; ?></td>
                                            <td>Surcharge :<?php echo $get_cutomer_stm_bill['Tax']; ?></td>
                                            <td>Payable Amount :<?php echo $amount; ?></td>
                                             
                                          
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                                                    
                                                    
                                                    
                                                
                                                
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="card-body">
                                <table id="advanced_table" class="table">
                                    <thead>
                                        <tr>
                                           
                                           
                                             <th>Reading</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                          <th>.</th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                           <?php
                                                            while ($row2 = $get_cutomer_stm2 ->fetch(PDO::FETCH_ASSOC)) {
                                                               // print_r($row);
                                                            ?> 
            
                                        <tr>
                                            
                                           
                                            <td><?php echo $row2['waterreading']; ?></td>
                                            <td>K <?php echo $row2['UnitRate']; ?></td>
                                            <td><?php echo $row2['Amount']; ?></td>
                                            <td><?php echo $row2['Date']; ?></td>
                                            
                                             <td>.</td>
                                          
                                        </tr>
                                         <?php } ?>
                                          <br> <br><tr>
                                            
                                           
                                           <td>.</td>
                                            <td>Sub Total:<?php echo $get_cutomer_stm_bill2['TotalAmount']; ?></td>
                                            <td>Surcharge :<?php echo $get_cutomer_stm_bill2['Tax']; ?></td>
                                            <td>Paid Amount :<?php echo $get_cutomer_stm_bill2['Payableamount']; ?></td>
                                             
                                          
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                       
<!--                        <div class="card">
                            <div class="card-header row">
                                <div class="col col-sm-3">
                                    <div class="card-options d-inline-block">
                                        <a href="#"><i class="ik ik-inbox"></i></a>
                                        <a href="#"><i class="ik ik-plus"></i></a>
                                        <a href="#"><i class="ik ik-rotate-cw"></i></a>
                                        <div class="dropdown d-inline-block">
                                            <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">More Action</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-6">
                                    <div class="card-search with-adv-search dropdown">
                                        <form action="">
                                            <input type="text" class="form-control global_filter" id="global_filter" placeholder="Search.." required>
                                            <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                            <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Names" data-column="3">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control column_filter" id="col2_filter" placeholder="ID" data-column="2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control column_filter" id="col4_filter" placeholder="Contact" data-column="4">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <button class="btn btn-theme">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col col-sm-3">
                                    <div class="card-options text-right">
                                        <span class="mr-5" id="top">1 - 50 of 2,500</span>
                                        <a href="#"><i class="ik ik-chevron-left"></i></a>
                                        <a href="#"><i class="ik ik-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="advanced_table" class="table">
                                    <thead>
                                        <tr>
                                            <th class="nosort" width="10">
                                                <label class="custom-control custom-checkbox m-0">
                                                    <input type="checkbox" class="custom-control-input" id="selectall" name="" value="option2" >
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </th>
                                            <th class="nosort">Profil Pic</th>
                                             <th>Customer ID</th>
                                            <th>Names</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th>Owed Amount</th>
                                            <th>Connection Statue</th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                           <?php
                                                            while ($row = $get_cutomer_stm ->fetch(PDO::FETCH_ASSOC)) {
                                                               // print_r($row);
                                                            ?> 
            
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input select_all_child cheked" id="" name="" value="<?php echo $row['PublicID'];  ?>">
                                                    
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><img src="../../img/user-1.jpg" class="table-user-thumb" alt=""></td>
                                            <td><?php echo $row['PublicID']; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['ContactNo']; ?></td>
                                            <td><?php echo $row['StatusCatigory']; ?></td>
                                              <td><?php echo $row['OwedAmount']; ?></td>
                                            <td><?php echo $row['Statue']; ?></td>
                                          
                                        </tr>
                                         <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>-->


                             <div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="fullwindowModalLabel">Cutomer Bill</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="card">
                                        <div class="card-header"><h3 class="d-block w-100">IOT Water Bill<small class="float-right">Date: <?php echo date("Y-m-d") ?></small></h3></div>
                                        <div id="invoice" class="card-body">
                                            
                                        </div>
                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       
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
        
        
        

        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="quick-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <div class="input-wrap">
                                        <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                        <i class="ik ik-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="container">
                            <div class="apps-wrap">
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="app-item dropdown">
                                    <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-command"></i><span>Ui</span></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="../../plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="../../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="../../plugins/screenfull/dist/screenfull.js"></script>
        <script src="../../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../../plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="../../plugins/jvectormap/jquery-jvectormap.min.js"></script>
        
        
        
        <script src="../../plugins/jvectormap/jquery-jvectormap.min.js"></script>
        
        
        
        
        <script src="../../plugins/moment/moment.js"></script>
        <script src="../../plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="../../plugins/d3/dist/d3.min.js"></script>
        <script src="../../plugins/c3/c3.min.js"></script>
        <script src="../../js/tables.js"></script>
        <script src="../../js/widgets.js"></script>
        <script src="../../js/charts.js"></script>
        <script src="../../dist/js/theme.min.js"></script>
        
        <script>
   function getInvoiceData (customerID){
               $(document).ready(function(){  
               
                $('#invoice').load('../../controller/invoice/GetInvoiceData.php',{
                    customerID: customerID
                    
                });
    });
         } 
         $(document).ready(
            function(){
                
                $('.cheked').click(function(){
                    
                   var txt = "";
                   var count =0 ;
                   
                  $('.cheked:checked').each(function(){
                      
                     count++;
                        if(count === 1){txt = $(this).val();}
                  });
                   
                  if(count > 1){
                  
//                      alert('cannot select mor than tow elements');
                      return false;
                  }else if(count == 1){
                        
                      $('#fullwindowModal').modal('show');
                      getInvoiceData (txt);
                    // getParentData(txt);
                   
                  }
                });
            } 
                    
       
            );
        </script>
       
    </body>
</html>
