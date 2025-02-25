<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h2 class="mb-0"style="color:orangered;"><b>Update Product
        </b> <a href="products.php" class="btn btn-info float-end"style="color:white;">Back</a>
</h2>
    </div>
    <div class="card-body">
        <?php alertMessage(); ?>
       <form action="code.php" method="POST" enctype ="multipart/form-data">
      
       <?php
            $paramValue = checkParamId('id');
            if(!is_numeric($paramValue)){
                echo '<h5> Id is not an Integar</h5>';
                return false;
            }
            $product = getById('products', $paramValue);
            if($product)
            {
                if($product['status'] == 200)
                
                {
                
                    ?>
        <input type="hidden" name="product_id" value="<?= $product['data']['id']; ?>">
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
                    ?>
                    <option
                        value="<?= $cateItem['id'];?>"
                        <?= $product['data']['category_id'] == $cateItem['id'] ? 'selected':'';?>>
                        <?= $cateItem['name'] ?>
                    </option>
                    <?php
                  
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
                    ?>
                    <option
                        value="<?= $suppItem['name'];?>"
                        <?= $product['data']['supplier'] == $suppItem['id'] ? 'selected':'';?>>
                        <?= $suppItem['name'] ?>
                    </option>
                    <?php
                  
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
      <label for="">Product Name *</label>
      <input type="text" name="name" required value="<?= $product['data']['name'];?>"class="form-control"/>
       </div>
       <div class="col-md-6 mb-3">
      <label for="">Description </label>
      <textarea name="description" value="<?= $product['data']['description'];?>"class="form-control" rows="3"></textarea>
       </div>
       <div class="col-md-2 mb-3">
      <label for="">Cost *</label>
      <input type="number" name="cost" required value="<?= $product['data']['cost'];?>" class="form-control"/>
       </div>
       <div class="col-md-2 mb-3">
      <label for="">Price *</label>
      <input type="number" name="price" required value="<?= $product['data']['price'];?>" class="form-control"/>
       </div>
       <div class="col-md-2 mb-3">
      <label for="">Quantity *</label>
      <input type="number" name="quantity" required value="<?= $product['data']['quantity'];?>" class="form-control"/>
       </div>
       <div class="col-md-4 mb-3">
      <label for="">Image *</label>
      <input type="file" name="image"  class="form-control"/>
      <img src="../<?= $product['data']['image'];?>"style="width:50px;height:50px;" alt="Img"/>
       </div>
       <div class="col-md-6">
        <label>status(Unchecked=Visible, Checked=Hidden)</label>
        <br>
        <input type="checkbox" name="status"<?= $product['data']['status']== true ? 'checked':'';?> style="width:30px;height:30px;">
       </div>




       <div class="col-md-12 mb-3 text-end">
       <br>
        <button type="submit" name="updateProduct" class="btn "style="background:orangered;color:white;"> update Product </button>
       </div>
    </div>
    <h6 class="col-md-9 mb-3 text-end"style="color:orangered;">N/B:To Update or Delete products in the future Please do so from the Database For now</h6>
     <h6 class="col-md-7 mb-3 text-end">Powered By<img src="assets/img/tosscoin (s)c.png" width="160px"></h6>
    
    <?php
    }
    else
    {
        echo '<h5>'.$productData['message'].'</h5>';

    }
}
else
{
    echo '<h5> Something went wrong!</h5>';
   return false;
   
}
?>
    
       </form>
        
    </div>
 </div>

</div>

<?php include('includes/footer.php');?>