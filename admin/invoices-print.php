<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
   
        <h2 class="mb-0"style="color:orangered;">Print Invoice
         <a href="orders.php" class="btn btn-info float-end"style="color:white;"><i class="fa fa-angle-double-left" aria-hidden="true"></i><b> Back</b></a>

</h2>


    </div>
    <div class="card-body">
       <div id ="myBillingArea">
        <?php
        if(isset($_GET['track']))
        {

           $trackingNo = validate($_GET['track']) ;
           if($trackingNo == ''){
            ?>
            <div class="text-center py-1 ">
                <h3 class="fw-bold">Please Provide Tracking Number!</h3>
                <p class="fw-bold">Please Enter a  Tracking Number And Try Refreshing.</p>
                <div>
                <a href="orders.php" class=" btn  mt-4 w-25"style="background:orangered;color:white;font-weight:bold;">Go Back To Orders</a>
                </div>
            </div>
            <?php
       
           }
           $orderQuery = "SELECT o.*, c.* FROM orders o, customers c
            WHERE c.id = o.customer_id AND tracking_no='$trackingNo' LIMIT 1";
            $orderQueryRes = mysqli_query($conn, $orderQuery);
            if(!$orderQueryRes){
                echo "<h5> Something Went Wrong!</h5>";
                return false;
            }
            if(mysqli_num_rows($orderQueryRes) > 0)
            {
                $orderDataRow = mysqli_fetch_assoc($orderQueryRes);
                //print_r($orderDataRow);
                ?>
                
                 <table class="table table-bordered table-striped"style="width:100%;margin-bottom:20px;">
                               <tbody>
                                <tr >
                                <td  style="text-align:center;" colspan="1">
                                <h4 align="start" style="font-size:23px; line-height:30px; margin:2px; padding:0;margin-top:0.5rem;"><img src="assets/img/sultan1.png" width="180px"></h4>
                                <p style="font-size:16px; line-height:24px; margin:2px; padding:0;"></p>
                                 </td>
                                 <td style="text-align:center;" colspan="1">
                                <h4 style="font-size:40px; line-height:30px; margin:2px; padding:0;margin-top:1.5rem;color:orangered;">SULTAN HOLDINGS & CO.</h4>
                                <p style="font-size:25px; line-height:24px; margin:2px; padding:0;color:gray">Quality and Standard</p>
                                <p style="font-size:16px; line-height:24px; margin:2px; padding:0;"></p>
                                 </td>
                                 <td style="text-align:center;" colspan="1">
                                <h4 align="end" style="font-size:40px; line-height:30px; margin:2px; padding:0;margin-top:1.5rem;color:gray;">Invoice</h4>
                                 </td>
                                
                                </tr>
                                <tr>
                                 <td >
                                <h5 style="font-size:20px; line-height:30px; margin:0px; padding:0;color:gray;">Customer Details</h5>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> Company:<?= $orderDataRow['company'] ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> Name:<?= $orderDataRow['name'] ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> Phone no:<?= $orderDataRow['phone'] ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> Email:<?= $orderDataRow['email'] ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;color:red;"> PIN:<?= $orderDataRow['pin'] ?></p>
                                </td>
                                <td align="center">
                                <h5 style="font-size:20px; line-height:30px; margin:0px; padding:0;color:gray;">Company Details</h5>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> Address:Mombasa/Old-town/Nkurumah Street</p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> Phone No:0791828395/0771559722.</p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> Email:Sultanholdingscompany@gmail.com</p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> P.O BOX:425-80301</p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;color:red;"> Pin:</p>
                                </td>
                               
                                <td align="end">
                                <h5 style="font-size:20px; line-height:30px; margin:0px; padding:0;color:gray;">Invoice Details</h5>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;">Tracking no:<?= $orderDataRow['tracking_no']; ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;">Invoice no:<?= $orderDataRow['invoice_no']; ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;">Invoice Date:<?= date('d-M-Y'); ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;">Terms:Cash/M-pesa</p>
                                
                            </td>
                                </tr>
                                 </tbody>
                                </table>
                <?php
            }
            else
            {
                echo "<h5> No Data found!</h5>";
                return false;   
            }
            $orderItemQuery = "SELECT oi.quantity as orderItemQuantity, oi.price as orderItemPrice, o.*, oi.*, p.*
            FROM orders o, order_items oi, products p
            WHERE oi.order_id=o.id AND p.id=oi.product_id AND o.tracking_no='$trackingNo'";

            $orderItemQueryRes = mysqli_query($conn, $orderItemQuery);
            if($orderItemQueryRes)
            {
                if(mysqli_num_rows($orderItemQueryRes) > 0)
                {
                    ?>
                         <div class="table-responsive mb-3">
                         

                        <table class="table table-bordered table-striped" style="width:100%;"cellpadding="5">
                        <thead>
                            <tr>
                                <th align="start" style="border-bottom:1px solid #ccc;"width="5%">Id</th>
                                <th align="start" style="border-bottom:1px solid #ccc;">Description</th>
                                <th align="start" style="border-bottom:1px solid #ccc;"width="10%">Qty/PC</th>
                                <th align="start" style="border-bottom:1px solid #ccc;"width="10%">Ctn</th>
                                <th align="start" style="border-bottom:1px solid #ccc;"width="10%">Disc%</th>
                                <th align="start" style="border-bottom:1px solid #ccc;"width="10%">Price (Excl VAT)</th>
                                <th align="start" style="border-bottom:1px solid #ccc;"width="10%">VAT 16%</th>
                                <th align="start" style="border-bottom:1px solid #ccc;"width="10%">price (Incl VAT)</th>
                                <th align="start" style="border-bottom:1px solid #ccc;"width="15%">Amount</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            $i = 1;
                           
                            foreach($orderItemQueryRes as $key => $row):
                               
                            ?>
                            <tr>
                                <td style="border-bottom:1px;solid #ccc"><?= $i++; ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= $row['name']; ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= $row['orderItemQuantity']; ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= $row['cartons']; ?></td>
                                <td style="border-bottom:1px;solid #ccc">0%</td>
                                <td style="border-bottom:1px;solid #ccc"><?= number_format($row['orderItemPrice']-($row['orderItemPrice']*16)/100,2) ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= number_format(($row['orderItemPrice']*16)/100,2) ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= number_format($row['orderItemPrice'],2) ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= number_format($row['orderItemPrice'] * $row['orderItemQuantity'], 2) ?></td>
                            </tr>
                            
                            <?php endforeach; ?>
                            <hr/>
                            <tr>
                                <td colspan="8" align="end" style="font-weight:bold;color:#405D72;"> Sub-Total :</td>
                                <td colspan="1" style="font-weight:bold;background:;color:#405D72;border:solid;">Ksh: <?= number_format(($row['total_amount'])-($row['total_amount']*16)/100, 2); ?></td>
                            </tr>
                            <tr>
                                <td colspan="8" align="end" style="font-weight:bold;color:#405D72;">VAT 16% :</td>
                                <td colspan="1" style="font-weight:bold;background:;color:#405D72;border:solid;">Ksh: <?= number_format(($row['total_amount']*16)/100, 2); ?></td>
                            </tr>
                            <tr>
                                <td colspan="8" align="end" style="font-weight:bold;;color:#405D72;">Total Amount Due :</td>
                                <td colspan="1" style="font-weight:bold;background:;color:#405D72;border:solid;">Ksh: <?= number_format($row['total_amount'], 2); ?></td>
                            </tr>
                            <tr >
                                <td style="border:solid;"colspan="3"style="color:black;">Payment Mode:<?=$row['payment_mode'];?></td>
                                </tr>
                                <tr>
                                
                                <td style="border:solid;"colspan="3"style="color:black;">You were served by: <?= $_SESSION['loggedInUser']['name']; ?></td>
                                <td style="border:solid;"colspan="3"style="color:black;">Sales Rep: <?= $row['sales_rep']; ?></td>
                                <td style="border:solid;"colspan="6"style="color:black;">Invoice Due Date: <?= date('d-M-Y'); ?> </td>


                            </tr>
                        </tbody>
                       
                        </table>
                      
                               
                       <h6><U>NOTE:</U></h6>
                                <p>All products listed above are properties of Sultan holdings & co until they are fully paid off by the customer in full.
                                Late payments of this invoice shall attract a late  penalty fee of 5% of the "total amount due" indicated in this Invoice.Make sure the products you recieve are in good condition
                                and of the standard you required before signing below.Once You sign this invoice the goods will not be accepted back to our stores.</p>
                                <p>Invoice Prepared By:...............................................                       Customer's signature:..............................................</p>
                        
                                
                    </div>
                    
                    <?php

                }
                else
                {
                    echo "<h5> No Data Found!</h5>";
                    return false;  
                }
                

            }
            else
            {
                echo "<h5> Something Went Wrong!</h5>";
                return false;  
            }

        }
        else
        {
            ?>
                <div class="text-center py-1 ">
                    <h3 class="fw-bold">No Tracking Number Found!</h3>
                    <p class="fw-bold">Please Enter a  Tracking Number And Try Refreshing.</p>
                    <div>
                    <a href="orders.php" class=" btn  mt-4 w-25"style="background:orangered;color:white;font-weight:bold;">Go Back To Orders</a>
                    </div>
                </div>
            <?php
        }

        ?>
        </div>
        <div class="mt-4 text-end  ">
            <btn style="color:white;" class="btn btn-secondary px-4 mx-1"onclick="printMyBillingArea('<?= $orderDataRow['invoice_no']; ?>')"><i style="color:white;" class="fa fa-print" aria-hidden="true"></i><b> Print</b></btn>
            <btn style="color:white;" class="btn btn-primary px-4 mx-1"onclick="downloadPDF('<?= $orderDataRow['invoice_no']; ?>')"><i class="fa fa-download" aria-hidden="true"></i><b> Download Pdf</b></btn>

        </div>
        
       


    </div>
  </div>

</div>

<?php include('includes/footer.php');?>