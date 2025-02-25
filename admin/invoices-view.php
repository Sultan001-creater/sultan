<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;"> Invoice Viewing
        <a href="orders.php" class="btn btn-secondary float-end"style="color:white;"><i class="fa fa-angle-double-left" aria-hidden="true"></i><b>Back</b></a>

</h2>
    </div>
    <div class="card-body">

        <?php
        if(isset($_GET['track']))
        {
            if($_GET['track'] == ''){
                ?>
                <div class="text-center py-1 ">
                    <h3 class="fw-bold">No Tracking Number Found!</h3>
                    <p class="fw-bold">Please Enter a  Tracking Number And Try Refreshing.</p>
                    <div>
                    <a href="orders.php" class=" btn  mt-4 w-25"style="background:orangered;color:white;font-weight:bold;">Go Back To Orders</a>
                    </div>
                </div>
            <?php

            return false;
            }
            $trackingNo = validate($_GET['track']);
            $query = "SELECT o.*, c.* FROM orders o,customers c
                        WHERE c.id = o.customer_id AND tracking_no='$trackingNo'
                        ORDER BY o.id DESC";

            $orders = mysqli_query($conn, $query);
            if($orders)
            {
                if(mysqli_num_rows($orders) > 0){
                    $orderData = mysqli_fetch_assoc($orders);
                    $orderId = $orderData['id'];
                    ?>
                    
                    <div class="card card-body shadow border-1 mb-4">
                    <table class="table table-bordered table-striped">
                               <tbody>
                                <tr>
                                <td style="text-align:center;" colspan="1">
                                <h4 style="font-size:23px; line-height:30px; margin:2px; padding:0;margin-top:0.5rem;"><img src="assets/img/sultan1.png" width="180px"></h4>
                                <p style="font-size:16px; line-height:24px; margin:2px; padding:0;"></p>
                                 </td>
                                 <td style="text-align:center;" colspan="1">
                                <h4 style="font-size:40px; line-height:30px; margin:2px; padding:0;margin-top:1.5rem;color:orangered;">SULTAN HOLDINGS & CO.</h4>
                                <p style="font-size:30px; line-height:24px; margin:2px; padding:0;color:gray">Quality and Standard</p>
                                <p style="font-size:16px; line-height:24px; margin:2px; padding:0;"></p>
                                 </td>
                                 <td style="text-align:center;" colspan="1">
                                <h4 style="font-size:40px; line-height:30px; margin:2px; padding:0;margin-top:1.5rem;color:gray;">Invoice</h4>
                                 </td>
                                
                                </tr>
                </tbody>
                </table>
                        <div class="row">
                            
                            
                            <div class="col-md-4">
                            <h4 style="color:gray;">Customer Details</h4>
                            <label class="mb-1">
                                Company:
                                <span class="fw-bold"><?= $orderData['company']; ?></span>
                            </label>
                            <br/>
                            <label class="mb-1">
                                Name:
                                <span class="fw-bold"><?= $orderData['name']; ?></span>
                            </label>
                            <br/>
                            <label class="mb-1">
                                Email:
                                <span class="fw-bold"><?= $orderData['email']; ?></span>
                            </label>
                            <br/>
                            <label class="mb-1">
                                Phone:
                                <span class="fw-bold"><?= $orderData['phone']; ?></span>
                            </label>
                            <br/>
                            <label class="mb-1">
                                Pin:
                                <span class="fw-bold"><?= $orderData['pin']; ?></span>
                            </label>
                            <br/>
                        </div>
                        <div class="col-md-4">
                        <h4 style="color:gray;">Company Details</h4>
                        <label class="mb-1 fw-bold">Mombasa/Old-town/Nkurumah Street </label>
                        <br>
                        <label class="mb-1 fw-bold">0791828395/0771559722. </label>
                        <br>
                        <label class="mb-1 fw-bold">Sultanholdingscompany@gmail.com </label>
                        <br>
                        <label class="mb-1 fw-bold">P.O BOX:425-80301 </label>
                        <br>
                        <label class="mb-1 fw-bold">Pin: </label>
                        <br>
                        </div>
                        <div class="col-md-4 "align="end">
                                <h4 style="color:gray;">Invoice Details</h4>
                                <label class="mb-1">
                                    Tracking No:
                                    <span class="fw-bold"><?= $orderData['tracking_no']; ?></No:span>
                                </label>
                                <br/>
                                <label class="mb-1">
                                    Invoice No:
                                    <span class="fw-bold"><?= $orderData['invoice_no']; ?></No:span>
                                </label>
                                <br/>
                                <label class="mb-1">
                                    Invoice Date:
                                    <span class="fw-bold"><?= ($orderData['order_date']); ?></No:span>
                                </label>
                                <br/>
                                
                                <label class="mb-1">
                                    Payment mode:
                                    <span class="fw-bold"><?= $orderData['payment_mode']; ?></No:span>
                                </label>
                                <br/>
                                <label class="mb-1">
                                    Served by:
                                    <span class=""><?= $_SESSION['loggedInUser']['name']; ?></No:span>
                                </label>
                                <br/>
                            </div>
                        </div>
                    </div>

                    <?php
                        $orderItemQuery = "SELECT oi.cartons as orderIteCartons,oi.quantity as orderItemQuantity,oi.price as orderItemPrice, o.*, oi.*, p.*
                        FROM orders as o, order_items as oi, products as p
                        WHERE oi.order_id = o.id And p.id = oi.product_id AND o.tracking_no='$trackingNo'";

                    $orderItemsRes = mysqli_query($conn, $orderItemQuery);
                    if($orderItemsRes)
                    {
                        if(mysqli_num_rows($orderItemsRes) > 0)
                        {
                            ?>
                            <h3 class="my-2"style="text-align:start;">Order Items Details</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Price(incl VAT)</th>
                                        <th>VAT 16%</th>
                                        <th>Price (Excl VAT)</th>
                                                                      
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($orderItemsRes as $orderItemRow): ?>
                                        <tr>
                                            <td>
                                            <img src="<?= $orderItemRow['image'] != '' ? '../'.$orderItemRow['image']: '../assets/images/no-img.jpg'; ?>"
                                            style="width:120px;height:120px;"
                                            alt="Img" />
                                    </td>
                                           <td width="" class="fw-bold ">
                                             <?= $orderItemRow['name']; ?>
                                        </td>

                                        <td width="" class="fw-bold ">
                                                <?= $orderItemRow['orderItemQuantity']; ?>
                                            </td>
                                            <td width="" class="fw-bold ">
                                                <?= number_format($orderItemRow['orderItemPrice'],2) ?>
                                            </td>
                                            <td width="" class="fw-bold ">
                                                <?= number_format(($orderItemRow['orderItemPrice']*16)/100,2) ?>
                                            </td>
                                            <td width="" class="fw-bold ">
                                                <?= number_format($orderItemRow['orderItemPrice']-($orderItemRow['orderItemPrice']*16)/100,2) ?>
                                            </td>
                                            
                                           
                                            <td width="" class="fw-bold ">
                                                <?= number_format($orderItemRow['orderItemPrice'] * $orderItemRow['orderItemQuantity'],2) ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <br/>
                                        <tr >
                                        <td colspan="3"class="text-center fw-bold"style="font-weight:bold;background:;color:#405D72;border:solid;"><h3>SUB-TOTAL: <br>
                                         Ksh:<?= number_format(($orderItemRow['total_amount'])-(($orderItemRow['total_amount']*16)/100),2); ?></h3></td>
                                        <td colspan="3"  class="text-center fw-bold"style="font-weight:bold;background:;color:#405D72;border:solid;"><h3>VAT: <br>
                                        Ksh:<?=number_format(($orderItemRow['total_amount']*16)/100,2); ?></h3></td>
                                        <td colspan="3" class="text-center fw-bold"style="font-weight:bold;background:;color:#405D72;border:solid;"><h3>TOTAL DUE: <br>
                                        Ksh:<?= number_format($orderItemRow['total_amount'],2); ?></h3></td>
                                        </tr>
                                        
                                </tbody>
                            </table>
                            <?php
                        }
                        else
                        {
                            echo '<h5>Something Went Wrong!</h5>';
                            return false;
                        }
                    }
                    else
                    {
                        echo'<h5>Something Went Wrong!</h5>';
                        return false;
                    }
                    ?>
                    <?php
                }else{
                    ?>
                    <div class="text-center py-1 ">
                        <h3 class="fw-bold">No Record Found/Invalid Trucking No!</h3>
                        <p class="fw-bold">Please Enter a Valid Tracking Number And Try Again.</p>
                        <div>
                        <a href="orders.php" class=" btn  mt-4 w-25"style="background:orangered;color:white;font-weight:bold;">Go Back To Orders</a>
                        </div>
                    </div>
                <?php
                   
                    return false;

                  
                }
            }
            else
            {
                echo'<h5>Something Went Wrong!</h5>';
            }


        }
        else
        {
            ?>
                <div class="text-center py-5">
                    <h5>No Tracking Number Found!</h5>
                    <div>
                    <a href="orders.php" class=" btn btn-primary mt-4 w-25">Go back to orders</a>
                    </div>
                </div>
            <?php
        }

        ?>
    
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>