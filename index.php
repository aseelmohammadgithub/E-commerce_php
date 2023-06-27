

<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Head content here -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website</title>
  <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="./style.css" class="css">
</head>
<!-- <style>
        body{
            overflow-x:hidden;
        }
    </style> -->

<body>
  <div class="container-fluid p-0 logo">
    <!-- Navbar content here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info" style="position:sticky;top:0;z-index:1;">
  <div class="container-fluid">
  <img src="./images/img22.png" alt="" style="max-height: 70px; max-width: 150px;">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php
          cart_item()?>/-</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Present bill : <?php total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"name="search_data"> 
        <input type="submit" value="Search"class="btn-outline-secondary" name="search_data_product"> 
        <!-- my own secondary given it was actually light  -->

      </form>
    </div>
  </div>
</nav>
<div>

<!-- calling cart -->
<?php
cart();
?>

<!-- Second navbar -->
<nav class="navbar2 navbar-expand-lg navbar-dark bg-secondary" style="position:sticky;top:85px;z-index:1;">
  <ul class="navbar-nav me-auto">
    <?php

if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'>Guest</a>
</li> ";
}else{
  echo "<li class='nav-ite'>
  <a class='nav-link' href='./users_area/profile.php'>Welcome ".$_SESSION['username']."</a>
</li> ";
}


    if(!isset($_SESSION['username'])){
      echo "<li class='nav-ite'>
      <a class='nav-link' href='./users_area/user_login.php'>Login</a>
    </li> ";
    }else{
      echo "<li class='nav-ite'>
      <a class='nav-link' href='./users_area/logout.php'>Logout</a>
    </li> ";
    }

    
    ?>
  </ul>
</nav>
<!-- Closing div for container-fluid -->
<div>
  <h1 class="text-center">Welcome!</h1>
  <p class="text-center">A place where happiness meets you </p>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-9">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        getproducts();
        get_unique_categories();
        get_unique_brands();
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip;  
        ?>
      </div>
    </div>
    <div class="col-md-3 bg-secondary p-0" style="position:fixed; top:150px;right:2px">
      <div class="row">
        <div class="col">
          <ul class="navbar-nav me-auto text-center flex-column">
            <li class="nav-item bg-info">
              <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>
            <?php
            $select_categories = "SELECT * FROM `categories`";
            $result_categories = mysqli_query($con, $select_categories);
            while ($row_data = mysqli_fetch_assoc($result_categories)) {
              $category_name = $row_data['category_name'];
              $category_id = $row_data['category_id'];
              echo "<li class='nav-item'>
                      <a href='index.php?category=$category_id' class='nav-link text-light'>$category_name</a>
                    </li>";
            }

            $select_brands = "SELECT * FROM `brands`";
            $result_brands = mysqli_query($con, $select_brands);
            echo "<li class='nav-item bg-info'>
                    <a href='#' class='nav-link text-light'><h4>Brands</h4></a>
                  </li>";
            while ($row_data = mysqli_fetch_assoc($result_brands)) {
              $brand_name = $row_data['brand_name'];
              $brand_id = $row_data['brand_id'];
              echo "<li class='nav-item'>
                      <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_name</a>
                    </li>";
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- include footer -->
<?php include("./includes/footer.php") ?>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
  crossorigin="anonymous"></script>
</body>
</html>

