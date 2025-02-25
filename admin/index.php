
<?php include('includes/header.php');?>
<div class="container-fluid px-4">
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
                        <h1 class="mt-4"style="color:orangered;"><i style="color:#C62300;" class="fas fa-dashboard"></i><b> Dashboard</b></h1>
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item active ">OUR PARTNERS</li>
                        </ol>
                        <div class="row "style="text-decoration: none;">
                       <div class="row ">
                       <!--<div class="card card-body shadow border-1 mb-4">-->
                       <table class="table table-bordered shadow ">
                        <tbody>
                            <tr>
                       <td>
                        <h4 style="font-size:23px; line-height:30px; margin-right:20px; padding:0;margin-top:0.5rem;"><img src="assets/img/rush web.png" width="150px"></img></h4>
                        
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
                        
                            
                            <div class=" col-md-3 mb-3">
                                <div class="card card-body  p-3"style="background:orangered;">
                                <a href="products.php" style="text-decoration: none;"><h1 class="fw-bold mb-0"style="color:white;font-size:3rem;"><i style="color:#white;font-size:4rem;" class="fas fa-cubes"></i>
                                        <?= getCount('products'); ?> </h1>
                                       <h4 class="text-sm mb-0 text-capitalize "style="color:white;text-align:right;"><b>PRODUCTS</b></h4>


                                   
                                    
                                    </a>
                                </div>
                            </div>
                            <div class=" col-md-3 mb-3">
                                <div class="card card-body  p-3"style="background:#C62300;">
                                <a href="customers.php" style="text-decoration: none;"><h1 class="fw-bold mb-0"style="color:white;font-size:3rem;"><i style="color:#white;font-size:4rem;" class="fas fa-users"></i>
                                        <?= getCount('customers'); ?>
                                         <h4 class="text-sm mb-0 text-capitalize "style="color:white;text-align:right;"><b> CUSTOMERS</b></h4>


                                    </h1>
                                    </a>
                                   
                                </div>
                            </div>
                           
                            
                            <div class="col-md-3 mb-3">
                              <div class="card card-body p-3"style="background:#5a0002;">
                              <a href="orders.php" style="text-decoration: none;"> <h1 class="fw-bold mb-0"style="color:white;"><i style="color:#white;font-size:4rem;" class="fas fa-cart-plus"></i>
                                        <?php
                                        $todayDate = date('y-m-d');
                                        $todayOrders = mysqli_query($conn, "SELECT * FROM orders WHERE order_date='$todayDate'");
                                        if($todayOrders){
                                            if(mysqli_num_rows($todayOrders) > 0){
                                                $totalCountOrders = mysqli_num_rows($todayOrders);
                                                echo  $totalCountOrders;

                                            }else{
                                                echo "0";

                                            }

                                        }else{
                                            echo'Something went wrong!';
                                        }
                                        ?>
                                                                           <h4 class="text-sm mb-0 text-capitalize "style="color:white;text-align:right;"><b> DAILY ORDERS</b></h4>


                                    </h1>
                                    </a>
                                </div>
                            </div>  
                            <div class=" col-md-3 mb-3">
                                <div class="card card-body   p-3"style="background:green;">
                                <a href="orders.php" style="text-decoration: none;"><h1 class="fw-bold mb-0"style="color:white;"><i style="color:#white;font-size:4rem;" class="fas fa-shopping-basket"></i>
                                        <?= getCount('orders'); ?>
                                         <h4 class="text-sm mb-0 text-capitalize "style="color:white;text-align:right;"><b>TOTAL ORDERS</b></h4>


                                    </h1>
                                    </a>
                                </div>
                            </div>
                          
                        </div>
                            
                            
                            
                       
<div class="row">
<div class="col-xl-8">
<div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;text-align:center;"><b>Our  Products List.
        </b>
</h2>
    </div>
    <div class="card-body">
        <?php //alertMessage(); ?>
        <?php
                        $products = getAll('products');
                        if(!$products){
                            echo'<h4>something went wrong</h4>';
                            return false;
                        }
                        if(mysqli_num_rows($products) > 0)
                        {
                        ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="color:orangered;">
                        
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Supplier</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Price</th>           
                       
                       
                    </tr>
                    
                            </thead>
           
                        </tbody>
                        
                     <?php 
                      
                     foreach($products as $Item) : ?>
                    <tr>
                    
                    
                    <td> 
                        <img src="../<?= $Item['image']; ?>" style="width:70px;height:70px;"alt="img">
                    </td>
                    <td> <?= $Item['name'] ?></td>
                    <td> <?= $Item['supplier'] ?></td>
                    <td> <?= $Item['quantity'] ?></td>
                    <td> <?= $Item['cost'] ?></td>
                    <td> <?= $Item['price'] ?></td>
                   
                    
                       
                      
                       
                        
                    </tr>
                    <?php endforeach; ?>
              </tbody>
            </table>
        </div>
        <?php 
            }
            else
            {
                 
            ?>
            <h4 class="md-4">No Record Found</td>
                         
           <?php
            }
             ?>
    </div>
 </div>

</div>

<div class="col-xl-4">
<div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;text-align:center;"><b> Categories.</b>
</h2>
    </div>
    <div class="card-body">
        <?php //alertMessage(); ?>
        <?php
                        $category = getAll('category');
                        if(!$category){
                            echo'<h4>something went wrong</h4>';
                            return false;
                        }
                        if(mysqli_num_rows($category) > 0)
                        {
                        ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="color:orangered;">
                    <th>Id</th>
                        <th>Name</th>
                       
                        <th>Status</th>
                        
                       
                    </tr>
                    
                            </thead>
           
                        </tbody>
                        
                     <?php 
                      $i=1;
                     foreach($category as $items) : ?>
                    <tr>
                    
                    <td><?=$i++  ?></td>
                                        <td><?=$items['name']; ?></td>
                                       
                                         <td>
                                        <?php
                                        if($items['status'] ==1){
                                            echo'<span class="badge bg-danger">Hidden</span>';
                                        }else{
                                            echo'<span class="badge bg-primary">Visible</span>';
                                        }
                                        ?>
                                        </td>
                   
                    
                       
                        
                    </tr>
                    <?php endforeach; ?>
              </tbody>
            </table>
        </div>
        <?php 
            }
            else
            {
                 
            ?>
            <h4 class="md-4">No Record Found</td>
                         
           <?php
            }
             ?>
    </div>
 </div>

</div>
    
    
   
  
<?php include('includes/footer.php');?>