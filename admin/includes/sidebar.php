       <?php
        $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
        ?>

       <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
           <div class="sidenav-header">
               <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
               <a class="navbar-brand m-0" href="index.php">
                   <img src="assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                   <span class="ms-1 font-weight-bold text-white"></span>
               </a>
           </div>
           <hr class="horizontal light mt-0 mb-2">
           <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
               <ul class="navbar-nav">
                   <li class="nav-item">
                       <a class="nav-link text-white active <?= $page == "index.php" ? 'active bg-gradient-info' : ''; ?>" href="index.php">
                           <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="material-icons opacity-10">dashboard</i>
                           </div>
                           <span class="nav-link-text ms-1">Dashboard</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link text-white <?= $page == "category.php" ? 'active bg-gradient-info' : ''; ?> " href="category.php">
                           <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="material-icons opacity-10">table_view</i>
                           </div>
                           <span class="nav-link-text ms-1">All Category</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link text-white <?= $page == "add-category.php" ? 'active bg-gradient-info' : ''; ?> " href="add-category.php">
                           <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="material-icons opacity-10">add</i>
                           </div>
                           <span class="nav-link-text ms-1">Add Category</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link text-white <?= $page == "products.php" ? 'active bg-gradient-info' : ''; ?>  " href="products.php">
                           <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="material-icons opacity-10">table_view</i>
                           </div>
                           <span class="nav-link-text ms-1">All Products</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link text-white <?= $page == "add-product.php" ? 'active bg-gradient-info' : ''; ?> " href="add-product.php">
                           <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="material-icons opacity-10">add</i>
                           </div>
                           <span class="nav-link-text ms-1">Add Product</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link text-white <?= $page == "users.php" ? 'active bg-gradient-info' : ''; ?> " href="users.php">
                           <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="material-icons opacity-10">account_circle</i>
                           </div>
                           <span class="nav-link-text ms-1">Users</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link text-white <?= $page == "orders.php" ? 'active bg-gradient-info' : ''; ?> " href="orders.php">
                           <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="material-icons opacity-10">shopping_bag</i>
                           </div>
                           <span class="nav-link-text ms-1">Orders</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link text-white <?= $page == "transactions.php" ? 'active bg-gradient-info' : ''; ?> " href="transactions.php">
                           <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="material-icons opacity-10">paid</i>
                           </div>
                           <span class="nav-link-text ms-1">Transactions</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link text-white <?= $page == "sales.php" ? 'active bg-gradient-info' : ''; ?> " href="sales.php">
                           <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="material-icons opacity-10">sell</i>
                           </div>
                           <span class="nav-link-text ms-1">Sales By Month</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link text-white <?= $page == "add-sales.php" ? 'active bg-gradient-info' : ''; ?> " href="add-sales.php">
                           <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="material-icons opacity-10">add</i>
                           </div>
                           <span class="nav-link-text ms-1">Add Month Total</span>
                       </a>
                   </li>
               </ul>
           </div>
           <div class="sidenav-footer position-absolute w-100 bottom-0 ">
               <div class="mx-3">
                   <a class="btn bg-gradient-info mt-4 w-100" href="../index.php?logout=1">Log Out</a>
               </div>
           </div>
       </aside>