<?php

require '../../db_connection/dbconfig.php'; 
        require '../../model/SuperModel.php';

$customerID  = $_POST['customerID'];
$invoice_details = SuperModel::get_cutomer_invoice_details($customerID);

$result = SuperModel::get_cutomer_invoice_bills($customerID);

echo ' <div class= "row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        From
                                        <address>
                                            <strong>IOT Water System ,</strong><br>The Copperbelt University <br>Jambo Drive, Riverside <br>Phone: (123) 290804<br>Email: pro@cbu.ac.zm
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        To
                                        <address>
                                            <strong>'.$invoice_details['CutomerName'].'</strong><br>'.$invoice_details['PrimaryAddress'].'<br>Phone: (+260) 988564712<br>'.$invoice_details['Location'].'
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <b>Invoice #'.$invoice_details['InvoiceNo'].'</b><br>
                                        <br>
                                        <b>Cutomer ID:</b> '.$invoice_details['CutomerID'].'<br>
                                        <b>Payment Due:</b> '.$invoice_details['Date'].'<br>
                                        <b>Account:</b> 968-34567
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Qty</th>
                                                  
                                                 
                                                    <th>Date</th>
                                                      <th>Discription</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                       '; while ($row = $result ->fetch(PDO::FETCH_ASSOC)) {
                                                echo '<tr>
                                                    <td>1</td>
                                                    <td>'.$row['Date'].'</td>
                                                   
                                                    <td>'.$row['Rate'].'</td>
                                                    <td>'.$row['Amount'].'</td>
                                                </tr>';
                                                               }    
                                                
                                                
                                         echo '  </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <p class="lead">Payment Methods:</p>
                                        <img src="../../img/credit/visa.png" alt="Visa">
                                        <img src="../../img/credit/payment.jpg" alt="airtel">
                                        <img src="../../img/credit/mastercard.png" alt="Mastercard">
                                        
                                        <img src="../../img/credit/paypal2.png" alt="Paypal">
                                        
                                        <div class="alert alert-secondary mt-20">
                                          Fast efficent payment mode
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <p class="lead">Amount Due&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    '.$invoice_details['Date'].'</p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td>'.$invoice_details['TotalAmount'].'</td>
                                                </tr>
                                               
                                               
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>'.$invoice_details['Payableamount'].'</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-print">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                                    </div>
                                </div>';

