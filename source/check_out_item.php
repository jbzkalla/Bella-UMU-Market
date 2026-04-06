<?php
if(!isset($_SESSION)) session_start();

$_SESSION['ref'] ="";

if($_SESSION['ref'] == '1'){
header("Refresh:0; url=check_out_item.php");
	$_SESSION['ref'] = 0;
}
require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $email = $_SESSION['email'];
}

if(isset($_GET['del'])){
    $cId = $_GET['del'];
    header("Refresh:0; url=check_out_item.php");
    $delQuery = " DELETE FROM `cart` WHERE `cart`.`cartId` = '$cId'  ";
    mysqli_query($mysqli,$delQuery);
}

if(isset($_POST['submit'])){
    $cartId = $_POST['cartId'];
    $updateQuantity = $_POST['quantity'];

    $upQuery = "UPDATE cart SET customerQty='$updateQuantity' WHERE cartId='$cartId'";
    mysqli_query($mysqli,$upQuery);
}

$sId = session_id();
$result = $mysqli->query("SELECT * FROM cart WHERE sId='$sId'");
	
	$empty="";

?>



<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Check Out| Item</title>
</head>
<body>
	<?php include "header.php" ?>
	<?php include "header2.php" ?>
		<?php include "sidebar.php" ?>
	
	<div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
		<h1 class="page-title text-center" style="font-size: 38px; margin-bottom: 40px;">Items in your cart</h1>
		
        <div class="bella-card" style="padding: 0; overflow: hidden; margin-bottom: 40px;">
            <div class="table-responsive">
		        <table class="table text-center" style="margin-bottom: 0;">
                    <thead style="background-color: rgba(125, 170, 203, 0.1);">
		                <tr>
                            <th style="padding: 15px; border-bottom: none; color: #F7941E;">SL</th>
                            <th style="padding: 15px; text-align: left; border-bottom: none; color: #F7941E;">Item</th>
                            <th style="padding: 15px; border-bottom: none; color: #F7941E;">Quantity</th>
                            <th style="padding: 15px; border-bottom: none; color: #F7941E;">Unit Price</th>
                            <th style="padding: 15px; border-bottom: none; color: #F7941E;">Total</th>
                            <th style="padding: 15px; border-bottom: none; color: #F7941E;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                              $i = 0;
                              $sum = 0;
                              while ($cartInfo = mysqli_fetch_array($result)){
                                  $i++;
                                  $empty = $cartInfo['sId'];
                        ?>
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="vertical-align: middle; border: none;"><?= $i; ?></td>
                            <td style="vertical-align: middle; text-align: left; border: none;">
                                <div style="display: flex; align-items: center; gap: 15px;">
                                    <?php echo "<img src='../seller/productPic/".$cartInfo['proPic']."' style='width: 60px; height: 60px; border-radius: 8px; object-fit: cover;'>"; ?>
                                    <div>
                                        <div style="font-weight: 700; color: var(--text);"><?= $cartInfo['proName']; ?></div>
                                        <div style="font-size: 12px; color: #888;">Size: <?= $cartInfo['size']; ?></div>
                                    </div>
                                </div>
                            </td>
                            <td style="vertical-align: middle; border: none;">
                                <form action="" method="post" style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                                    <input type="hidden" name="cartId" value="<?= $cartInfo['cartId']; ?>">
                                    <input class="form-control" style="width: 70px; text-align: center; border-radius: 8px;" type="number" name="quantity" value="<?= $cartInfo['customerQty']; ?>">
                                    <button type="submit" name="submit" class="btn btn-sm btn-primary" style="border-radius: 8px; padding: 6px 15px;"><i class="fa fa-refresh"></i> Update</button>
                                </form>
                            </td>
                            <td style="vertical-align: middle; font-weight: 600; border: none;">UGX  <?= number_format($cartInfo['price']); ?></td>
                            <td style="vertical-align: middle; font-weight: 800; color: var(--accent); border: none;">UGX  <?= number_format($total = ($cartInfo['price'] * $cartInfo['customerQty'])); ?></td>
                            <td style="vertical-align: middle; border: none;"><a href="?del=<?= $cartInfo['cartId']; ?>" onclick='return confirm_delete()' class="btn btn-sm btn-danger" style="border-radius: 8px; padding: 6px 12px;"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php $sum = ($sum + $total); ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php $_SESSION['cart'] = $i; ?>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
	            <a href="index.php" class="btn btn-primary" style="padding: 12px 25px; border-radius: 10px; font-weight: 700;"><i class="fa fa-arrow-left"></i> Continue Shopping</a>
            </div>
            <div class="col-md-6">
                <div class="bella-card" style="padding: 30px;">
                    <h3 style="font-weight: 800; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">Order Summary</h3>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 16px;">
                        <span style="color: #666;">Item Total</span>
                        <span style="font-weight: 600;">UGX <?= number_format($sum); ?></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 16px;">
                        <span style="color: #666;">Shipping</span>
                        <span style="font-weight: 600;">UGX <?= number_format($shippingCost=100); ?></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 25px; font-size: 20px; border-top: 2px dashed #eee; padding-top: 20px;">
                        <span style="font-weight: 800;">Total</span>
                        <span style="font-weight: 900; color: var(--accent);">UGX <?= number_format($grandTotal = ($sum + $shippingCost)); ?></span>
                    </div>
                    <a href="payment.php"><button <?= ($empty=='') ? 'disabled' : ''; ?> class="btn btn-accent" style="width: 100%; border-radius: 10px; font-size: 18px; padding: 15px; font-weight: 800;">Proceed to Checkout</button></a>
                </div>
            </div>
        </div>
    </div>

	
	
<div style="margin-top: 250px">
<?php include "address.php" ?>
<?php include "footer.php" ?>
</div>



<script>
    function confirm_delete(){
        return confirm("Are you sure you want to delete this data?");
    }
    //end of delete operation
</script>

</body>
</html>