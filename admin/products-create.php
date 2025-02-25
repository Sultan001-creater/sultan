<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;"><b>Add Product
        </b> <a href="products.php" class="btn btn-info float-end"style="color:white;">Back</a>
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
       <form action="code.php" method="POST" enctype ="multipart/form-data">
    <div class="row">
    <div class="col-md-6 mb-3">
      <label ><b>Select Category</b><span style="color:red;">*</span></label>
      <select name="category_id" class="form-select myselect2">
        <option value="">---Select category--- </option>
        <?php 
        $categories = getAll('category');
        if($categories){
            if(mysqli_num_rows($categories) > 0)
            {
                foreach($categories as $cateItem){
                    echo '<option  value="'. $cateItem['name'].'">'. $cateItem['name'].'</option>';
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
    <div class="col-md-6 mb-3">
      <label ><b>Select Supplier</b><span style="color:red;">*</span></label>
      <select name="supplier" class="form-select myselect2">
        <option value="">---Select Supplier--- </option>
        <?php 
        $suppliers = getAll('suppliers');
        if($suppliers){
            if(mysqli_num_rows($suppliers) > 0)
            {
                foreach($suppliers as $suppItem){
                    echo '<option  value="'. $suppItem['name'].'">'. $suppItem['name'].'</option>';
                }
            }else
            {
                echo' <option value="">No Supplier Found</option>';
            }
        }else{
            echo' <option value="">Something went wrong</option>';

        }
        ?>

      </select>
    </div>
       <div class="col-md-6 mb-3">
      <label for=""><b>Product Name </b><span style="color:red;">*</span></label>
      <input type="text" name="name" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><b>Description </b></label>
      <textarea name="description" class="form-control" rows="3"></textarea>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><b>Cost </b><span style="color:red;">*</span></label>
      <input type="number" name="cost" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><b>Price </b><span style="color:red;">*</span></label>
      <input type="number" name="price" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><b>Quantity </b><span style="color:red;">*</span></label>
      <input type="number" name="quantity" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><b>Cartons </b><span style="color:red;">*</span></label>
      <input type="text" name="cartons" required class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for=""><b>Image </b><span style="color:red;">*</span></label>
      <input type="file" name="image"  class="form-control"/>
       </div>
       <div class="col-md-6">
        <label ><b>status(Unchecked=Visible, Checked=Hidden)</b></label>
        <br>
        <input type="checkbox" name="status" style="width:30px;height:30px;">
       </div>


       <div class="col-md-12 mb-3 text-end">
       <br>
        <button type="submit" name="saveProduct" class="btn "style="background:orangered;color:white;"><i class="fas fa-save"></i> Save Product </button>
       </div>
    </div>
    <h6 class="col-md-9 mb-3 text-end"style="color:orangered;">N/B:To Update or Delete products in the future Please do so from the Database For now</h6>
     <h6 class="col-md-7 mb-3 text-end">Powered By<img src="assets/img/tosscoin (s)c.png" width="160px"></h6>

       </form>
        
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>