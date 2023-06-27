<?php
// Assuming you have already established a database connection ($con)

// Check if the 'edit_products' parameter is set in the URL
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    
    // Fetch the product data from the database based on the edit_id
    $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    
    // Extract the product details from the fetched data
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    // Fetch the category name from the 'categories' table
    $select_category = "SELECT * FROM `categories` WHERE category_id = $category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_name = $row_category['category_name'];

    // Fetch the brand name from the 'brands' table
    $select_brand = "SELECT * FROM `brands` WHERE brand_id = $brand_id";
    $result_brand = mysqli_query($con, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_name = $row_brand['brand_name'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
        .product_image {
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title" class="form-control" required="required">
            </div>
            <!-- Rest of the form fields -->

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image1</label>
                <div class="d-flex">
                    <input type="file" id="product_image1" name="product_image1" class="form-control w-70 m-auto">
                    <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_image">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image2</label>
                <div class="d-flex">
                    <input type="file" id="product_image2" name="product_image2" class="form-control w-70 m-auto">
                    <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_image">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Product Image3</label>
                <div class="d-flex">
                    <input type="file" id="product_image3" name="product_image3" class="form-control w-70 m-auto">
                    <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_image">
                </div>
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" value="<?php echo $product_price ?>" name="product_price" class="form-control" required="required">
            </div>

            <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <?php
    if(isset($_POST['update_product'])){
        $product_title = $_POST['product_title'];
        // Get the rest of the form data

        // Image 1 processing
        if(isset($_FILES['product_image1']) && $_FILES['product_image1']['error'] === UPLOAD_ERR_OK){
            $product_image1 = $_FILES['product_image1']['name'];
            $product_image1_tmp = $_FILES['product_image1']['tmp_name'];

            // Move uploaded file to the desired location
            move_uploaded_file($product_image1_tmp, "./product_images/$product_image1");
        }

        // Image 2 processing
        if(isset($_FILES['product_image2']) && $_FILES['product_image2']['error'] === UPLOAD_ERR_OK){
            $product_image2 = $_FILES['product_image2']['name'];
            $product_image2_tmp = $_FILES['product_image2']['tmp_name'];

            // Move uploaded file to the desired location
            move_uploaded_file($product_image2_tmp, "./product_images/$product_image2");
        }

        // Image 3 processing
        if(isset($_FILES['product_image3']) && $_FILES['product_image3']['error'] === UPLOAD_ERR_OK){
            $product_image3 = $_FILES['product_image3']['name'];
            $product_image3_tmp = $_FILES['product_image3']['tmp_name'];

            // Move uploaded file to the desired location
            move_uploaded_file($product_image3_tmp, "./product_images/$product_image3");
        }

        // Update the product in the database
        $product_price = $_POST['product_price']; // Get the updated product price
        $update_product = "UPDATE `products` SET product_title='$product_title', product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', product_price='$product_price' WHERE product_id = $edit_id";
        $run_product = mysqli_query($con, $update_product);

        if($run_product){
            echo "<script>alert('Product updated successfully!')</script>";
            echo "<script>window.open('index.php?view_products', '_self')</script>";
        }
    }
    ?>
</body>
</html>
