<?php include('includes/header.php');
if(!isset($_SESSION['productItems'])){
    echo'<script>window.location.href ="orders-create.php";</script>';
}
?>

<div class="modal fade" id="orderSuccessModal" data-bs-backdrop="static" data-bs-keyboard="false"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class=" modal-content">
      <div class="modal-body">
       
     
     <div class="col-md-8 mb-3 text-center">  <img src="assets/img/sultan1.png" width="200px">

        <h5 id="orderPlaceSuccessMessage"></h5>

    

        <a href="orders.php"  class=" btn btn-secondary" >Close</a>
        <button type="button"  class="btn btn-danger "onclick="printMyBillingArea()"><i style="color:white;" class="fa fa-print" aria-hidden="true"></i><b> Print</b></button>
        <button type="button"  class="btn btn-warning "onclick="downloadPDF('<?= $_SESSION['invoice_no']; ?>')"><i class="fa fa-download" aria-hidden="true"></i><b> Download Pdf</b></button>
        </div>

    </div>

    </div>
  </div>
</div>


<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0"style="color:orangered;"> <b>Order Summary
                    </b><a href="orders-create.php"class="btn btn-warning float-end"><i class="fas fa-cart-plus"></i> Back to Shopping Cart</a>
                    <button type="button" class="btn float-end px-4 mx-1" id="saveOrder"style="background:orangered;color:white;"><i class="fas fa-save"></i> Save Order</button>

                </h4>
                </div>
                <div class="card-body">
                    <?php// alertMessage(); ?>
                    <?php 
        if(isset($_SESSION['alert'])){
      ?>

        <div class="container pt-3">
        <div class="alert alert-<?= $_SESSION['alert']['type']?>">
          <?= $_SESSION['alert']['message']?>
        </div>
      </div>

      <?php unset($_SESSION['alert']);
    } ?>
                    <div id="myBillingArea">
                    <?php
                    if(isset($_SESSION['cphone']))
                    {
                        $phone = validate($_SESSION['cphone']);
                        $invoiceNo = validate($_SESSION['invoice_no']);
                       

                        $customerQuery = mysqli_query($conn,"SELECT * FROM customers WHERE phone='$phone' LIMIT 1");
                        if($customerQuery){
                            if(mysqli_num_rows($customerQuery) > 0){
                                $cRowData = mysqli_fetch_assoc($customerQuery);

                       
                                ?>
                                
                                <table class="table table-bordered table-striped">
                               <tbody>
                                <tr>
                                <td style="text-align:center;" colspan="1">
                                <h4 align="start"style="font-size:23px; line-height:30px; margin:2px; padding:0;margin-top:0.5rem;"><img src="assets/img/sultan1.png" width="180px"></h4>
                                <p style="font-size:16px; line-height:24px; margin:2px; padding:0;"></p>
                                 </td>
                                 <td style="text-align:center;" colspan="1">
                                <h4 style="font-size:40px; line-height:30px; margin:2px; padding:0;margin-top:1.5rem;color:orangered;">SULTAN HOLDINGS & CO.</h4>
                                <p style="font-size:30px; line-height:24px; margin:2px; padding:0;color:gray">Quality and Standard</p>
                                <p style="font-size:16px; line-height:24px; margin:2px; padding:0;"></p>
                                 </td>
                                 <td style="text-align:center;" colspan="1">
                                <h4 align="end" style="font-size:40px; line-height:30px; margin:2px; padding:0;margin-top:1.5rem;color:gray;">Invoice</h4>
                                 </td>
                                
                                </tr>
                                <tr>
                                 <td >
                                <h5 style="font-size:20px; line-height:30px; margin:0px; padding:0;color:gray;">Customer Details</h5>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> Company:<?= $cRowData['company'] ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> Name:<?= $cRowData['name'] ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> Phone no:<?= $cRowData['phone'] ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;"> E-Mail:<?= $cRowData['email'] ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;color:red;"> PIN:<?= $cRowData['pin'] ?></p>
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
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;">Invoice no:<?= $invoiceNo; ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;">Invoice Date:<?= date('d M Y'); ?></p>
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;">Invoice Due Date:<?= date('d M Y'); ?></p>                                
                                <p style="font-size:14px; line-height:20px; margin:0px; padding:0;">Payment terms:Cash/M-pesa </p>
                                
                            </td>
                                </tr>
                                 </tbody>
                                </table>
                                <?php
                            }else{
                                echo "<h5>No Customer Found</h5>";
                                return;
                            }
                        }

                    }
                    

                   ?>
                   
                   <?php
                   
                    if(isset($_SESSION['productItems']))
                    {
                       $sessionProducts = $_SESSION['productItems'];
                    ?>
                    <div>
                        
                        <table class="table table-bordered table-striped">
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
                        <tbody>
                            <?php
                            $i = 1;
                            $totalAmount = 0;
                            foreach($sessionProducts as $key => $row):
                                $totalAmount += $row['price'] * $row['quantity'];
                            ?>
                            <tr>
                                <td style="border-bottom:1px;solid #ccc"><?= $i++; ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= $row['name']; ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= $row['quantity']; ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= $row['cartons']; ?></td>
                                <td style="border-bottom:1px;solid #ccc">0%</td>
                                <td style="border-bottom:1px;solid #ccc"><?= number_format($row['price']-($row['price']*16)/100,2) ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= number_format(($row['price']*16)/100,2) ?></td>
                                <td style="border-bottom:1px;solid #ccc"><?= number_format($row['price'],2) ?></td>
                                <td style="border-bottom:1px;solid #ccc" class="fw-bold"><?= number_format($row['price'] * $row['quantity'], 0) ?></td>
                            </tr>
                            
                            <?php endforeach; ?>
                            <hr>
                            <tr >
                                        <td colspan="3"class="text-center fw-bold"style="font-weight:bold;background:;color:#405D72;border:solid;"><h3>SUB-TOTAL: <br>
                                         Ksh:<?= number_format(($totalAmount)-(($totalAmount*16)/100),2); ?></h3></td>
                                        <td colspan="3"  class="text-center fw-bold"style="font-weight:bold;background:;color:#405D72;border:solid;"><h3>VAT: <br>
                                        Ksh:<?=number_format(($totalAmount*16)/100,2); ?></h3></td>
                                        <td colspan="3" class="text-center fw-bold"style="font-weight:bold;background:;color:#405D72;border:solid;"><h3>TOTAL DUE: <br>
                                        Ksh:<?= number_format($totalAmount,2); ?></h3></td>
                                        </tr>
                           
                            <tr>
                                <td colspan="3"style="color:black;">Payment Mode:<?=$_SESSION['payment_mode'];?></td>
                                </tr>
                                <tr>
                                   
                                
                                <td colspan="3"style="color:black;">You were served by: <?= $_SESSION['loggedInUser']['name']; ?></td>
                                <td colspan="3"style="color:black;">Sales Rep: <?=  $_SESSION['sales_rep']; ?></td>
                                <td colspan="6"style="color:black;">Invoice Due Date: <?= date('d-M-Y'); ?></td>
                                         
                            </tr>
                        </tbody>
                       
                        </table>
                      
                               
                       <h5><u> Note</u></h5>
                                <p>All products listed above are properties of Sultan holdings & co until they are fully paid off by the customer in full.
                                Late payments of this invoice shall attract a late  penalty fee of 5% of the grand total indicated in this Invoice.Make sure the products you recieve are in good condition
                                and of the standard you required before signing below.Once You sign this invoice the good will not be accepted back to our stores.</p>
                                <p>Invoice Prepared By:............................................... Customer's signature:..............................................  </p>
                        
                                 
                    </div>
                    

                    <?php
                    }
                    else
                    {
                        echo'<h5 class="text-center">No Items added</h5>';
                    }
                   ?>
                   
                </div>
                <?php if(isset($_SESSION['productItems'])):?>
                <div class="mt-4 text-end">
               
                    <button type="button" class="btn  px-4 mx-1" id="saveOrder"style="background:orangered;color:white;"><i class="fas fa-save"></i> Save Order</button>

                </div>
                <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
