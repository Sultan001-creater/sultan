
<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;"><b>Our Suppliers.
        </b><a href="suppliers-create.php" class="btn  float-end"style="background:orangered;color:white;">Add Supplier</a>
</h2>
    </div>
    <div class="card-body">
        <?php //alertMessage(); ?>
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
        <?php
                        $suppliers = getAll('suppliers');
                        if(! $suppliers){
                            echo'<h4>something went wrong</h4>';
                            return false;
                        }
                        if(mysqli_num_rows( $suppliers) > 0)
                        {
                        ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="color:orangered;">
                        <th>Id</th>
                        <th>Company Name</th>
                        <th>Contact</th>                      
                        <th>E-mail</th>                      
                        <th>KRA Pin</th>
                        <th>sales rep</th>
                        <th>Actions</th>

                       
                    </tr>
                    
                            </thead>
           
                        </tbody>
                        
                     <?php 
                      $i=1;
                     foreach( $suppliers as $Item) : ?>
                    <tr>
                    
                        <td> <?= $i++ ?></td>
                        <td> <?= $Item['name'] ?></td>
                        <td > <?= $Item['contacts'] ?></td>                       
                        <td > <?= $Item['email'] ?></td>                       
                        <td > <?= $Item['pin'] ?></td>
                        <td > <?= $Item['sales_rep'] ?></td>
                        
                       
                      <td>
                      <a href="suppliers-edit.php?id=<?=$Item['id'];?>"class="btn btn-warning btn-bg"><i class="fas fa-edit"></i> Edit</a>
                        <a href="suppliers-delete.php?id=<?=$Item['id'];?>"
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