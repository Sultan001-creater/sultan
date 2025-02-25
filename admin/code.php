<?php
 include('../config/function.php'); 

if(isset($_POST['saveAdmin']))
{
    $name = validate($_POST['name']);
    $national_id = validate($_POST['national_id']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $positions = validate($_POST['positions']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) ==true ? 1:0;
    //validate($_POST['is_ban']) :0;

    if($name !=''&& $email !=''&& $password !=''){
        $nameCheck = mysqli_query($conn,"SELECT * FROM admins WHERE name='$name'");
        if($nameCheck){
          if(mysqli_num_rows($nameCheck) > 0){
            alert('danger','Username already exists!');
            header('Location:admins-create.php');
            die();
           // redirect('admins-create.php','Username already exists!');
        }
    }
        $emailCheck = mysqli_query($conn,"SELECT * FROM admins WHERE email='$email'");
        if($emailCheck){
          if(mysqli_num_rows($emailCheck) > 0){
            alert('danger','Email already exists!');
            header('Location:admins-create.php');
            die();
           // redirect('admins-create.php','Email already exists!');
        }
    }
    $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
    
    
    $data =[
        'name' => $name,
        'national_id' => $national_id,
        'email' => $email,
        'password'=> $bcrypt_password,
        'positions' => $positions,
        'phone' => $phone,
        'is_ban' => $is_ban,
           ];
        $result = insert('admins', $data);
        if($result)
        {
            alert('success','admin created successfully');
            header('Location:admins.php');
            die();
            //redirect('admins.php','admin created successfully');
           
        }
        else
        {
            alert('danger','Something went wrong!');
            header('Location:admins-create.php');
            die();
            //redirect('admins-create.php','Something went wrong!'); 
        }
    }
    else
    {
        alert('warning','Please fill required fields');
        header('Location:admins-create.php');
        die();
        //redirect('admins-create.php','Please fill required fields');
    }
}
if(isset($_POST['updateAdmin']))
{
    $adminId = validate($_POST['adminId']);
    $adminData = getById('admins',$adminId);
    if($adminData['status'] != 200){
        alert('warning','Please fill required fields');
        header('Location:admins-edit.php?id='.$adminId);
        die();
        //redirect('admins-edit.php?id='.$adminId,'Please fill required fields'); 
    }
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $positions = validate($_POST['positions']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) ==true ? 1:0;
    //validate($_POST['is_ban']):0;

    $nameCheckQuery = "SELECT * FROM `admins` WHERE name = '$name' and id!='$adminId'";
    $checkResult = mysqli_query($conn, $nameCheckQuery);
    if($checkResult){
        if(mysqli_num_rows($checkResult) > 0){
            alert('danger','Username Already Exists!');
            header('Location:admins-edit.php?id='.$adminId);
            die();
            //redirect('admin-edit.php?id='.$adminId,'Username Already Exists');
        }
    }
    $emailCheckQuery = "SELECT * FROM `admins` WHERE email = '$email' and id!='$adminId'";
    $checkResult = mysqli_query($conn, $emailCheckQuery);
    if($checkResult){
        if(mysqli_num_rows($checkResult) > 0){
            alert('danger','Email Already Exists!');
            header('Location:admins-edit.php?id='.$adminId);
            die();
            //redirect('admins-edit.php?id='.$adminId,'Email Already Exists');
        }
    }


    if($password != ''){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    }else{
        $hashedPassword = $adminData['data']['password'];
    }
    if($name !=''&& $email !='')
   {
$data=[
    
    'name' => $name,
    'email' => $email,
    'password'=> $hashedPassword,
    'positions' => $positions,
    'phone' => $phone,
    'is_ban' => $is_ban
     ];
    $result = update('admins', $adminId, $data);
    if($result){
        alert('success','Admin Updated Successfully');
            header('Location:admins.php?id='.$adminId);
            die();
        //redirect('admins.php?id='.$adminId,'Admin Updated Successfully'); 
    }
    else
    {
        alert('danger','Something went wrong!');
            header('Location:admins-edit.php?id='.$adminId);
            die();
        //redirect('admins-edit.php?id='.$adminId,'Something went wrong!'); 
    }
}
}
if(isset($_POST['saveSuppliers']))
{
    $name = validate($_POST['name']);
    $contacts = validate($_POST['contacts']);
    $location = validate($_POST['location']);
    $email = validate($_POST['email']);
    $address = validate($_POST['address']);
    $pin = validate($_POST['pin']);
    $sales_rep = validate($_POST['sales_rep']);
   
    

    if($name !=''&& $email !=''){
        $emailCheck = mysqli_query($conn,"SELECT * FROM suppliers WHERE email='$email'");
        if($emailCheck){
          if(mysqli_num_rows($emailCheck) > 0){
            alert('danger','Email already exists!');
            header('Location:suppliers-create.php');
            die();
           // redirect('suppliers-create.php','Email already exists!');
        }
    }
    
    
    
    $data =[
        'name' => $name,
        'contacts' => $contacts,
        'location' => $location,
        'email'=> $email,
        'address' => $address,
        'pin' => $pin,
        'sales_rep' => $sales_rep,
           ];
        $result = insert('suppliers', $data);
        if($result)
        {
            alert('success','Supplier created successfully');
            header('Location:suppliers.php');
            die();
            //redirect('suppliers.php','Supplier created successfully');
           
        }
        else
        {
            alert('danger','Something went wrong!');
            header('Location:suppliers-create.php');
            die();
           // redirect('suppliers-create.php','Something went wrong!'); 
        }
    }
    else
    {
        alert('warning','Please fill required fields');
        header('Location:suppliers-create.php');
        die();
        //redirect('suppliers-create.php','Please fill required fields');
    }
}
if(isset($_POST['saveCategory']))
{
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status']) ==true ? 1:0;

    $data =[
        'name' => $name,
        'description ' => $description ,
        'status' => $status
           ];
        $result = insert('category', $data);
        if($result)
        {
            alert('success','Category created successfully');
            header('Location:categories.php');
            die();
           // redirect('categories.php','Category created successfully');
           
        }
        else
        {
            alert('danger','Something went wrong!');
            header('Location:categories-create.php');
            die();
            //redirect('categories-create.php','Something went wrong!'); 
        }
}
if(isset($_POST['updateSuppliers']))
{
    $supplierId = validate($_POST['supplierId']);
    $supplierData = getById('suppliers',$supplierId);
    if(!$supplierData){
        alert('danger','No Such Supplier Found!');
        header('Location:suppliers.php?id='.$supplierId);
        die();
    //redirect('suppliers.php?id='.$supplierId,'No Such Supplier Found!'); 
    }

    $name = validate($_POST['name']);
    $contacts = validate($_POST['contacts']);
    $location = validate($_POST['location']);
    $email = validate($_POST['email']);
    $address = validate($_POST['address']);
    $pin = validate($_POST['pin']);
    $sales_rep = validate($_POST['sales_rep']);
   

    $data =[
        'name' => $name,
        'contacts ' => $contacts ,
        'location' => $location,
        'email' => $email,
        'address' => $address,
        'pin' => $pin,
        'sales_rep' => $sales_rep
           ];
        $result = update('suppliers', $supplierId, $data);
        if($result)
        {
            alert('success','supplier updated successfully');
            header('Location:suppliers.php?id='.$supplierId);
            die();
           // redirect('suppliers.php?id='.$supplierId,'supplier updated successfully');
           
        }
        else
        {
            alert('danger','Something went wrong!');
            header('Location:suppliers-edit.php?id='.$supplierId);
            die();
          // redirect('suppliers-edit.php?id='.$supplierId,'Something went wrong!'); 
        }

    }
if(isset($_POST['updateCategory']))
{
    $categoryId = validate($_POST['categoryId']);
    $categoryData = getById('products',$categoryId);
    if(!$categoryData){
        alert('danger','No Such Product Found!');
            header('Location:products.php?id='.$categoryId);
            die();
    //redirect('products.php?id='.$categoryId,'No Such Product Found!'); 
    }

    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status']) ==true ? 1:0;

    $data =[
        'name' => $name,
        'description ' => $description ,
        'status' => $status
           ];
        $result = update('category', $categoryId, $data);
        if($result)
        {
            alert('success','Category updated successfully');
            header('Location:categories.php?id='.$categoryId);
            die();
           // redirect('categories.php?id='.$categoryId,'Category updated successfully');
           
        }
        else
        {
            alert('danger','Something went wrong!');
            header('Location:categories-edit.php?id='.$categoryId);
            die();
           // redirect('categories-edit.php?id='.$categoryId,'Something went wrong!'); 
        }

    }
    if(isset($_POST['savePosition']))
    {
        $name = validate($_POST['name']);
        $description = validate($_POST['description']);
       
    
        $data =[
            'name' => $name,
            'description' => $description 
           
               ];
            $result = insert('positions', $data);
            if($result)
            {
                alert('success','Position created successfully');
            header('Location:positions.php');
            die();
               // redirect('positions.php','Position created successfully');
               
            }
            else
            {
                alert('danger','Something went wrong!');
            header('Location:positions-create.php');
            die();
                //redirect('positions-create.php','Something went wrong!'); 
            }
    }
    if(isset($_POST['updatePosition']))
    {
    $positionId = validate($_POST['positionId']);
    $positionData = getById('positions',$positionId);
    if(!$positionData){
        alert('danger','No Such Position Found!');
        header('Location:positions.php?id='.$positionId);
        die();
    //redirect('positions.php?id='.$positionId,'No Such Position Found!'); 
    }
        $name = validate($_POST['name']);
        $description = validate($_POST['description']);
       
    
        $data =[
            'name' => $name,
            'description ' => $description 
           
               ];
            $result = update('positions', $positionId , $data);
            if($result)
            {
                alert('success','Position updated successfully');
                header('Location:positions.php?id='.$positionId);
                die();
                //redirect('positions.php?id='.$positionId,'Position updated successfully');
               
            }
            else
            {
                alert('danger','Something went wrong!');
                header('Location:positions-update.php?id='.$positionId);
                die();
                //redirect('positions-update.php?id='.$positionId,'Something went wrong!'); 
            }
    }
    if(isset($_POST['saveProduct']))
    {
       
    
        $category_id = validate($_POST['category_id']);
        $supplier = validate($_POST['supplier']);
        $name = validate($_POST['name']);
        $description = validate($_POST['description']);
        $cost = validate($_POST['cost']);
        $price = validate($_POST['price']);
        $quantity = validate($_POST['quantity']);
        $cartons = validate($_POST['cartons']);
        $status = isset($_POST['status']) ==true ? 1:0;

        if($_FILES['image']['size'] > 0)
        {
            $path ='../assets/uploads/products/';
            $image_ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

            $filename = time().'.'.$image_ext;

            move_uploaded_file($_FILES['image']['tmp_name'],$path."/".$filename);
            $finalImage = "assets/uploads/products/".$filename;

        }else{
            $finalImage = '';
        }
    
        $data =[
            'category_id' => $category_id,
            'supplier' => $supplier,
            'name' => $name,
            'description ' => $description ,
            'cost' => $cost,
            'price' => $price,
            'quantity' => $quantity,
            'cartons' => $cartons,
            'image' => $finalImage,
            'status' => $status
               ];
            $result = insert('products', $data);
            if($result)
            {
                alert('success','Product Added successfully!');
                header('Location:products.php');
                die();
                //redirect('products.php','Product Added successfully!');
               
            }
            else
            {
                alert('danger','Something went wrong!');
                header('Location:products-create.php');
                die();
                //redirect('products-create.php','Something went wrong!'); 
            }
    
        }
        if(isset($_POST['updateProduct']))
    {
       
        $product_id = validate($_POST['product_id']);
        $productData = getById('products',$product_id);
        if(!$productData){
            alert('danger','No Such Product Found!');
                header('Location:products.php?id='.$product_id);
                die();
        //redirect('products.php?id='.$product_id,'No Such Product Found!'); 
        }
        $category_id = validate($_POST['category_id']);
        $supplier = validate($_POST['supplier']);
        $name = validate($_POST['name']);
        $description = validate($_POST['description']);
        $cost = validate($_POST['cost']);
        $price = validate($_POST['price']);
        $quantity = validate($_POST['quantity']);
        $cartons = validate($_POST['cartons']);
        $status = isset($_POST['status']) ==true ? 1:0;

        if($_FILES['image']['size'] > 0)
        {
            $path ='../assets/uploads/products/';
            $image_ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

            $filename = time().'.'.$image_ext;

            move_uploaded_file($_FILES['image']['tmp_name'],$path."/".$filename);
            $finalImage = "assets/uploads/products/".$filename;

            $deleteImage = "../".$productData['data']['image'];
            if(file_exists($deleteImage))
            {
                unlink($deleteImage);
            }

        }else{
            $finalImage = $productData['data']['image'];
        }
    
        $data =[
            'category_id' => $category_id,
            'supplier' => $supplier,
            'name' => $name,
            'description ' => $description ,
            'cost' => $cost,
            'price' => $price,
            'quantity' => $quantity,
            'cartons' => $cartons,
            'image' => $finalImage,
            'status' => $status
               ];
            $result = update('products', $product_id, $data);
            if($result)
            {
                alert('success','Product Updated successfully');
                header('Location:products.php?id='.$product_id);
                die();
                //redirect('products.php?id='.$product_id,'Product Updated successfully!');
               
            }
            else
            {
                alert('danger','Something went wrong!');
                header('Location:products-edit.php?id='.$product_id);
                die();
                //redirect('products-edit.php?id='.$product_id,'Something went wrong!'); 
            }
    
        }
        if(isset($_POST['saveCustomer']))
{
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $pin = validate($_POST['pin']);
    $company = validate($_POST['company']);
    $status = isset($_POST['status']) ? 1:0;

    if($name != '')
    {
        $emailCheck = mysqli_query($conn,"SELECT * FROM customers WHERE email ='$email'");
        if( $emailCheck){
            if(mysqli_num_rows($emailCheck) > 0){
                alert('danger','Email already Exists');
                header('Location:customers.php');
                die();
                //redirect('customers.php','Email already Exists');

            }

        }
        $data =[
            
            'name' => $name,
            'email ' => $email,
            'phone' => $phone,
            'pin' => $pin,
            'company' => $company,
            'status' => $status
               ];
            $result = insert('customers', $data);
            if($result)
            {
                alert('success','Customer Added successfully');
                header('Location:customers.php');
                die();
                //redirect('customers.php','Customer Added successfully!');
               
            }
            else
            {
                alert('danger','Something went wrong!');
                header('Location:customers-create.php');
                die();
                //redirect('customers-create.php','Something went wrong!'); 
            }
    
    }
    else
    {
        alert('warning','Please fill require field!');
                header('Location:customers.php');
                die();
        //redirect('customers.php','Please fill require field');
    }
    }
  if(isset($_POST['updateCustomer']))
{
    $customerId = validate($_POST['customerId']);
    $customerData = getById('customers',$customerId);
    if($customerData['status'] != 200){
        alert('warning','Please fill require field!');
        header('Location:customers-edit.php?id='.$customerId);
        die();
        //redirect('customers-edit.php?id='.$customerId,'Please fill required fields'); 
    }
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $pin = validate($_POST['pin']);
    $company = validate($_POST['company']);
    $status = isset($_POST['status']) ? 1:0;

    if($name != '')
    {
        $emailCheck = mysqli_query($conn,"SELECT * FROM customers WHERE email ='$email'and id!='$customerId'");
        if( $emailCheck){
            if(mysqli_num_rows($emailCheck) > 0){
                alert('danger','Email already Exists');
                header('Location:customers.php?id='.$customerId);
                die();
                //redirect('customers.php?id='.$customerId,'Email already Exists');

            }

        }
        $data =[
            
            'name' => $name,
            'email ' => $email,
            'phone' => $phone,
            'pin' => $pin,
            'company' => $company,
            'status' => $status
               ];
            $result = update('customers', $customerId, $data);
            if($result)
            {
                alert('success','Customer Updated successfully!');
                header('Location:customers.php?id='.$customerId);
                die();
                //redirect('customers.php?id='.$customerId,'Customer Updated successfully!');
               
            }
            else
            {
                alert('danger','Something went wrong!');
                header('Location:customers-create.php?id='.$customerId);
                die();
                //redirect('customers-create.php?id='.$customerId,'Something went wrong!'); 
            }
    
    }
    else
    {
        alert('warning','Please fill require field');
                header('Location:customers.php?id='.$customerId);
                die();
        //redirect('customers.php?id='.$customerId,'Please fill require field');
    }
}
       
//Order-code
if(!isset($_SESSION['productItems'])){
    $_SESSION['productItems'] = [];
}
if(!isset($_SESSION['productItemIds'])){
    $_SESSION['productItemIds'] = [];
}

if(isset($_POST['addItem']))
{
    $productId = validate($_POST['product_id']);
    $quantity = validate($_POST['quantity']);

    $checkProduct = mysqli_query($conn,"SELECT * FROM `products` WHERE id = '$productId'LIMIT 1")
     or die(mysqli_error($conn));
    if($checkProduct){
        if(mysqli_num_rows($checkProduct) > 0){
            $row = mysqli_fetch_assoc($checkProduct);
            if($row['quantity'] < $quantity){
                alert('info','Only'.$row['quantity'].' available!');
                header('Location:customers.orders-create.php');
                die();
                //redirect('orders-create.php','Only'.$row['quantity'].' available!'); 
            }

            $productData =[
                'product_id' => $row['id'],
                'name' => $row['name'],
                'image' => $row['image'],
                
                'price' => $row['price'],
                'quantity' => $quantity,

            ];
            if(!in_array($row['id'],$_SESSION['productItemIds'])){
            array_push($_SESSION['productItemIds'],$row['id']);
            array_push($_SESSION['productItems'],$productData);


            }else{
                foreach($_SESSION['productItems'] as $key =>$prodSessionItem){
                    if($prodSessionItem['product_id'] == $row['id']){
                        $newQuantity = $prodSessionItem['quantity'] + $quantity;

                        $productData =[
                            'product_id' => $row['id'],
                            'name' => $row['name'],
                            'image' => $row['image'],
                            
                            'price' => $row['price'],
                            'quantity' => $newQuantity,
            
                        ];
                        $_SESSION['productItems'][$key] =  $productData;
                    }

                }

            }
            



        }else{
            alert('danger','Item Added'.$row['name']);
                header('Location:customers.orders-create.php');
                die();
           // redirect('orders-create.php','Item Added'.$row['name']); 
        }
    }else{
        alert('danger','Something Went Wrong!');
                header('Location:customers.orders-create.php');
                die();
        //redirect('orders-create.php','Something Went Wrong!');
    }
}
        
         

 ?>