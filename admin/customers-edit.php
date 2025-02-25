<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h4 class="mb-0"style="color:orangered;">
        <i style="color:orangered;" class="fa fa-user-secret" aria-hidden="true"></i><b> Update Customer
        </b><a href="customers.php" class="btn btn-info float-end"style="color:white;">Back</a>
</h4>
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

       <?php
       if(isset($_GET['id']))
       {
        if($_GET['id'] !=''){
            $customerId = $_GET['id'];

        }
        else
        {
            echo '<h5>No id Found</h5>';
            return false;
        }
       }
       else
       {
        echo '<h5>No id Given In Url</h5>';
            return false;
       }
      $customerData = getById('customers',$customerId);
       if($customerData)
       {
        if($customerData['status'] == 200)
        {
            ?>
            <input type="hidden" name="customerId" value="<?= $customerData['data']['id']; ?>">
            <div class="row">
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;" class="fas fa-user"></i><b> Name </b><span style="color:red;">*</span></label>
      <input type="text" name="name" required value="<?= $customerData['data']['name']; ?>" class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;" class="fas fa-envelope"></i><b>  Email  Id</b></label>
      <input type="email" name="email" required value="<?= $customerData['data']['email']; ?>" class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;"  class="fas fa-phone"></i><b> Phone </b><span style="color:red;">*</span></label>
      <input type="number" name="phone" required value="<?= $customerData['data']['phone']; ?>" class="form-control"/>
       </div> 
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;"  class="fas fa-user-secret"></i><b> PIN </b></label>
      <input type="pin" name="pin" required value="<?= $customerData['data']['pin']; ?>" class="form-control"/>
       </div> 
       <div class="col-md-6 mb-3">
      <label for="" ><i style="color:#C62300;"  class="fas fa-bank"></i><b> Company </b></label>
      <input type="text" name="company" required value="<?= $customerData['data']['company']; ?>" class="form-control"/>
       </div>
       
       <div class="col-md-6">
        <label  ><b>status(Unchecked=Visible, Checked=Hidden)</b></label>
        <br>
        <input type="checkbox" name="status" <?= $customerData['data']['status'] == true ? 'checked':''; ?> style="width:30px;height:30px;">
       </div>


       <div class="col-md-12 mb-3 text-end">
       <br>
        <button type="submit" name="updateCustomer" class="btn "style="background:orangered;color:white"> Update Customer</button>
       </div>
    </div>
    <h6 class="col-md-11 mb-3 text-end"style="color:orangered;">N/B:Do not submit confidential information such as credit card details, mobile and ATM PINs,etc.Report Abuse</h6>
     <h6 class="col-md-7 mb-3 text-end">Powered By<img src="assets/img/tosscoin (s)c.png" width="180px"></h6>


        <?php
        }
        else
        {
            echo '<h5>'.$customerData['message'].'</h5>';
           
        }
       }
       else
       {
        echo '<h5>something Went Wrong!</h5>';
        return false;
       }
       ?>
   
       </form>
        
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>