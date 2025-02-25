

<?php include('includes/header.php');?>
<div class="container-fluid px-4">
<div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;"><b>Our Categories List.
        </b><a href="categories-create.php" class="btn  float-end"style="background:orangered;color:white;">Add Category</a>
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
                        <th>Action</th>
                       
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
                                       
                      <td>
                      <a href="categories-edit.php?id=<?=$items['id'];?>"class="btn btn-warning btn-bg"><i class="fas fa-edit"></i> Edit</a>
                        <a href="categories-delete.php?id=<?=$items['id'];?>"
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