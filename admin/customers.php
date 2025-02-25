
<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;"><b>Customers
        </b><a href="customers-create.php" class="btn  float-end"style="background:orangered;color:white;">Add Customer</a>
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
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">

                <thead>
                <tr style="color:orangered;">
                        <th>Id</th>
                        <th>Name</th>                     
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Pin</th>
                        <th>Status</th>
                        <th>Action</th>
                       
                    </tr>
                    
                    
                            </thead>
           
                        </tbody>
                        
                     <?php 

                     if(isset($_GET['search']))
                     {
                        $filterValues =$_GET['search'];
                        $query ="SELECT * FROM customers WHERE CONCAT(name,email,phone,pin,status) LIKE'%$filterValues%'";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows( $query_run) > 0)
                        {
                            $i=1; foreach( $query_run as $Item)
                            {
                                ?>
                                 <tr>
                    
                    <td> <?= $i++ ?></td>
                    <td> <?= $Item['name'] ?></td>
                    <td> <?= $Item['email'] ?></td>
                    <td> <?= $Item['phone'] ?></td>
                    <td> <?= $Item['pin'] ?></td>

                    
                    <td>
                   <?php
                   if($Item['status'] ==1){
                    echo'<span class="badge bg-danger">Hidden</span>';
                   }else{
                    echo'<span class="badge bg-secondary">Visible</span>';
                   }
                   ?>
                  </td>
                  <td>
                    <a href="customers-edit.php?id=<?= $Item['id'];?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    <a href="customers-delete.php?id=<?= $Item['id'];?>"
                     class="btn btn-danger btn-sm"
                     onclick="return confirm('Are you sure you want to delete this Customer')"
                     ><i class="fas fa-trash"></i>
                     Delete</a>

                  </td>
                   
                    
                </tr>
                                   
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colpan="4">No Record Found</td>
                            </tr>
                            <?php
                       
                    }
                
                     }
                  ?>  
                 <?php// endforeach; ?>
                                    </tbody>
                                    </table>
                                    </div>     
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>




