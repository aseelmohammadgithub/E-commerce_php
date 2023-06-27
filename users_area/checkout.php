<?php
include('../includes/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Head content here -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website Checkout Page</title>
  <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="./style.css" class="css">
  <style>
    .navbar2 {
      position:sticky;
      top:70px;
      z-index:1;
    }

    .navbar2 .navbar-nav {
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0 logo">
    <!-- Navbar content here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info" style="position:sticky;top:0;z-index:1;">
      <div class="container-fluid">
        <img src="../images/img22.png" alt="" style="max-height: 70px; max-width: 150px;">

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
              <a class="nav-link" href="../display_all.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>

          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn-outline-secondary" name="search_data_product">
            <!-- my own secondary given it was actually light  -->

          </form>
        </div>
      </div>
    </nav>
    <div>

      <!-- calling cart -->


      <!-- Second navbar -->
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
  <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
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
    </div>
    <h1 class="text-center my-4">Welcome!</h1>
    <p class="text-center my-4">A place where happiness meets you </p>
  </div>


  <!-- fourth child -->
  <div class="row px-1">
    <div class="col-md-12">
      <!-- products -->
      <div class="row">
        <?php
        if (!isset($_SESSION['username'])) {
          include('user_login.php');
        } else {
          include('payment.php');
        }
        ?>
      </div>
    </div>
  </div>

  <!-- include footer -->
  <?php include("../includes/footer.php") ?>

  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>
