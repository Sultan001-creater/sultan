<?php 
include('includes/header.php');

if(isset($_SESSION['loggedIn'])){
    ?>
    <script>window.location.href ='index.php';</script>
    <?php
}
 ?>
<div class="py-5"style="background-image:url('admin/assets/img/RMS3.jpg');background-size:cover; background-repeat:no-repeat; background-color:dark;">
        <div class="container mt-2" >
            <div class="row justify-content-center" >
                <div class="col-md-6">
                   <div class="card shadow rounded-4 ">
                    <?php //alertmessage();?>
                    <div class="p-5">
                        
                    <div class="col-md-8 mb-3 text-end">  
                        <img src="admin/assets/img/RUSH12.png" width="200px">
                    </div>
                   
                        
                    <hr class="divider" />
                        <h4 class="row justify-content-center" >Register An Account Here </h4>
                        <hr class="divider" />      
                        <form action="admin/code.php" method="POST">
                        <div class="row ">
                    
                        <div class="col-md-6 mb-3">
                        <label for="" ><i style="color:#C62300;" class="fas fa-user"></i><b> Name </b><span style="color:orangered;"><b>*</b></span></label>
                        <input  type="text" name="name" required class="form-control"placeholder="Enter  your name "/>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for=""><i style="color:#C62300;"  class="fas fa-id-card"></i><b> National ID</b> <span style="color:orangered;"><b>*</b></span></label>
                        <input type="number" name="national_id" required class="form-control"placeholder="Enter  your ID No "/>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="" ><i style="color:#C62300;" class="fas fa-envelope"></i><b> Email </b><span style="color:orangered;"><b>*</b></span></label>
                        <input type="email" name="email" required class="form-control"placeholder="Enter  your Email "/>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for=""><i style="color:#C62300;" class="fas fa-phone"></i><b> Phone Number</b> <span style="color:orangered;"><b>*</b></span></label>
                        <input type="number" name="phone" required class="form-control"placeholder="Enter  your Phone No "/>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="" ><i style="color:#C62300;" class="fa fa-user-secret" aria-hidden="true"></i><b> Password </b><span style="color:orangered;"><b>*</b></span></label>
                        <input type="password" name="password" required class="form-control"placeholder="Enter  your Password "/>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                        <label ><b>Select Position</b><span style="color:red;">*</span></label>
                        <select name="positions" class="form-select myselect2" >
                            <option value="">---Select Position--- </option>
                            <?php 
                            $positions = getAll('positions');
                            if($positions){
                                if(mysqli_num_rows($positions) > 0)
                                {
                                    foreach($positions as $posiItem){
                                        echo '<option  value="'. $posiItem['name'].'">'. $posiItem['name'].'</option>';
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
                        <label for="" ><i style="color:#C62300;" class="fa fa-window-close"></i><b> Is Ban</b> </label>
                        <br>
                        <input type="checkbox" name="is_ban" style="width:30px;height:30px;" />
                        </div>
                        
                            <button type="submit" name="saveAdmin" class="btn "style="background:orangered;color:white;"><i class="fas fa-save"></i><b> Sign Up</b></button>
                        
                        </div>
                        <p>Already have an account? <a href="login.php">Login Here.</a></p>

                        </form>
                    </div>

                   </div>
                    
                </div>
            </div>

        </div>
    
</div>
    <?php include('includes/footer.php');?>
