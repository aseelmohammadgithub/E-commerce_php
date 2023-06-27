<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 

    <!-- font awsome link-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
        /* .admin_image{
        width: 100px;
        object-fit: contain;
        }
        .footer{
            position:absolute;
            bottom:0%;
            width:24%;
            height:30px;
        } */
        body{
            overflow
        }
        .product_img{
            width:100px;
            object-fit:contain;
        }
        
    </style>

</head>
<body>

    <!-- nav bar -->
        <!-- second child -->
        <div class="bg-light">
                    <h3 class="text-center p-2">Manage Details</h3>
        </div>
        

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/img6.jpg" alt=""class="admin_image"></a>
                    <p class="text-light text-center"><?php echo $_SESSION['admin_name']?></p >
                </div>
                <div class="button text-center"><button class="my-3"><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                <button><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                <button><a href="logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
             </div>
        </div>
        <div class="container_fluid p-0">
        <!-- first child -->
        <nav class="navbar2 navbar-expand-lg navbar-dark bg-secondary" style="position:sticky;top:85px;z-index:1;">
  <ul class="navbar-nav me-auto">
    <?php

if(!isset($_SESSION['admin_name'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'>Guest</a>
</li> ";
}else{
  echo "<li class='nav-ite'>
  <a class='nav-link' href=''>Welcome ".$_SESSION['admin_name']."</a>
</li> ";
}



    if(!isset($_SESSION['admin_name'])){
      echo "<li class='nav-ite'>
      <a class='nav-link' href='admin_login.php'>Login</a>
    </li> ";
    }else{
      echo "<li class='nav-ite'>
      <a class='nav-link' href='logout.php'>Logout</a>
    </li> ";
    }


    
    ?>
  </ul>
</nav>
        
        <!-- fourth child -->
        <div class="container my-3">
            <?php
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }
                if(isset($_GET['insert_brand'])){
                    include('insert_brands.php');
                }
                if(isset($_GET['view_products'])){
                    include('view_products.php');
                }
                if(isset($_GET['edit_products'])){
                    include('edit_products.php');
                }
                if(isset($_GET['delete_product'])){
                    include('delete_product.php');
                }
                if(isset($_GET['view_categories'])){
                    include('view_categories.php');
                }
                if(isset($_GET['view_brands'])){
                    include('view_brands.php');
                }
                if(isset($_GET['edit_category'])){
                    include('edit_category.php');
                }
                if(isset($_GET['edit_brands'])){
                    include('edit_brands.php');
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }
                if(isset($_GET['delete_brands'])){
                    include('delete_brands.php');
                }
                if(isset($_GET['list_orders'])){
                    include('list_orders.php');
                }
                if(isset($_GET['list_payments'])){
                    include('list_payments.php');
                }
                if(isset($_GET['list_users'])){
                    include('list_users.php');
                }
                
            ?>

        </div>


    </div>
    

    <div class="bg-info p-2 text-center">
    <!-- Footer content here -->
    <p>All rights reserved © ℑ𝔫𝔫𝔬𝔳𝔞𝔱𝔦𝔬𝔫 𝔴𝔦𝔱𝔥 𝓐𝓼𝓮𝓮𝓵</p>
</div>

<!-- bootstap jss link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>
</html>