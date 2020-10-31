<?php

require '../../db_connection/dbconfig.php'; 
        require '../../model/SuperModel.php';

$customerID  = $_POST['customerID'];

$result = SuperModel::get_cutomer_readings($customerID);

echo ' <div class= "row invoice-info">
                                 
                                    
                                    
                                </div>

                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                   
                                                  
                                                 
                                                    <th>Date</th>
                                                      <th>Reading</th>
                                                    <th>Bill Satatus</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                       '; while ($row = $result ->fetch(PDO::FETCH_ASSOC)) {
                                                echo '<tr>
                                                    
                                                    <td>'.$row['Date'].'</td>
                                                   
                                                    <td>'.$row['unites'].'</td>
                                                    <td>'.$row['Statue'].'</td>
                                                </tr>';
                                                               }    
                                                
                                                
                                         echo '  </tbody>
                                        </table>
                                    </div>
                                </div>

                                
                                    
                                    </div>
                                </div>
                            
                                </div>';

