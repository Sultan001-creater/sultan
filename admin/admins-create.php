<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h4 class="mb-0"style="color:orangered;"><i style="color:orangered;" class="fa fa-user-secret" aria-hidden="true"></i><b> Add Admin/Stuff
        </b><a href="admins.php" class="btn btn-info float-end"style="color:white;">Back</a>
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
       <form action="code.php" method="POST">
    <div class="row ">
   
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;" class="fas fa-user"></i><b> Name </b><span style="color:orangered;"><b>*</b></span></label>
      <input  type="text" name="name" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><i style="color:#C62300;"  class="fas fa-id-card"></i><b> National ID</b> <span style="color:orangered;"><b>*</b></span></label>
      <input type="number" name="national_id" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;" class="fas fa-envelope"></i><b> Email </b><span style="color:orangered;"><b>*</b></span></label>
      <input type="email" name="email" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;" class="fa fa-user-secret" aria-hidden="true"></i><b> Password </b><span style="color:orangered;"><b>*</b></span></label>
      <input type="password" name="password" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><i style="color:#C62300;" class="fas fa-phone"></i><b> Phone Number</b> <span style="color:orangered;"><b>*</b></span></label>
      <input type="number" name="phone" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label ><b>Select Position</b><span style="color:red;">*</span></label>
      <select name="positions" class="form-select myselect2">
        <option value="">---Select Position--- </option>
        <?php 
        $positions = getAll('positions');
        if($positions){
            if(mysqli_num_rows($positions) > 0)
            {
                foreach($positions as $posiItem){
                    echo '<option  value="'. $posiItem['name'].'">'. $posiItem['name'].'</option>';
                }
            }else
            {
                echo' <option value="">No Categories Found</option>';
            }
        }else{
            echo' <option value="">Something went wrong</option>';

        }
        ?>

      </select>
    </div>
       <div class="col-md-3 mb-3">
      <label for="" ><i style="color:#C62300;" class="fa fa-window-close"></i><b> Is Ban</b> </label>
      <br>
      <input type="checkbox" name="is_ban" style="width:30px;height:30px"/>
       </div>
       <div class="col-md-12 mb-3 text-end">
        <button type="submit" name="saveAdmin" class="btn "style="background:orangered;color:white;"><i class="fas fa-save"></i><b> Save Admin</b></button>
       </div>
    </div>
    <h6 class="col-md-11 mb-3 text-end"style="color:orangered;">N/B:Do not submit confidential information such as credit card details, mobile and ATM PINs,etc.Report Abuse</h6>
     <h6 class="col-md-7 mb-3 text-end">Powered By<img src="assets/img/tosscoin (s)c.png" width="180px"></h6>

       </form>
        
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>