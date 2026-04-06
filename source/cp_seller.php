	// Safely get the store and seller information
	$store_result = $mysqli->query("SELECT * FROM store WHERE email='$email'");
	$store_row = $store_result->fetch_assoc();
	$store_name = ($store_row && isset($store_row['store_name'])) ? $store_row['store_name'] : '';
	$store_description = ($store_row && isset($store_row['store_description'])) ? $store_row['store_description'] : '';
	$store_banner = ($store_row && isset($store_row['store_banner']) && !empty($store_row['store_banner'])) ? "../seller/storePic/".$store_row['store_banner'] : "../images/store_banner.png";
	$store_logo = ($store_row && isset($store_row['store_logo']) && !empty($store_row['store_logo'])) ? "../seller/storePic/".$store_row['store_logo'] : "../images/upload.png";

	$seller_result = $mysqli->query("SELECT * FROM sellerinfo WHERE email='$email'");
	$seller_row = $seller_result->fetch_assoc();
	$address = ($seller_row && isset($seller_row['address'])) ? $seller_row['address'] : ($user['address'] ?? '');
	$category = ($seller_row && isset($seller_row['category'])) ? $seller_row['category'] : '';
	$postal_code = ($seller_row && isset($seller_row['postal_code'])) ? $seller_row['postal_code'] : '';
}
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

<!-- Custom JavaScript -->
<script type="text/javascript" src="../js/cp_seller.js"></script>

	<title>Complete profile | Seller</title>
</head>
<body>
	
	<?php include "header.php" ?>
	<?php include "header2.php" ?>
	<?php include "sidebar.php" ?>

	<div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
		<div class="text-center" style="margin-bottom: 40px;">
			<h1 style="color: #CE2626; font-weight: 800; font-size: 38px;">Complete Your Seller Profile</h1>
			<p style="color: #666; font-size: 16px;">Set up your store details and upload verification documents</p>
			
			<?php 
			if (isset($_SESSION['message'])) {
				echo '<div class="alert alert-info" style="display: inline-block; margin-top: 20px;">'.$_SESSION['message'].'</div>';
				unset($_SESSION['message']);
			}
			?>
		</div>

		<form method="POST" action="../seller/cp_seller_b.php" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-8 mb-4">
					<div class="bella-card" style="padding: 40px; height: 100%;">
						<h3 style="font-weight: 800; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">Store Details</h3>
						
						<label class="form-label-modern">Student Name</label>
						<input class="form-input-modern" type="text" name="name" placeholder="Your Full Name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

						<div class="row">
							<div class="col-md-6">
								<label class="form-label-modern">Phone Number</label>
								<input class="form-input-modern" type="text" name="phone" placeholder="E.g., 07XXXXXXXX" value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>" required>
							</div>
							<div class="col-md-6">
								<label class="form-label-modern">Store Name</label>
								<input class="form-input-modern" type="text" name="store_name" placeholder="E.g., Your Store Name" value="<?php echo htmlspecialchars($store_name); ?>" required>
							</div>
						</div>

						<label class="form-label-modern">Address</label>
						<input class="form-input-modern" type="text" name="address" placeholder="Store Address / Location" value="<?php echo htmlspecialchars($address); ?>" required>

						<div class="row">
							<div class="col-md-6">
								<label class="form-label-modern">Shop Category</label>
								<input class="form-input-modern" type="text" name="category" placeholder="E.g., Electronics, Clothing" value="<?php echo htmlspecialchars($category); ?>" required>
							</div>
							<div class="col-md-6">
								<label class="form-label-modern">Postal Code</label>
								<input class="form-input-modern" type="number" name="Postalcode" placeholder="Postal Code" value="<?php echo htmlspecialchars($postal_code); ?>" required>
							</div>
						</div>

						<div class="row" style="margin-top: 20px;">
							<div class="col-md-6">
								<label class="form-label-modern">Store Banner Image</label>
								<div style="background: #fdfdfd; border: 2px dashed #ddd; border-radius: 12px; padding: 20px; text-align: center; margin-bottom: 20px;">
									<img class="img-responsive" id="store_banner_upload" src="<?php echo $store_banner; ?>" style="max-height: 150px; margin: 0 auto 15px; border-radius: 8px;">
									<input style="width: 100%; border: none;" type="file" id="store_banner_image_select" name="storePic" onchange="readURL3(this)" accept=".jpg,.png">
								</div>
							</div>
							<div class="col-md-6">
								<label class="form-label-modern">Store Badge / Logo</label>
								<div style="background: #fdfdfd; border: 2px dashed #ddd; border-radius: 12px; padding: 20px; text-align: center; margin-bottom: 20px;">
									<img class="img-responsive" id="shop_logo_upload" src="<?php echo $store_logo; ?>" style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto 15px; border-radius: 12px; border: 1px solid #eee;">
									<input style="width: 100%; border: none;" type="file" id="shop_logo_image_select" name="storeLogo" onchange="readURL5(this)" accept=".jpg,.png">
								</div>
							</div>
						</div>

						<label class="form-label-modern">Store Description (About Store)</label>
						<textarea class="form-input-modern" name="description" placeholder="Tell buyers about your store..." rows="4" required style="resize: vertical;"><?php echo htmlspecialchars($store_description); ?></textarea>
					</div>
				</div>

				<div class="col-md-4">
					<div class="bella-card" style="padding: 40px; text-align: center; margin-bottom: 25px;">
						<h3 style="font-weight: 800; margin-bottom: 20px; font-size: 18px;">Profile Picture</h3>
						<img id="img-upload" src="../images/upload.png" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 3px solid #eee; margin-bottom: 15px;">
						<input style="width: 100%;" type="file" id="imgInp" name="sellerPic" onchange="readURL(this)" accept=".jpg,.png">
					</div>

					<div class="bella-card" style="padding: 40px; text-align: center;">
						<h3 style="font-weight: 800; margin-bottom: 20px; font-size: 18px;">Verification Document</h3>
						<p style="font-size: 12px; color: #888; margin-bottom: 15px;">Upload a scan of your Student ID or NID</p>
						<img id="img-upload2" src="../images/upload2.png" style="max-width: 100%; max-height: 120px; border-radius: 8px; margin-bottom: 15px;">
						<input style="width: 100%;" type="file" id="imgInp2" name="sellerDoc" onchange="readURL2(this)" accept=".jpg,.png">
					</div>
				</div>
			</div>

			<div class="text-center" style="margin-top: 20px;">
				<button type="submit" name="submit" class="btn btn-accent" style="padding: 15px 50px; font-size: 18px; font-weight: 800; border-radius: 12px;"><i class="fa fa-check-circle"></i> Submit Seller Profile</button>
			</div>
		</form>
	</div>

	<!-- Address info start -->																		
<!-- <div align="center" class="row container" style="padding: 20px;background-color: #182938;width: 100%;margin: 0;color: white">
		<div class="col-md-4">
		<h3>Address:</h3>
		<h5>Sample address</h5>
		<h6>1032, sample address</h6>
	</div>

	<div class="col-md-4">
		<h3>Address:</h3>
		<h5>Sample address</h5>
		<h6>1032, sample address</h6>
	</div>

	<div class="col-md-4">
		<h3>Address:</h3>
		<h5>Sample address</h5>
		<h6>1032, sample address</h6>
	</div>
</div> -->
<!-- Address info end -->

<?php include "footer.php" ?>


</body>
</html>