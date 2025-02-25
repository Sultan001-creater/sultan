

<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h4 class="mb-0"style="color:orangered;"><i style="color:#C62300;" class="fas fa-users"></i><b> Admins/Staff
        </b><a href="admins-create.php" class="btn  float-end"style="background:orangered;color:white;"><i class="fas fa-user"></i> Add admin</a>
</h4>
    </div>
    <div class="card-body">
        <?php //alertMessage(); ?>
        <?php
                        $admins = getAll('admins');
                        if(!$admins){
                            echo'<h4>something went wrong</h4>';
                            return false;
                        }
                        if(mysqli_num_rows($admins) > 0)
                        {
                        ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="color:orangered;">
                       
                        <th >Name</th>
                        <th >National ID</th>
                        <th >Phone No</th>
                        <th >Email</th>
                        
                       
                        <th >Position</th>
                        <th >Action</th>

                        
                       
                    </tr>
                    
                            </thead>
           
                        </tbody>
                        
                     <?php 
                     
                     
                     foreach($admins as $adminItem) : ?>
                      
                    <tr >
                
                       
                        <td> <?= $adminItem['name'] ?></td>
                        <td> <?= $adminItem['national_id'] ?></td>
                        <td> <?= $adminItem['phone'] ?></td>
                        <td> <?= $adminItem['email'] ?></td>
                       
                        
                        <td> <?= $adminItem['positions'] ?></td>
                        <td>
                        <a href="admins-edit.php?id=<?= $adminItem['id']  ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <a href="admins-delete.php?id=<?=$adminItem['id'];?>"
                         class="btn btn-danger btn-sm"
                         onclick="return confirm('Are you sure you want to delete this Stuff')"
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