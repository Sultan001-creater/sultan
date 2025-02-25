

<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;"><b>Our Products.
        </b><a href="products-create.php" class="btn  float-end"style="background:orangered;color:white;">Add Product</a>
</h2>
    </div>
    <div class="card-body">
    <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item active">OUR PARTNERS</li>
                        </ol>
    <div class="row ">
                       <!--<div class="card card-body shadow border-1 mb-4">-->
                       <table class="table table-bordered shadow ">
                        <tbody>
                            <tr>
                       <td>
                        <h4 style="font-size:23px; line-height:30px; margin-right:20px; padding:0;margin-top:0.5rem;"><img src="assets/img/SULTANK.png" width="140px"></img></h4>
                        
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
        <?php
                        $products = getAll('products');
                        if(! $products){
                            echo'<h4>something went wrong</h4>';
                            return false;
                        }
                        if(mysqli_num_rows( $products) > 0)
                        {
                        ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="color:orangered;">
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Supplier</th>
                        <th>Qty</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Action</th>
                       
                    </tr>
                    
                            </thead>
           
                        </tbody>
                        
                     <?php 
                      $i=1;
                     foreach( $products as $Item) : ?>
                    <tr>
                    
                        <td> <?= $i++ ?></td>
                        <td> 
                        <img src="../<?= $Item['image']; ?>" style="width:70px;height:70px;"alt="img">
                        </td>
                        <td> <?= $Item['name'] ?></td>
                        <td> <?= $Item['supplier'] ?></td>
                        <td> <?= $Item['quantity'] ?></td>
                        <td> <?= $Item['cost'] ?></td>
                        <td> <?= $Item['price'] ?></td>
                        
                        
                       
                      <td>
                      <a href="products-edit.php?id=<?=$Item['id'];?>"class="btn btn-warning btn-bg"><i class="fas fa-edit"></i> Edit</a>
                        <a href="products-delete.php?id=<?=$Item['id'];?>"
                         class="btn btn-danger btn-bg"
                         onclick="return confirm('Are you sure you want to delete this Category')"
                         ><i class="fas fa-trash"></i> Delete</a>

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
