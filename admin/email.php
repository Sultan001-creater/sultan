<?php include('includes/header.php');?>

<div class="container-fluid px-4">
 <div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h4 class="mb-0">Email
        <a href="admins.php" class="btn btn-primary float-end">Back</a>
</h4>
    </div>
      
      <link rel="stylesheet" href="https:/stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>

      <div class="container">
            <div class="jumbotron">
                  <h1 style="color:#0d6efd"><i style="color:orangered" class="fas fa-envelope"></i> S2C E-mail</h1>
                  <hr>
                  <div class="card-body">
                  
                              <form action="code.php" method="POST">
                                <div class="row">
                              <div class="col-md-6 mb-3">
                              
                                          <label for="exampleInputPassword1"style="color:#0d6efd">Name <span style="color:orangered"><b>*</b></span></label>
                                          <input type="text"class="form-control" id="name" placeholder="Enter Your Name" required/>
                                    </div>
                            
                            <div class="col-md-6 mb-3">
                                    
                                          <label for="exampleInputPassword1"style="color:#0d6efd">Mobile Number <span style="color:orangered"><b>*</b></span></label>
                                          <input type="number"class="form-control" id="number" placeholder="Enter Number" required/>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                    
                                          <label for="exampleInputPassword1"style="color:#0d6efd">E-mail <span style="color:orangered"><b>*</b></span></label>
                                          <input type="email"class="form-control" id="email" placeholder="Enter Your Email" required/>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                    
                                          <label for="exampleInputPassword1"style="color:#0d6efd">Subject <span style="color:orangered"><b>*</b></span></label>
                                          <input type="text"class="form-control" id="subject" placeholder="Enter Subject" required/>
                                   
                                    </div>
                                    <div class="col-md-12">
                                          <label for="exampleInputPassword1"style="color:#0d6efd"> Write Message <span style="color:orangered"><b>*</b></span></label>
                                          <textarea class="form-control"  name="message" id="message"col5="30" rows="10" required></textarea>
                                    </div>
                                    
                                    <hr>
                                    <div class="col-md-12 mb-3 text-end">
                                   <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Email</button>
                                   </div>
                                   </div>

                                    <h6 class="col-md-7 mb-3 text-end">Powered By<img src="assets/img/sultan1.png" width="180px"></h6>

                              </form>
                              </div>
                  </div>
            </div>
      </div>
      

<?php include('includes/footer.php');?>