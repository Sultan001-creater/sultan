

<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;"><b>Our Products.
        </b><a href="products-create.php" class="btn  float-end"style="background:orangered;color:white;">Add Product</a>
</h2>
    </div>
    <div class="card-body">
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
   
                       <!-- </div>-->
                    
        <?php //alertMessage(); ?>
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
