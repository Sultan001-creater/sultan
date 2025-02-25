<nav class="sb-topnav navbar navbar-expand navbar-blue bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php"style="background:;"><img src="assets/img/RUSH12.png" width="200px"></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i style="color:orangered;" class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 ">
                <div class="input-group">
                    <input class="form-control "name="search"value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" type="text" placeholder="Search..." required aria-label="Search..." aria-describedby="btnNavbarSearch" />
                    <button class="btn " id="btnNavbarSearch" type="submit" style="background:orangered;color:white;"><i class="fas fa-search"></i>Search</button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li style="color:orangered;" class="nav-item dropdown">
               
                    <a style="color:orangered;"class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i style="color:orangered;" class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="message.php" ><i style="color:orangered;"  class="fas fa-paper-plane"></i> Message</a></li>
                        <li><a class="dropdown-item" href="email.php" ><i style="color:orangered;"  class="fas fa-envelope"></i> Email</a></li>
                        <li><a class="dropdown-item" href="suppliers.php"><i style="color:orangered;"  class="fas fa-envelope-open"></i> Suppliers</a></li>
                        
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php"><i style="color:orangered;"  class="fas fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>