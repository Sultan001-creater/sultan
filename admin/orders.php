<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
            <h2 class="mb-0"style="color:orangered;"><i style="color:#C62300;" class="fas fa-table me-1"></i>Orders/Invoices</h2>
            </div>
            <div class="col-md-8">
                <form action="" method="GET">
                    <div class="row g-1">
                         <!--Tracking No Filter-->
                         <div class="col-md-2">
                            <input type="track"
                             name="track"
                             class="form-control" 
                             value="<?= isset($_GET['track'])== true ? $_GET['track']:''; ?>"
                             placeholder="Track No"
                             />
                             </div>
                        <!--Date Filter-->
                        <div class="col-md-3">
                            <input type="date"
                             name="date"
                             class="form-control" 
                             value="<?= isset($_GET['date'])== true ? $_GET['date']:''; ?>"
                             />                 
                             </div>
                            <!--Payment Mode Filter-->
                             <div class="col-md-3">
                                <select name="payment_mode" class="form-select">
                                    <option value="">--Payment Mode--</option>
                                    <option value="cash"                                    
                                    <?= 
                                    isset($_GET['payment_mode']) == true
                                     ?
                                    ($_GET['payment_mode'] == 'cash' ? 'selected':'')
                                    :
                                    ''; 
                                    ?>
                                    >
                                    Cash 
                                    </option>
                                    <option value="m-pesa"
                                    <?=
                                     isset($_GET['payment_mode']) == true
                                      ?
                                    ($_GET['payment_mode'] == 'm-pesa' ? 'selected':'')
                                    :
                                    '';
                                     ?>
                                    > M-Pesa</option>
                                    <option value="Cash On Delivary"
                                    <?=
                                     isset($_GET['payment_mode']) == true
                                      ?
                                    ($_GET['payment_mode'] == 'Cash On Delivary' ? 'selected':'')
                                    :
                                    '';
                                     ?>
                                    > Cash On Delivary</option>
                                    <option value="cheque"
                                    <?=
                                     isset($_GET['payment_mode']) == true 
                                     ?
                                    ($_GET['payment_mode'] == 'cheque' ? 'selected':'')
                                    :
                                    ''; 
                                    ?>
                                    >Cheque</option>
                                    <option value="credit"
                                    <?=
                                     isset($_GET['payment_mode']) == true
                                     ?
                                    ($_GET['payment_mode'] == 'credit' ? 'selected':'')
                                    :
                                    ''; 
                                    ?>
                                    >Credit</option>
                                </select>
                             </div>
                             <div class="col-md-4">
                                <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> Find Now</button>
                                <a href="orders.php" class="btn btn-secondary"><i class="fa fa-spinner" aria-hidden="true"></i> Reset</a>
                             </div>
                        </div>

                    
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        
        <?php 

        if(isset($_GET['date']) || isset($_GET['track']) || isset($_GET['payment_mode'])){
            $orderDate = validate($_GET['date']);
            $trackingNo = validate($_GET['track']);
            $paymentMode = validate($_GET['payment_mode']);

            if($orderDate != '' && $trackingNo == '' && $paymentMode == ''){
                $query = "SELECT O.*,C.* FROM orders o, customers c 
                WHERE c.id = o.customer_id AND o.order_date='$orderDate' ORDER BY o.id DESC";

            }elseif($orderDate == '' && $trackingNo != '' && $paymentMode == ''){
                $query = "SELECT O.*,C.* FROM orders o, customers c 
                WHERE c.id = o.customer_id AND o.tracking_no='$trackingNo' ORDER BY o.id DESC";


            }elseif($orderDate == '' && $trackingNo == '' && $paymentMode != ''){
                $query = "SELECT O.*,C.* FROM orders o, customers c 
                WHERE c.id = o.customer_id 
                AND o.payment_mode='$paymentMode' ORDER BY o.id DESC";
           
            }elseif($orderDate != '' && $trackingNo != '' && $paymentMode == ''){
                $query = "SELECT O.*,C.* FROM orders o, customers c 
                WHERE c.id = o.customer_id  
                AND o.order_date='$orderDate'
                AND o.tracking_no='$trackingNo' ORDER BY o.id DESC";
           
            }elseif($orderDate == '' && $trackingNo != '' && $paymentMode != ''){
                $query = "SELECT O.*,C.* FROM orders o, customers c 
                WHERE c.id = o.customer_id 
                AND o.tracking_no='$trackingNo'
                AND o.payment_mode='$paymentMode' ORDER BY o.id DESC";
           
           
            }elseif($orderDate != '' && $trackingNo == '' && $paymentMode != ''){
                $query = "SELECT O.*,C.* FROM orders o, customers c 
                WHERE c.id = o.customer_id 
                AND o.order_date='$orderDate' 
                AND o.payment_mode='$paymentMode' ORDER BY o.id DESC";

            }elseif($orderDate != '' && $trackingNo != '' && $paymentMode != ''){
                $query = "SELECT O.*,C.* FROM orders o, customers c 
                WHERE c.id = o.customer_id 
                AND o.order_date='$orderDate' 
                AND o.tracking_no='$trackingNo' 
                AND o.payment_mode='$paymentMode' ORDER BY o.id DESC";

            }else{
                $query = "SELECT O.*,C.* FROM orders o, customers c 
                WHERE c.id = o.customer_id ORDER BY o.id DESC";

            }

        }else{
            $query = "SELECT O.*,C.* FROM orders o, customers c 
                WHERE c.id = o.customer_id ORDER BY o.id DESC";

        }
        
        $orders = mysqli_query($conn,$query);
        if($orders){
            if(mysqli_num_rows($orders) > 0)
            {
                ?>
                <table class="table table-striped table-bordered align-items-center justify-content-center">
                    <thead>
                        <tr>
                            <th>Tracking No</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Order date</th>
                            <th>Payment Mode</th>
                            <th>Sales Rep</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $orderItem) :?>
                            <tr>
                                <td class="fw-bold"><?= $orderItem['tracking_no'];?></td>
                                <td style="width:8rem;"><?= $orderItem['name'];?></td>
                                <td style="width:8rem;"><?= $orderItem['phone'];?></td>
                                <td style="width:8rem;"><?= date('d-M-Y',strtotime( $orderItem['order_date']));?></td>
                                <td style="width:5rem;"><?= $orderItem['payment_mode'];?></td>
                                <td ><?= $orderItem['sales_rep'];?></td>
                                <td>
                                    <a href="invoices-view.php?track=<?= $orderItem['tracking_no']; ?>" class="btn  mb-0 px-2 btn-sm"style="background:orangered;color:white;"><i style="color:white;" class="fa fa-eye" aria-hidden="true"></i><b> View</b></a>
                                    <a href="invoices-print.php?track=<?= $orderItem['tracking_no']; ?>" class="btn  mb-0 px-2 btn-sm"style="background:#0f4c5c;color:white;"><i style="color:white;" class="fa fa-print" aria-hidden="true"></i><b> Print</b></a>
                                </td>
                            </tr>
                            <?php endforeach ;?>
                    </tbody>
                </table>
                <?php

            }
            else
            {
                ?>
                <div class="text-center py-1 ">
                    <h3 class="fw-bold">No Orders Available!</h3>
                    <p class="fw-bold">Please Create Order And Try Refreshing.</p>
                    <div>
                    <a href="orders-create.php" class=" btn  mt-1 w-25"style="background:orangered;color:white;font-weight:bold;"><i style="color:white;" class="fa fa-download" aria-hidden="true"></i> CREATE ORDER </a>
                    </div>
                </div>
            <?php
               // echo"<h5>No Record Available</h5>";
            }
        }
        else
        {
            echo"<h5>Something Went Wrong!</h5>";
        }
        ?>

    </div>
 </div>

</div>

<?php include('includes/footer.php');?>