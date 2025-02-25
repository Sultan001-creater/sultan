<?php include('includes/header.php');?>

<div class="modal fade" id="addCustomerModal" data-bs-backdrop="static" data-bs-keyboard="false"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="row justify-content-center " id="exampleModalLabel"style="color:orangered;"><b>Add New Customer</b></h5>
        <!--<h4 class="row justify-content-center" >Add New Customer </h4>-->

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
        <label ><b> Name </b><span style="color:orangered;">*</span></label>
        <input type="text" class="form-control" id="c_name"/>
        </div>
        <div class="mb-3">
        <label ><b> Phone No </b><span style="color:orangered;">*</span></label>
        <input type="number" class="form-control" id="c_phone"/>
        </div>
        <div class="mb-3">
        <label ><b> Email (optional)</b></label>
        <input type="email" class="form-control" id="c_email"/>
        </div>
        <div class="mb-3">
        <label ><b> KRA Pin (optional)</b></label>
        <input type="pin" class="form-control" id="c_pin"/>
        </div>
        <div class="mb-3">
        <label ><b>Company Name (optional)</b> </label>
        <input type="company" class="form-control" id="c_company"/>
        </div>
      </div>
      <div class="modal-footer"style="margin-right:8;">

        <button type="button"  class=" btn btn-danger" data-bs-dismiss="modal">Close Tab</button>
        <button type="button"  class="btn btn-primary saveCustomer">Save Customer</button>

    </div>

    </div>
  </div>
</div>


<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header"style="color:orangered;">
        <h2 class="mb-0"><i style="color:#C62300;" class="fas fa-list"></i><b> Create Order.
        </b><a href="orders.php " class="btn btn-info float-end"style="color:white;">Back</a>
