<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h4 class="mb-0"style="color:orangered;"><b>Edit Category</b>
        <a href="categories.php" class="btn btn-danger float-end">Back</a>
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
            $paramValue = checkParamId('id');
            if(!is_numeric($paramValue)){
                echo '<h5> Id is not an Integar</h5>';
                return false;
            }
            $category = getById('category', $paramValue);
            if($category)
            {
                if($category['status'] == 200)
                
                {
                
                    ?>
      <input type="hidden" name="categoryId" value="<?= $category['data']['id']; ?>">

    <div class="row">
       <div class="col-md-12 mb-3">
      <label for="">Name *</label>
      <input type="text" name="name" value="<?= $category['data']['name']; ?>" required class="form-control"/>
       </div>
       <div class="col-md-12 mb-3">
      <label for="">Description *</label>
      <textarea name="description" value="<?= $category['data']['description']; ?>" class="form-control" rows="3"></textarea>
       </div>
       <div class="col-md-6">
        <label>status(Unchecked=Visible, Checked=Hidden)</label>
        <br>
        <input type="checkbox" name="status" <?= $category['data']['status'] == true ? 'checked':''; ?>style="width:30px;height:30px;">
       </div>


       <div class="col-md-6 mb-3 text-end">
       <br>
        <button type="submit" name="updateCategory" class="btn "style="background:orangered;color:white;">Update Category</button>
       </div>
    </div>
    <?php
    }
    else
    {
       // echo '<h5>'.$category['message'].'</h5>';

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