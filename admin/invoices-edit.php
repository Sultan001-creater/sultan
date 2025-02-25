<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h4 class="mb-0"style="color:orangered;"><i style="color:orangered;" class="fa fa-user-secret" aria-hidden="true"></i><b> Edit Order
        </b><a href="orders.php" class="btn btn-info float-end"style="color:white;">Back</a>
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
       <form action="orders-code.php" method="POST">
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
       <input type="hidden" name="orderId" value="<?= $orders['data']['id']; ?>">
    <div class="row ">
    <div class="col-md-3">

            <label ><b>Select Payment Mode </b><span style="color:orangered">*</span></label>
            <select id="order_status" class="form-select myselect2">
                <option value="" >--- Select Payment ---</option>
                <option value="cash"> Cash Payment  </option>
                <option value="m-pesa"> Lipa na M-pesa </option>                  
                <option value="cheque"> Cheque </option>
                <option value="credit"> Credit</option>
            </select>
            </div>
            <div class="col-md-3">
                    <label ><b>Enter Customer Phone No </b><span style="color:orangered;">*</span></label>
                    <input type="number" id="cphone" class="form-control" value=""/>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label ><b>Select Sales Rep</b><span style="color:red;">*</span></label>
                        <select id="sales_rep" class="form-select myselect2">
                            <option value="">---Select Sales Rep--- </option>
                            <option value="walkin Customer">walk-In Customer </option>
                            <?php 
                            $admins = getAll('admins');
                            if($admins){
                                if(mysqli_num_rows($admins) > 0)
                                {
                                    foreach($admins as $admiItem){
                                        echo '<option  value="'. $admiItem['name'].'">'. $admiItem['name'].'</option>';
                                    }
                    
                                }else
                                {
                                    echo' <option value="">No Sales rep Found</option>';
                                }
                            }else{
                                echo' <option value="">Something went wrong</option>';

                            }
                            ?>

                        </select>
                        </div>
                   
                
      
       <div class="col-md-12 mb-3 text-end">
        <button type="submit" name="updateOrder" class="btn "style="background:orangered;color:white;"><i class="fas fa-save"></i><b> Update Supplier</b></button>
       </div>
    </div>
    <h6 class="col-md-11 mb-3 text-end"style="color:orangered;">N/B:Do not submit confidential information such as credit card details, mobile and ATM PINs,etc.Report Abuse</h6>
     <h6 class="col-md-7 mb-3 text-end">Powered By<img src="assets/img/tosscoin (s)c.png" width="180px"></h6>

     <?php
        }
        else
        {
            echo '<h5>'.$position['message'].'</h5>';
           
        }
       }
       else
       {
        echo '<h5>something Went Wrong!</h5>';
        return false;
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
       </form>
        
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>