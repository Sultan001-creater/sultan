<?php

include('../config/function.php');

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
    $cartons = validate($_POST['cartons']);

    $checkProduct = mysqli_query($conn,"SELECT * FROM products WHERE id = '$productId'LIMIT 1")
     or die(mysqli_error($conn));
    if($checkProduct){
        if(mysqli_num_rows($checkProduct) > 0){
            $row = mysqli_fetch_assoc($checkProduct);
            if($row['quantity'] < $quantity){
                alert('info','Only' .$row ['quantity'] .$row['name'].' available In Store!');
                header('Location:orders-create.php');
                die();
                //redirect('orders-create.php','Only'. $row ['quantity']. $row['name'].' available In Store!'); 
            }

            $productData =[
                'product_id' => $row['id'],
                'name' => $row['name'],
                'image' => $row['image'],
                'price' => $row['price'],
                'quantity' => $quantity,
                'cartons' => $cartons,

            ];
            if(!in_array($row['id'],$_SESSION['productItemIds'])){
            array_push($_SESSION['productItemIds'],$row['id']);
            array_push($_SESSION['productItems'],$productData);


            }else{
                foreach($_SESSION['productItems'] as $key =>$prodSessionItem){
                    if($prodSessionItem['product_id'] == $row['id']){
                        $newQuantity = $prodSessionItem['quantity'] + $quantity;
                        $newcartons = $prodSessionItem['cartons'] + $cartons;


                        $productData =[
                            'product_id' => $row['id'],
                            'name' => $row['name'],
                            'image' => $row['image'],
                            'price' => $row['price'],
                            'quantity' => $newQuantity,
                            'cartons' => $newCartons,

            
                        ];
                        $_SESSION['productItems'][$key] =  $productData;
                    }

                }

            }
            

            alert('info',$row ['name']. ' Added  To Cart ');
            header('Location:orders-create.php');
            die();
            //redirect('orders-create.php',$row ['name']. ' Added  To Cart '); 
        }else{
            alert('info',$row ['name']. ' Added  To Cart ');
            header('Location:orders-create.php');
            die();
           // redirect('orders-create.php',$row ['name']. ' Added To Cart '); 
        }
    }else{
        alert('info','Something Went Wrong!');
            header('Location:orders-create.php');
            die();
       // redirect('orders-create.php','Something Went Wrong!');
    }
}

if(isset($_POST['productIncDec']))
{
    $productId = validate($_POST['product_id']);
    $quantity = validate($_POST['quantity']);
    $flag = false;
    foreach($_SESSION['productItems'] as $key => $item){
        if($item['product_id'] == $productId){
            $flag = true;
            $_SESSION['productItems'][$key]['quantity'] = $quantity;
        }

    }
    if($flag){
        jsonResponse(200,'success','Quantity Updated Successfully ');
    }else{
        jsonResponse(500,'error','Something Went Wrong. Please re_fresh');
    }
}

if(isset($_POST['proceedToPlaceBtn']))
{
    $phone = validate($_POST['cphone']);
    $payment_mode = validate($_POST['payment_mode']);
    $sales_rep = validate($_POST['sales_rep']);
    
    
    //checking for customer
    $checkCustomer = mysqli_query($conn, "SELECT * FROM customers WHERE phone ='$phone' LIMIT 1");
    if($checkCustomer){
        if(mysqli_num_rows($checkCustomer) > 0)  
        {
            $_SESSION['invoice_no'] = "INV-".rand(111111,999999);    
            $_SESSION['cphone'] = $phone;
            $_SESSION['payment_mode'] = $payment_mode;
            $_SESSION['sales_rep'] = $sales_rep;
           
            
           
            
            jsonResponse(200,'success','Customer found!');
        }
        else
        {
            $_SESSION['cphone'] = $phone;
            jsonResponse(404,'warning','Customer Not found!');
        }

    }
    else
    {
        jsonResponse(500,'error','Something Went Wrong!');
    }
}

if(isset($_POST['saveCustomerBtn']))
{
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $pin = validate($_POST['pin']);
    $company = validate($_POST['company']);

    if($name !='' && $phone !=''){

        $data = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'pin' => $pin,
            'company' => $company,
            

        ];
        $result = insert('customers', $data);
        if($result){
            jsonResponse(200,'success','Customer Added Successfully');
        }else{
            jsonResponse(500,'error','Something went wrong!');
        }

    }else{
        jsonResponse(422,'warning','Please fill required fields!');
    }
}
if(isset($_POST['saveOrder']))
{
    $phone = validate($_SESSION['cphone']);
    $invoice_no = validate($_SESSION['invoice_no']);
    $payment_mode = validate($_SESSION['payment_mode']);
    $sales_rep = validate($_SESSION['sales_rep']);
    //$order_status = validate($_SESSION['order_status']);
    
    

    
    
    $order_placed_by_id = $_SESSION['loggedInUser']['user_id'];

    $checkCustomer = mysqli_query($conn, "SELECT * FROM customers WHERE phone='$phone' LIMIT 1");
    if(!$checkCustomer){
        jsonResponse(500,'error','Something went wrong!');

    }
    if(mysqli_num_rows($checkCustomer) > 0)
    {
        $customerData = mysqli_fetch_assoc($checkCustomer);
        if(!isset($_SESSION['productItems'])){
            jsonResponse(404,'warning','No Items to place order!');
        }
        $sessionProducts = $_SESSION['productItems'];

        $totalAmount = 0;
        foreach($sessionProducts as $amtItem){
            $totalAmount += $amtItem['price'] * $amtItem['quantity'];
        }

        $data = [
            'customer_id' => $customerData['id'],
            'tracking_no' =>rand(111111,999999),
            'invoice_no' => $invoice_no,
            'total_amount' => $totalAmount,
            'order_date' => date('Y-m-d'),
            'order_status' => 'Paid',
            'payment_mode' => $payment_mode,
            'sales_rep' => $sales_rep,
            'order_placed_by_id' => $order_placed_by_id,
            
        ];
        $result = insert('orders',$data);
        $lastOrderId = mysqli_insert_id($conn);
        
        foreach($sessionProducts as $prodItem){
            $productId = $prodItem['product_id'];
            $price = $prodItem['price'];
            $quantity = $prodItem['quantity'];
            
            
            //Inserting order items
            $dataOrderItem = [
                'order_id' => $lastOrderId,
                'product_id' => $productId,
                'price' => $price,
                'quantity' => $quantity,
                

            ];
            $orderItemQuery = insert('order_items', $dataOrderItem);
            //checking for the books quantity and decreasing quantity and making total quantity
            $checkProductQuantityQuery = mysqli_query($conn, "SELECT *FROM products WHERE id='$productId'");
            $productQtyData = mysqli_fetch_assoc($checkProductQuantityQuery);
            $totalProductQuantity = $productQtyData['quantity'] - $quantity;

            $dataUpdate =[
                'quantity' => $totalProductQuantity
            ];
            $updateProductQty = update('products', $productId, $dataUpdate);
        }
        unset($_SESSION['productItemIds']);
        unset($_SESSION['productItems']);
        unset($_SESSION['cphone']);
        unset($_SESSION['payment_mode']);
        unset($_SESSION['invoice_no']);

        jsonResponse(200,'success','Order placed Successfully');

    }
    else
    {
        jsonResponse(404,'warning','No Customer Found!');
    }
}



?>