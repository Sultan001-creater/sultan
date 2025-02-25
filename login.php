<?php 
include('includes/header.php');

if(isset($_SESSION['loggedIn'])){
    ?>
    <script>window.location.href ='index.php';</script>
    <?php
}
 ?>
<div class="py-5"style="background-image:url('admin/assets/img/RMS3.jpg');background-size:cover; background-repeat:no-repeat; background-color:dark;">
        <div class="container mt-2 ">
            <div class="row justify-content-center">
                <div class="col-md-5">
                   <div class="card shadow rounded-4">
                    <?php //alertmessage();?>
                    <div class="p-5">
                        
                    <div class="col-md-8 mb-3 text-end">  
                       <img src="admin/assets/img/RUSH12.png" width="200px">
                    </div>
                   
                        
                    <hr class="divider" />
                        <!--<h4 class="row justify-content-center" >Sign Into Your Account </h4>
                        <hr class="divider" />-->
                        <form action="login-code.php" method="POST">
                            <div class="mb-3">
                                <label ><h6>Username <span style="color:orangered;"><b>*</b></span></h6></label>
                                <input type="name" name="name" class="form-control  "placeholder="Enter  your Username " required/>
                            </div>
                            <div class="mb-3 ">
                                <label  ><h6>Password <span style="color:orangered;"><b>*</b></span></h6></label>
                                <input type="password" name="password" class="form-control " placeholder="Enter Your Password" required/>
                            </div>
                            <div class="mb-3">
                               
                                <button type="submit" name="loginBtn" class="btn  w-100 mt-1" style="background:orangered;color:white;transform:orange"><i class="fa fa-sign-in" aria-hidden="true"></i><b> LOGIN</b></button>
                                
                            </div>
                            <p>Don't have an Account <a href="signup.php">Register Here.</a></p>

                        </form>
                    </div>

                   </div>
                    
                </div>
            </div>

        </div>
    
</div>
    <?php include('includes/footer.php');?>
