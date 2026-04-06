<?php

require "../login-system/db.php";
require "../seller/storeProductList.php";
if(!isset($_SESSION)) session_start();

$email = $_SESSION['email'];
$result = $mysqli->query("SELECT * FROM store WHERE email='$email'");

$user = $result->fetch_assoc();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
  $store_name = $user['store_name'];
}
else{
  header("location:index.php");
}

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $singleRec = mysqli_query($mysqli, "SELECT * FROM productlist WHERE id=$id");
  $records = mysqli_fetch_array($singleRec);

  $productFor  = $records['productFor'];
  $productPic  = $records['productPic'];
  $productName = $records['productName'];
  $description = $records['description'];
  $price       = $records['price'];
  $quantity    = $records['quantity'];
  $edit_state  = true;
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="../js/cp_seller.js"></script>

  <script type="text/javascript" src="../js/add_product.js"></script>

</head>
<body>
  <?php include "header.php" ?>

  <?php include "sidebar.php" ?>

  <div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
    <div class="text-center" style="margin-bottom: 40px;">
      <h1 style="color: #CE2626; font-weight: 800; font-size: 38px;">
        <span style="color: #F8A036;"><?php echo $store_name;?></span> Store
      </h1>
      <p style="color: #666; font-size: 16px;">
        <?php echo ($edit_state == false) ? 'Add a new product to your inventory' : 'Update your existing product details'; ?>
      </p>
    </div>

    <form action="../seller/storeProductList.php" method="post" enctype="multipart/form-data">
      <?php if(isset($_GET['edit'])){ ?>
        <input type="hidden" name="id" value="<?= $id ?>">
      <?php } ?>

      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="bella-card" style="padding: 40px; text-align: center; height: 100%;">
            <h3 style="font-weight: 800; margin-bottom: 20px; font-size: 18px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Product Image</h3>
            
            <div style="background: #fdfdfd; border: 2px dashed #ddd; border-radius: 12px; padding: 20px; margin-bottom: 20px;">
              <?php if ($edit_state == false): ?>
                <img id="product_image" src="../img/addp.jpg" style="width: 100%; max-height: 250px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
              <?php else: ?>
                <input type="hidden" name="productPic" value="<?= $productPic; ?>">
                <?php echo "<img id=\"product_image\" src='../seller/productPic/".$records['productPic']."' style=\"width: 100%; max-height: 250px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;\">"; ?>
              <?php endif; ?>
              
              <label class="btn btn-outline-primary" style="width: 100%; border: 2px solid var(--primary); color: var(--primary); font-weight: 700; border-radius: 8px; cursor: pointer; padding: 10px;">
                <i class="fa fa-camera"></i> Upload Image
                <input type="file" name="productPic" onchange="readURL4(this)" accept="image/*" id="product_select" style="display: none;"/>
              </label>
              <p style="font-size: 11px; color: #888; margin-top: 10px; margin-bottom: 0;">Max 2MB. JPG or PNG only.</p>
            </div>
          </div>
        </div>

        <div class="col-md-8 mb-4">
          <div class="bella-card" style="padding: 40px; height: 100%;">
            <h3 style="font-weight: 800; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">Product Details</h3>

            <div class="row">
              <div class="col-md-8">
                <label class="form-label-modern">Product Name</label>
                <input class="form-input-modern" type="text" name="productName" value="<?= $productName; ?>" required>
              </div>
              <div class="col-md-4">
                <label class="form-label-modern">Category</label>
                <select name="productFor" class="form-input-modern" onchange="countryChange(this);" required>
                  <option value="<?= $productFor; ?>" selected><?= $productFor ? $productFor : 'Select Category' ?></option>
                  <option value="Men\'s Fashion">Men's Fashion</option>
                  <option value="Women\'s Fashion">Women's Fashion</option>
                  <option value="Baby\'s Fashion">Baby's Fashion</option>
                  <option value="Phone and Tablets">Phone & Tablets</option>
                  <option value="Electronics">Electronics</option>
                  <option value="Home and Living">Home & Living</option>
                  <option value="Sports and Travels">Sports & Travels</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>

            <label class="form-label-modern">Description</label>
            <?php if ($edit_state == false): ?>
              <textarea class="form-input-modern" rows="5" name="productDes" placeholder="Describe the item, conditions, colors..." required style="resize: vertical;"></textarea>
            <?php else: ?>
              <textarea class="form-input-modern" rows="5" name="productDes" required style="resize: vertical;"><?= $description; ?></textarea>
            <?php endif; ?>

            <div class="row mt-3">
              <div class="col-md-6 form-group">
                <label class="form-label-modern">Price (UGX)</label>
                <div class="input-group">
                  <span class="input-group-addon" style="background: #eee; border: 1px solid #ddd; border-right: none; color: #555; font-weight: bold; border-radius: 8px 0 0 8px;">UGX</span>
                  <input type="number" name="price" value="<?= $price; ?>" class="form-control" required style="height: 50px; background: #fdfdfd; border: 1px solid #ddd; border-radius: 0 8px 8px 0; font-size: 16px; font-weight: 500; font-family: 'Open Sans', sans-serif;">
                </div>
              </div>
              <div class="col-md-6 form-group">
                <label class="form-label-modern">Stock Quantity</label>
                <input type="number" name="quantity" value="<?= $quantity; ?>" class="form-input-modern" required>
              </div>
            </div>
            
            <div style="margin-top: 30px;">
              <?php if ($edit_state == false): ?>
                <button type="submit" name="submit" class="btn btn-accent" style="width: 100%; padding: 15px; font-size: 18px; font-weight: 800; border-radius: 12px;"><i class="fa fa-plus-circle"></i> Add Product to Store</button>
              <?php else: ?>
                <button type="submit" name="update" class="btn btn-primary" style="width: 100%; padding: 15px; font-size: 18px; font-weight: 800; border-radius: 12px;"><i class="fa fa-save"></i> Save Product Changes</button>
              <?php endif; ?>
            </div>
          </div>
        </div>

      </div>
    </form>
  </div>


  <!-- Removed Redundant Address -->

  <?php include "footer.php" ?>

</body>
</html>