</h2>
    </div>
    <div class="card-body ">
    <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item active">OUR PARTNERS</li>
                        </ol>
    <div class="row ">
                       <!--<div class="card card-body shadow border-1 mb-4">-->
                       <table class="table table-bordered shadow ">
                        <tbody>
                            <tr>
                       <td>
                        <h4 style="font-size:23px; line-height:30px; margin-right:20px; padding:0;margin-top:0.5rem;"><img src="assets/img/rush back orange.png" width="140px"></img></h4>
                        
                        </td>
                        <td>
                        <h4 style="font-size:23px; line-height:30px; margin:2px; padding:0;margin-top:0.5rem;"><img src="assets/img/sultan1.png" width="150px"></img></h4>
                       
                        </td>
                        <td>
                        <h4 style="font-size:23px; line-height:30px; margin:2px; padding:0;margin-top:0.5rem;"><img src="assets/img/not1.png" width="150px"></img></h4>
                        
                        </td>
                        <td>
                        <h4 style="font-size:23px; line-height:30px; margin:2px; padding:0;margin-top:0.5rem;"><img src="assets/img/four1.png" width="150px"></img></h4>
                       
                        </td>
                        <td>
                        <h4 style="font-size:23px; line-height:30px; margin:2px; padding:0;margin-top:0.5rem;"><img src="assets/img/tosscoin (s)c.png" width="150px"></img></h4>
                        
                        </td>
                       

                    </tr>
                    </tbody>
                    </table>
                       
                       <!-- </div>-->
                        </div>
    <?php alertMessage(); ?>
       <form action="orders-code.php" method="POST">
    <div class="row">
       <div class="col-md-4 mb-3">
      <label ><b>Select Product </b><span style="color:orangered">*</span></label>
      
     <select name="product_id" class="form-select myselect2">
        <option value="">-- Select Product --</option>
        <?php
        $products =getAll('products');
        if($products){
            if(mysqli_num_rows($products) > 0)
            {
                foreach($products as $prodItem){
                    ?>
                    <option value="<?= $prodItem['id']; ?>"><?= $prodItem['name']; ?></option>
                    
                    <?php
                }
            }else{
                echo'<option value="">NO product Found!</option>';
            }
        }else{
            echo'<option value="">Something went wrong!</option>';
        }
        ?>
     </select>
       </div>
       <div class="col-md-2 mb-3">
      <label ><b>Quantity </b><span style="color:orangered">*</span></label>
      <input  type="number" name="quantity" value="1"  class="form-control"/>
       </div>
       <div class="col-md-2 mb-3">
      <label ><b>Cartons </b><span style="color:orangered">*</span></label>
      <input type="number" name="cartons" value="0"  class="form-control"/>
       </div>
       <div class="col-md-4 mb-3 text-end">
       <br>
        <button type="submit" name="addItem" class="btn "style="background:orangered;color:white;"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
       </div>
    </div>
       </form>
        
    </div>
 </div>
 <div class="card mt-3">
    <div class="card-header"style="color:orangered;">
        <h2 mb-0 ><i style="color:#C62300;" class="fas fa-cart-plus"></i> Shopping Cart</h2>
    </div>
    <div class="card-body"id="productArea">
        <?php
        if(isset($_SESSION['productItems']))
        {
            $sessionProducts = $_SESSION['productItems'];
            if(empty($sessionProducts)){
                unset($_SESSION['productItemIds']);
                unset($_SESSION['productItems']);
            }
            ?>
            <div class="table-responsive mb-3"id="productContent">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr style="color:orangered;">
                            <th >Id</th>
                            <th >Description</th>
                            <th >Quantity</th>
                            <th >Price</th>
                            <th >Amount</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i =1;
                        $totalAmount = 0;
                        foreach($sessionProducts as $key => $item):
                            $totalAmount += $item['price'] * $item['quantity'];
                         ?>
                        <tr>
                            <td><?= $i++;?></td>
                            <td><?= $item['name']; ?></td>
                           
                            <td>
                                <div class="input-group qtyBox">
                                    <input type="hidden" value="<?= $item['product_id'];?>" class="prodId"/>
                                    <button class="input-group-text decrement">-</button>
                                    <input type="text" value="<?= $item['quantity']; ?>"class="qty quantityInput"/>
                                    <button class="input-group-text increment">+</button>
                                </div>
                            </td>
                            
                            <td><?= $item['price']; ?></td>
                            <td><?= number_format($item['price']* $item['quantity'],0); ?></td>
                            <td>
                                <a href="order-item-delete.php?index=<?= $key;?>"class="btn btn-danger "><i class="fas fa-remove"></i> Remove</a>
                            </td>
                            
                        </tr>
                        
                        <?php endforeach; ?>

                                       
                           
                    </tbody>
                    
                </table>
                <div class="table-responsive mb-3 "id="productContent">
                <table class="table table-bordered table-striped ">
                                        <tr>
                                        <td class="text-center fw-bold" style="font-weight:bold;background:;color:#405D72;border:solid;"><h4><b>SUB-TOTAL</b><br>
                                        <b >Ksh:<?= number_format(($totalAmount)-(($totalAmount*16)/100),2); ?></b></h4></td>
                                        <td class="text-center fw-bold"style="font-weight:bold;background:;color:#405D72;border:solid;"><h4><b>V A T</b><br>
                                        <b >Ksh:<?=number_format(($totalAmount*16)/100,2); ?></b></h4></td>
                                        <td class="text-center fw-bold"style="font-weight:bold;background:;color:#405D72;border:solid;"><h4><b>TOTAL DUE</b><br>
                                        <b >Ksh:<?= number_format($totalAmount,2); ?></b></h4></td>
                                        </tr>
                                       
                                        </table>
                                        </div>
                        </div> 
                        <hr>                
            <div class="mt-2">
           
           
                <div class="row">
                     <div class="card-header"style="color:orangered;">
                          <h2 mb-0 ><i style="color:#C62300;" class="fas fa-credit-card"></i> Checkout </h2>
                         </div>
                    <div class="col-md-3">

                        <label ><b>Select Payment Mode </b><span style="color:orangered">*</span></label>
                        <select id="payment_mode" class="form-select myselect2">
                            <option value="" >--- Select Payment ---</option>
                            <option value="cash"> Cash Payment  </option>
                            <option value="m-pesa"> Lipa na M-pesa </option>                  
                            <option value="Cash on Delivary"> Cash On Delivary </option>                  
                            <option value="cheque"> Cheque </option>
                            <option value="credit"> Credit</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                    <label ><b>Enter Customer Phone No </b><span style="color:orangered;">*</span></label>
                    <input type="number" id="cphone" class="form-control" value="" placeholder="Enter Phone No:"/>
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
                   
                  
                  
                    <div class="col-md-3">
                       <br/>
                       <button type="button" class="btn btn-warning w-100 proceedToPlace"style="color:black;"><i class="fas fa-credit-card"></i><b> Proceed to Checkout</b></button>
                
                    </div>
                </div>
            </div>
           
                       
            <?php
        }
        else
        {
            echo'<h5>No Items Added</h5>';
        }
        ?>
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>