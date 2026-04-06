<?php

require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $email = $_SESSION['email'];
}

 $query = $_GET['searchQuery'];

 $query = htmlspecialchars($query);

  $raw_results = $mysqli->query("SELECT * FROM productlist WHERE (`shopName` LIKE '%".$query."%') OR (`productFor` LIKE '%".$query."%') OR (`productName` LIKE '%".$query."%') OR (`price` LIKE '%".$query."%') OR (`keyword` LIKE '%".$query."%')");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

  <!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Search Result</title>
</head>
<body>
	<?php include "header.php" ?>
	<?php include "header2.php" ?>
    <?php include "sidebar.php" ?>


<?php
	if($raw_results->num_rows > 0){ ?>

<div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
    <div style="margin-bottom: 40px; border-bottom: 3px solid var(--accent); display: inline-block; padding-bottom: 10px;">
        <h1 class="page-title" style="font-size: 32px; margin: 0;">Search Results for "<?= htmlspecialchars($query); ?>"</h1>
        <p style="color: #999; margin-top: 5px;"><?= $raw_results->num_rows; ?> items found</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; padding: 20px 0;">
        <?php while($row = mysqli_fetch_array($raw_results)){ ?>
        <?php if($row['quantity'] > 0): ?>
        <div>
            <div class="bella-card" style="height: 100%; padding: 0; overflow: hidden; position: relative;">
                <div style="position: relative; height: 240px; overflow: hidden; background: #f5f5f5;">
                    <a href="product_page.php?pId=<?= $row['id']; ?>">
                        <img style="width:100%; height:100%; object-fit: cover; transition: transform 0.5s ease;" 
                             src="../seller/productPic/<?= htmlspecialchars($row['productPic']); ?>"
                             onmouseover="this.style.transform='scale(1.08)'" 
                             onmouseout="this.style.transform='scale(1)'"
                             onerror="this.src='../images/store_banner.png'">
                    </a>
                </div>

                <div style="padding: 25px;">
                    <p style="font-size: 11px; color: var(--primary); font-weight: 800; text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px;"><?= htmlspecialchars($row['shopName']); ?></p>
                    <h4 style="font-size: 17px; font-weight: 700; height: 48px; overflow: hidden; margin-bottom: 15px; text-align: left;">
                        <a href="product_page.php?pId=<?= $row['id']; ?>" style="color: #333; text-decoration: none;"><?= htmlspecialchars($row['productName']); ?></a>
                    </h4>
                    
                    <div class="comment-inner-card" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                        <span style="font-size: 19px; font-weight: 900; color: #444;">
                            <small style="font-size: 11px; opacity: 0.7;">UGX</small> <?= number_format($row['price']); ?>
                        </span>
                        <div style="color: #ffc107; font-size: 13px;">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <a href="product_page.php?pId=<?= $row['id']; ?>" class="btn btn-outline-primary" style="flex: 1; border-radius: 10px !important; font-weight: 700; border: 2px solid var(--primary); color: var(--primary); display: flex; align-items: center; justify-content: center; text-decoration: none;">Details</a>
                        <a href="product_page.php?pId=<?= $row['id']; ?>&order=direct" class="btn btn-accent" style="flex: 1.5; border-radius: 10px !important; font-weight: 700; background: var(--accent); color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php } ?>
    </div>
</div>
<?php
	}
	else{
		echo "No Result Found!!!!!\nTry Again";
	}

?>


<?php include "address.php" ?>
<?php include "footer.php" ?>
</body>
</html>