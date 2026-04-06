<?php


require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $email = $_SESSION['email'];
}

if(isset($_GET['pId'])){
    $pId = $_GET['pId'];
    $singleResult = $mysqli->query("SELECT * FROM productlist WHERE id='$pId'");
    $row = $singleResult->fetch_assoc();
}

if(isset($_POST['submit'])){
    $size = $_POST['productSize'];
    $pQuantity = $_POST['pQuantity'];
    $sId = session_id();
    $productId = $pId;
    $pName = $row['productName'];
    $pPic = $row['productPic'];
    $pPrice = $row['price'];

    $checkQuery = $mysqli->query("SELECT * FROM cart WHERE sId='$sId' AND productId='$productId' ");
    $checkResult = $checkQuery->fetch_assoc();

    if($checkResult){
        $msg = "Product already added!! Go to cart please.";
    }
    else {

        $query = " INSERT INTO `cart` (`sId`, `productId`,`proName`,`proPic`,`price`, `size`, `customerQty`) VALUES ('$sId', '$productId','$pName','$pPic','$pPrice', '$size', '$pQuantity');  ";
        mysqli_query($mysqli, $query);
        $_SESSION['ref'] =1;
        header('location: check_out_item.php');
    }
}
if(isset($_GET['order']) && $_GET['order'] == 'direct'){
    $sId = session_id();
    $productId = $pId;
    $pName = $row['productName'];
    $pPic = $row['productPic'];
    $pPrice = $row['price'];
    $size = "Default"; // Default size for direct orders
    $pQuantity = 1;

    $checkQuery = $mysqli->query("SELECT * FROM cart WHERE sId='$sId' AND productId='$productId' ");
    $checkResult = $checkQuery->fetch_assoc();

    if(!$checkResult){
        $query = " INSERT INTO `cart` (`sId`, `productId`,`proName`,`proPic`,`price`, `size`, `customerQty`) VALUES ('$sId', '$productId','$pName','$pPic','$pPrice', '$size', '$pQuantity');  ";
        mysqli_query($mysqli, $query);
    }
    $_SESSION['ref'] = 1;
    echo "<script>window.location.href='check_out_item.php';</script>";
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">


	<title>Product</title>

</head>
<body>

<?php include "header.php" ?>
<?php include "header2.php" ?>
<?php include "sidebar.php" ?>

<div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
    <div class="row" style="display: flex; flex-wrap: wrap; gap: 40px; align-items: flex-start;">
        
        <!-- Product Image Section -->
        <div class="col-md-5" style="flex: 1; min-width: 350px;">
            <div class="bella-card" style="padding: 15px; position: relative; overflow: hidden; border-radius: 24px; box-shadow: 0 20px 50px rgba(0,0,0,0.08);">
                <div style="position: relative; overflow: hidden; border-radius: 18px; background: #fff; height: 450px; display: flex; align-items: center; justify-content: center;">
                    <?php 
                        $imagePath = !empty($row['productPic']) ? "../seller/productPic/".$row['productPic'] : "../images/store_banner.png";
                    ?>
                    <img style="max-width: 100%; max-height: 100%; object-fit: contain; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);" 
                         id="main-product-image" 
                         src="<?= $imagePath ?>"
                         onmouseover="this.style.transform='scale(1.15)'" 
                         onmouseout="this.style.transform='scale(1)'"
                         onerror="this.src='../images/store_banner.png'">
                </div>
                
                <!-- Zoom Indicator icon -->
                <div style="position: absolute; bottom: 30px; right: 30px; background: rgba(255,255,255,0.9); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1); pointer-events: none;">
                    <i class="fa fa-search-plus" style="color: var(--primary);"></i>
                </div>
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="col-md-6" style="flex: 1.2; min-width: 350px; text-align: left;">
            <div style="margin-bottom: 20px;">
                <span class="badge" style="background: rgba(125, 170, 203, 0.1); color: var(--primary); padding: 6px 15px; border-radius: 20px; font-weight: 700; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; display: inline-block;">
                    <?= htmlspecialchars($row['productFor']); ?>
                </span>
                <h1 style="font-size: 42px; font-weight: 900; color: #1a1a1a; line-height: 1.1; margin-bottom: 20px; letter-spacing: -1px;">
                    <?= htmlspecialchars($row['productName']); ?>
                </h1>
            </div>

            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
                <div style="font-size: 32px; font-weight: 900; color: var(--accent); display: flex; align-items: baseline; gap: 5px;">
                    <small style="font-size: 16px; font-weight: 700; opacity: 0.8;">UGX</small>
                    <?= number_format($row['price']); ?>
                </div>
                <div style="width: 1px; height: 25px; background: #ddd;"></div>
                <div style="color: #28a745; font-weight: 700; font-size: 14px; background: rgba(40, 167, 69, 0.1); padding: 4px 10px; border-radius: 5px;">
                    <i class="fa fa-check-circle"></i> In Stock
                </div>
            </div>

            <div class="comment-inner-card" style="border: none; background: #f8fafc; padding: 25px; border-radius: 16px; margin-bottom: 35px;">
                <h4 style="font-size: 16px; font-weight: 800; color: #444; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                    <i class="fa fa-info-circle" style="color: var(--primary);"></i> Product Description
                </h4>
                <p style="font-size: 15px; color: #555; line-height: 1.7; margin: 0;">
                    <?= nl2br(htmlspecialchars($row['description'])); ?>
                </p>
            </div>

            <form action="" method="post" style="margin-bottom: 40px;">
                <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 30px;">
                    <?php if($row['productFor']=="Men's Fashion" || $row['productFor']=="Women's Fashion" || $row['productFor']=="Baby's Fashion"): ?>
                    <div style="flex: 1; min-width: 140px;">
                        <label style="font-weight: 800; font-size: 14px; color: #333; margin-bottom: 8px; display: block;">Select Size</label>
                        <select name="productSize" class="form-input-modern" style="width: 100%; height: 50px; cursor: pointer; border: 2px solid #eee; transition: border-color 0.3s;" required>
                            <option value="" selected disabled>Choose Size</option>
                            <option value="Short">Small (S)</option>
                            <option value="Medium">Medium (M)</option>
                            <option value="Large">Large (L)</option>
                            <option value="Extra Large">Extra Large (XL)</option>
                        </select>
                    </div>
                    <?php else: ?>
                        <input type="hidden" name="productSize" value="Default">
                    <?php endif; ?>

                    <div style="width: 120px;">
                        <label style="font-weight: 800; font-size: 14px; color: #333; margin-bottom: 8px; display: block;">Quantity</label>
                        <input type="number" name="pQuantity" value="1" min="1" class="form-input-modern" style="width: 100%; height: 50px; text-align: center; border: 2px solid #eee;">
                    </div>
                </div>

                <div style="display: flex; gap: 15px;">
                    <button name="submit" class="btn btn-accent" style="flex: 2; height: 60px; font-size: 20px; font-weight: 800; display: flex; align-items: center; justify-content: center; gap: 12px; border-radius: 15px; box-shadow: 0 10px 20px rgba(206, 38, 38, 0.2);">
                        <i class="fa fa-shopping-cart" style="font-size: 24px;"></i> Add To Cart
                    </button>
                    <a href="index.php" class="btn" style="flex: 1; height: 60px; border: 2px solid #eee; display: flex; align-items: center; justify-content: center; border-radius: 15px; background: white; color: #666; font-weight: 700; text-decoration: none; transition: all 0.3s; font-size: 16px;">
                        <i class="fa fa-arrow-left" style="margin-right: 8px;"></i> Shop
                    </a>
                </div>

                <?php if(isset($msg)): ?>
                <div style="margin-top: 20px; padding: 15px; background: rgba(206, 38, 38, 0.05); color: var(--accent); border-radius: 10px; font-weight: 600; font-size: 14px; display: flex; align-items: center; gap: 10px; border: 1px solid rgba(206, 38, 38, 0.1);">
                    <i class="fa fa-exclamation-circle"></i> <?= $msg ?>
                </div>
                <?php endif; ?>
            </form>

            <!-- Trust Badges Section -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; padding-top: 30px; border-top: 1px solid #eee;">
                <div style="text-align: center;">
                    <i class="fa fa-truck" style="font-size: 20px; color: var(--primary); margin-bottom: 8px;"></i>
                    <div style="font-size: 11px; font-weight: 800; color: #444; text-transform: uppercase;">Fast Delivery</div>
                    <div style="font-size: 10px; color: #888;">Within 24 Hours</div>
                </div>
                <div style="text-align: center;">
                    <i class="fa fa-shield" style="font-size: 20px; color: var(--primary); margin-bottom: 8px;"></i>
                    <div style="font-size: 11px; font-weight: 800; color: #444; text-transform: uppercase;">Secure Payment</div>
                    <div style="font-size: 10px; color: #888;">Student Protected</div>
                </div>
                <div style="text-align: center;">
                    <i class="fa fa-refresh" style="font-size: 20px; color: var(--primary); margin-bottom: 8px;"></i>
                    <div style="font-size: 11px; font-weight: 800; color: #444; text-transform: uppercase;">Easy Returns</div>
                    <div style="font-size: 10px; color: #888;">7 Day Window</div>
                </div>
            </div>
        </div>
    </div>
</div>







<?php include "footer.php" ?>

</body>
</html>