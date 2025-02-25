<?php
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
?>

<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading"><b>Home</b></div>
                            <a class="nav-link <?= $page == 'index.php' ? 'active':''; ?>" href="index.php">
                                <div  class="sb-nav-link-icon  btn"style="background:orangered;"><i style="color:white;"  class="fas fa-dashboard"></i></div>
                                Dashboard 
                                </a>
                            <a class="nav-link <?= $page == 'orders-create.php' ? 'active':''; ?>" href="orders-create.php">
                                <div class="sb-nav-link-icon btn  "style="background:orangered;" ><i style="color:white;"  class="fas fa-shopping-basket"></i></div>
                                Create Order
                               </a>
                            <a class="nav-link <?= $page == 'orders.php' ? 'active':''; ?>" href="orders.php">
                                <div class="sb-nav-link-icon btn "style="background:orangered;"><i style="color:white;"  class="fas fa-list"></i></div>
                                Orders/Invoices
                                </a>
                               
                            <div class="sb-sidenav-menu-heading"><b>Manage Products</b></div>

                            <a class="nav-link collapsed" href="#" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                                <div class="sb-nav-link-icon btn"style="background:orangered;"><i style="color:white;"  class="fas fa-cubes"></i></div>
                                Categories
                               <div class="sb-sidenav-collapse-arrow"><i style="color:#8E1616;"class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse " id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"  >
                                    <a class="nav-link <?= $page == 'categories-create.php' ? 'active':''; ?>" href="categories-create.php"><i style="color:#C62300;"  class="fas fa-tags"></i>  Add Categories</a>
                                    <a class="nav-link <?= $page == 'categories.php' ? 'active':''; ?>" href="categories.php"><i style="color:#C62300;"  class="fas fa-server"></i>  View Categories</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
                                <div class="sb-nav-link-icon btn" style="background:orangered;"><i style="color:white;"   class="fas fa-shopping-bag"></i></div>
                                Inventory
                                <div class="sb-sidenav-collapse-arrow"><i style="color:#8E1616;" class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse " id="collapseProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'products-create.php' ? 'active':''; ?>" href="products-create.php"><i style="color:#C62300;" class="fas fa-chart-bar me-1"></i>  Add Product</a>
                                    <a class="nav-link <?= $page == 'products.php' ? 'active':''; ?>" href="products.php"><i style="color:#C62300;" class="fas fa-chart-area me-1"></i>  View Products</a>
                                </nav>
                            </div>
                            
                            
                            <div class="sb-sidenav-menu-heading"><b>Manage Users</b></div>
                            <a class="nav-link collapsed" href="#"
                              data-bs-toggle="collapse" 
                             data-bs-target="#collapseCustomer" aria-expanded="false" aria-controls="collapseCustomer">
                                <div class="sb-nav-link-icon btn" style="background:orangered;"><i style="color:white;" class="fas fa-users"></i></div>
                                Position
                                 <div class="sb-sidenav-collapse-arrow"><i style="color:#8E1616;"class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCustomer" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'positions-create.php' ? 'active':''; ?>" href="positions-create.php"><i style="color:#C62300;"class="fas fa-user"></i>   Add Position</a>
                                    <a class="nav-link <?= $page == 'positions.php' ? 'active':''; ?>" href="positions.php"><i style="color:#C62300;" class="fas fa-users"></i>   View Positions</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#"
                              data-bs-toggle="collapse" 
                             data-bs-target="#collapseCustomer" aria-expanded="false" aria-controls="collapseCustomer">
                                <div class="sb-nav-link-icon btn" style="background:orangered;"><i style="color:white;" class="fas fa-users"></i></div>
                                Customers
                                 <div class="sb-sidenav-collapse-arrow"><i style="color:#8E1616;"class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCustomer" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'customers-create.php' ? 'active':''; ?>" href="customers-create.php"><i style="color:#C62300;"class="fas fa-user"></i>   Add Customer</a>
                                    <a class="nav-link <?= $page == 'customers.php' ? 'active':''; ?>" href="customers.php"><i style="color:#C62300;" class="fas fa-users"></i>   View Customers</a>
                                </nav>
                            </div>
                            
                             <a class="nav-link collapsed" href="#"
                              data-bs-toggle="collapse" 
                             data-bs-target="#collapseAdmins" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon btn" style="background:orangered;"><i style="color:white;" class="fas fa-user"></i></div>
                                Admins/Stuff
                                <div class="sb-sidenav-collapse-arrow"><i style="color:#8E1616;" class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseAdmins" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link  <?= $page == 'admins-create.php' ? 'active':''; ?>" href="admins-create.php"><i style="color:#C62300;" class="fas fa-user"></i>  Add Admin</a>
                                    <a class="nav-link <?= $page == 'admins.php' ? 'active':''; ?>" href="admins.php"><i style="color:#C62300;" class="fas fa-users"></i>  View Admins</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="text-muted" >Logged in as:</div>
                             <div style="color:#C62300;"> <?= $_SESSION['loggedInUser']['name']; ?></div>
                    </div>
                </nav>
            </div>