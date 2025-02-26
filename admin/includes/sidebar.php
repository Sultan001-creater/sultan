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
                                <div class="sb-nav-link-icon btn "style="background:orangered;"><i style="color:white;"  class="fa fa-cart-plus"></i></div>
                                Orders/Invoices
                                </a>
                            <a class="nav-link <?= $page == 'secure.php' ? 'active':''; ?>" href="secure.php">
                                <div class="sb-nav-link-icon btn "style="background:orangered;"><i style="color:white;"  class="fa fa-lock"></i></div>
                                Secure
                                </a>
                               
                            <div class="sb-sidenav-menu-heading"><b>Manage Products</b></div>

                            <a class="nav-link <?= $page == 'categories.php' ? 'active':''; ?>" href="categories.php">
                                <div class="sb-nav-link-icon btn "style="background:orangered;"><i style="color:white;"  class="fas fa-server"></i></div>
                                Categories
                                </a>
                            <a class="nav-link <?= $page == 'products.php' ? 'active':''; ?>" href="products.php">
                                <div class="sb-nav-link-icon btn "style="background:orangered;"><i style="color:white;"  class="fa fa-cubes"></i></div>
                                Products
                                </a>
                           
                            
                            
                            <div class="sb-sidenav-menu-heading"><b>Manage Users</b></div>
                            <a class="nav-link <?= $page == 'admins.php' ? 'active':''; ?>" href="admins.php">
                                <div class="sb-nav-link-icon btn "style="background:orangered;"><i style="color:white;"  class="fa fa-user"></i></div>
                                Admins/Stuff
                                </a>
                                <a class="nav-link <?= $page == 'customers.php' ? 'active':''; ?>" href="customers.php">
                                <div class="sb-nav-link-icon btn "style="background:orangered;"><i style="color:white;"  class="fa fa-users"></i></div>
                                Customers
                                </a>
                                <a class="nav-link <?= $page == 'posiions.php' ? 'active':''; ?>" href="positions.php">
                                <div class="sb-nav-link-icon btn "style="background:orangered;"><i style="color:white;"  class="fas fa-chart-area me-1"></i></div>
                                Positions
                                </a>
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="text-muted" >Logged in as:</div>
                             <div style="color:#C62300;"> <?= $_SESSION['loggedInUser']['name']; ?></div>
                    </div>
                </nav>
            </div>