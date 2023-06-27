<?php
include('../includes/connect.php');
include('../functions/common_function.php');
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

  <link rel="stylesheet" href="../style.css" class="css">
</head>
<style>
        body{
            overflow-x:hidden;
        }
        .profile_img{
          width:90%;
          margin:auto;
          display:block;
          object-fit:contain;
        }
        .edit_image{
          width:100px;
          height:100px;
          object-fit:contain;
        }
    </style>

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
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php
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
<nav class="navbar2 navbar-expand-lg navbar-dark bg-secondary" style="position:sticky;top:40px;z-index:1;">
  <ul class="navbar-nav me-auto">
    <?php

if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'>Guest</a>
</li> ";
}else{
  echo "<li class='nav-ite'>
  <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
</li> ";
}
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-ite'>
      <a class='nav-link' href='user_login.php'>Login</a>
    </li> ";
    }else{
      echo "<li class='nav-ite'>
      <a class='nav-link' href='logout.php'>Logout</a>
    </li> ";
    }
    ?>
  </ul>
</nav>
<div>
  <h1 class="text-center">Welcome!</h1>
  <p class="text-center">A place where happiness meets you </p>
</div>

<!-- fourth child -->
<div class="row">
    <div class="col-md-2 height:90px">
        <ul class="navbar-nav bg-secondary text-center"style="height:100vh">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>My Profile</h4></a>
        </li>
        <?php
        
        $username=$_SESSION['username'];
        $user_image="Select * from `user_table` where username='$username'";
        $user_image=mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($user_image);
        $user_image=$row_image['user_image'];
        
        echo "<li class='nav-item'>
        <img src='./user_images/$user_image' class='profile_img my-4 img-fluid' alt=''style='max-height: 300px; max-width: 200px;'>
        </li>";
        ?>
        <li class="nav-item">
            <a href="profile.php" class="nav-link text-light">Pending Orders</a>
        </li>
        <li class="nav-item">
            <a href="profile.php?edit_account" class="nav-link text-light">Edit Account</a>
        </li>
        <li class="nav-item">
            <a href="profile.php?my_orders" class="nav-link text-light">My Orders</a>
        </li>
        <li class="nav-item">
            <a href="profile.php?delete_account" class="nav-link text-light">Delete Account</a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link text-light">Logout</a>
        </li>
        </ul>

    </div>
    <div class="col-md-10 text-center">
      <?php
      get_user_order_details();
      if(isset($_GET['edit_account'])){
        include('edit_account.php');
      }
      if(isset($_GET['my_orders'])){
        include('user_orders.php');
      }
      if(isset($_GET['delete_account'])){
        include('delete_account.php');
      }
      ?>
    </div>
</div>
<div class="bg-info p-2 text-center">
  <!-- Footer content here -->
  <p>All rights reserved © ℑ𝔫𝔫𝔬𝔳𝔞𝔱𝔦𝔬𝔫 𝔴𝔦𝔱𝔥 𝓐𝓼𝓮𝓮𝓵</p>
</div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
  crossorigin="anonymous"></script>
</body>
</html>