<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;"><b>Add Customer
        </b><a href="customers.php" class="btn btn-info float-end"style="color:white;">Back</a>
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
       <form action="code.php" method="POST">
    <div class="row">
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;" class="fas fa-user"></i><b> Name </b><span style="color:red;">*</span></label>
      <input type="text" name="name" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;" class="fas fa-envelope"></i><b>  Email  Id</b></label>
      <input type="email" name="email" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;"  class="fas fa-phone"></i><b> Phone </b><span style="color:red;">*</span></label>
      <input type="number" name="phone" required class="form-control"/>
       </div> 
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;"  class="fas fa-user-secret"></i><b> PIN </b></label>
      <input type="pin" name="pin" required class="form-control"/>
       </div> 
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;"  class="fas fa-bank"></i><b> Company </b></label>
      <input type="text" name="company" required class="form-control"/>
       </div>
       
       <div class="col-md-6">
        <label  ><b>status(Unchecked=Visible, Checked=Hidden)</b></label>
        <br>
        <input type="checkbox" name="status" style="width:30px;height:30px;">
       </div>


       <div class="col-md-12 mb-3 text-end">
       <br>
        <button type="submit" name="saveCustomer" class="btn "style="background:orangered;color:white"><i class="fas fa-save"></i> Save Customer</button>
       </div>
    </div>
    <h6 class="col-md-11 mb-3 text-end"style="color:orangered;">N/B:Do not submit confidential information such as credit card details, mobile and ATM PINs,etc.Report Abuse</h6>
     <h6 class="col-md-7 mb-3 text-end">Powered By<img src="assets/img/tosscoin (s)c.png" width="180px"></h6>

       </form>
        
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>