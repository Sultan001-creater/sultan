<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;"><b>Create Positions
        </b><a href="positions.php" class="btn btn-info float-end"style="color:white;">Back</a>
</h2>
    </div>
    <div class="card-body">
        <?php alertMessage(); ?>
       <form action="code.php" method="POST">
    <div class="row">
       <div class="col-md-12 mb-3">
      <label for=""><b>Position </b><span style="color:red;">*</span></label>
      <input type="text" name="name" required class="form-control"/>
       </div>
       <div class="col-md-12 mb-3">
      <label for=""><b>Description </b><span style="color:red;">*</span></label>
      <textarea name="description" class="form-control" rows="3"></textarea>
       </div>
       


       <div class="col-md-6 mb-3 text-end">
       <br>
        <button type="submit" name="savePosition" class="btn "style="background:orangered;color:white;"> <i class="fas fa-save"></i> Save Position</button>
       </div>
    </div>
    <h6 class="col-md-9 mb-3 text-end"style="color:orangered;">N/B:To Update or Delete Category in the future Please do so from the Database For now</h6>
     <h6 class="col-md-7 mb-3 text-end">Powered By<img src="assets/img/tosscoin (s)c.png" width="160px"></h6>

       </form>
        
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>