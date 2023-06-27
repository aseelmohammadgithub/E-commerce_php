<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
// Function to update cart quantities
function updateCartQuantity($productId, $quantity)
{
    global $con;
    $get_ip_add = getIPAddress();
    $updateCartQuery = "UPDATE `cart_details` SET quantity = '$quantity' WHERE ip_address = '$get_ip_add' AND product_id = '$productId'";
    $result = mysqli_query($con, $updateCartQuery);
    return $result;
}

// Function to remove cart items
function removeCartItem($productId)
{
    global $con;
    $get_ip_add = getIPAddress();
    $deleteCartQuery = "DELETE FROM `cart_details` WHERE ip_address = '$get_ip_add' AND product_id = '$productId'";
    $result = mysqli_query($con, $deleteCartQuery);
    return $result;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Head content here -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website-Cart details</title>
  <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="./style.css" class="css">

  <style>
    .cart_img {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0 logo">
    <!-- Navbar content here -->
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
      </ul>
      
    </div>
  </div>
</nav>
<div>

    <!-- ... -->

    <!-- calling cart -->
    <?php
    cart();
    ?>
    

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
<div>
  <h1 class="text-center">Welcome!</h1>
  <p class="text-center">A place where happiness meets you </p>
</div>
    <!-- ... -->

    <!-- Fourth child-Table -->
    <div class="container">
      <div class="row">
        <form action="" method="post">
          <table class="table table-bordered text-center">
            
            <tbody>
              <?php
              global $con;
              $get_ip_add = getIPAddress();
              $total_price = 0;

              // Retrieve cart items from the database
              $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
              $result = mysqli_query($con, $cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0){

                  echo "<thead>
                  <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                  </tr>
                </thead>
                <tbody>";



              
              while ($row = mysqli_fetch_array($result)) {
                $product_id = $row['product_id'];

                // Retrieve product details from the database
                $select_products = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                $result_products = mysqli_query($con, $select_products);

                while ($row_product_price = mysqli_fetch_array($result_products)) {
                  $product_price = floatval($row_product_price['product_price']);
                  $product_title = $row_product_price['product_title'];
                  $product_image1 = $row_product_price['product_image1'];
                  $quantity = $row['quantity'];

                  $product_total_price = $product_price * $quantity;
                  $total_price += $product_total_price;
              ?>
                  <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td>
                      <input type="number" name="qty[<?php echo $product_id ?>]" class="form-input w-50" value="<?php echo $quantity ?>">
                    </td>
                    <td><?php echo $product_total_price ?>/-</td>
                    <td>
                      <input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>">
                    </td>
                    <td>
                      <button type="submit" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">Update Cart</button>
                      <button type="submit" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">Remove Cart</button>
                    </td>
                  </tr>
              <?php
                }
              }
            }
            else{

              echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
            }
              ?>
            </tbody>
          </table>

          <!-- Subtotal -->
          <div class="d-flex mb-5">
            <?php
            $get_ip_add = getIPAddress(); 


            // Retrieve cart items from the database
            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
            $result = mysqli_query($con, $cart_query);
            $result_count=mysqli_num_rows($result);
            if($result_count>0){
              echo "<h4 class='px-3'>Subtotal: <strong class='text-info'> $total_price/-</strong></h4>
              <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'> 
              <button class='bg-secondary p-3 py-2 border-0'><a href='./users_area/checkout.php'class='text-light text-decoration-none'>Checkout</button>";
            }
            else{
              echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'> ";
            }
            if(isset($_POST['continue_shopping'])){
              echo "<script>window.open('index.php','_self')</script>";
            }
            ?>
          </div>
        </form>
      </div>
    </div>
    <!-- ... -->

    <!-- Function to update cart quantities -->
    <?php
    if (isset($_POST['update_cart'])) {
      foreach ($_POST['qty'] as $productId => $quantity) {
        if (updateCartQuantity($productId, $quantity)) {
          echo "<script>window.open('cart.php', '_self')</script>";
        }
      }
    }
    ?>

    <!-- Function to remove items -->
    <?php
    if (isset($_POST['remove_cart'])) {
      if (isset($_POST['removeitem'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
          if (removeCartItem($remove_id)) {
            echo "<script>window.open('cart.php', '_self')</script>";
          }
        }
      }
    }
    ?>

    <!-- include footer -->
    <?php include("./includes/footer.php") ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
  </body>
  </html>