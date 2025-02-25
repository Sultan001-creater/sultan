<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h4 class="mb-0"style="color:orangered;"><i style="color:orangered;" class="fa fa-user-secret" aria-hidden="true"></i><b> Add Suppliers
        </b><a href="suppliers.php" class="btn btn-info float-end"style="color:white;">Back</a>
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
      <label for="" ><i style="color:#C62300;" class="fas fa-user"></i><b> Company Name </b><span style="color:orangered;"><b>*</b></span></label>
      <input  type="text" name="name" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;" class="fas fa-user"></i><b> Contacts </b><span style="color:orangered;"><b>*</b></span></label>
      <input  type="number" name="contacts" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><i style="color:#C62300;"  class="fas fa-id-card"></i><b> Location</b> <span style="color:orangered;"><b>*</b></span></label>
      <input type="location" name="location" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;" class="fas fa-envelope"></i><b> Email </b><span style="color:orangered;"><b>*</b></span></label>
      <input type="email" name="email" required class="form-control"/>
       </div>
      
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;" class="fa fa-user-secret" aria-hidden="true"></i><b> Address </b><span style="color:orangered;"><b>*</b></span></label>
      <input type="address" name="address" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><i style="color:#C62300;" class="fas fa-phone"></i><b> KRA PIN</b> <span style="color:orangered;"><b>*</b></span></label>
      <input type="pin" name="pin" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><i style="color:#C62300;" class="fas fa-phone"></i><b> Sales Rep</b> <span style="color:orangered;"><b>*</b></span></label>
      <input type="sales_rep" name="sales_rep"  class="form-control"/>
       </div>
      
      
       <div class="col-md-12 mb-3 text-end">
        <button type="submit" name="saveSuppliers" class="btn "style="background:orangered;color:white;"><i class="fas fa-save"></i><b> Save Supplier</b></button>
       </div>
    </div>
    <h6 class="col-md-11 mb-3 text-end"style="color:orangered;">N/B:Do not submit confidential information such as credit card details, mobile and ATM PINs,etc.Report Abuse</h6>
     <h6 class="col-md-7 mb-3 text-end">Powered By<img src="assets/img/tosscoin (s)c.png" width="180px"></h6>

       </form>
        
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>