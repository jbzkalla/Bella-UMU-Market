<?php 
if(!isset($_SESSION)) session_start();

require "../login-system/db.php";
//include ('../seller/storeProductList.php');

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
$email = $_SESSION['email'];

$result = $mysqli->query("SELECT * FROM store WHERE email='$email'");

if($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $store_name = $user['store_name'];
}
}
$results = mysqli_query($mysqli, "SELECT * FROM productlist");

$result_boost = mysqli_query($mysqli, "SELECT * FROM productlist WHERE boost='1'");

//if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
//    $store_name = $user['store_name'];
//}
/*else{
    header("location:index.php");
}
*/
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
 <script src="../js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="../js/j1.js"></script>

    <title>Bella UMU Market - Home</title>
</head>
<body>

<div>

<?php 
include "header.php"; 
include "header2.php"; 
include "sidebar.php"; 
?>

<!-- Premium Hero Banner -->
<div style="max-width: 1000px; margin: 30px auto; padding: 0 20px; text-align: center;">
    <div style="border-radius: 24px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,0,0,0.15); position: relative;">
        <img src="../images/banner.png" style="width: 100%; height: 420px; object-fit: cover; display: block;" alt="Bella UMU Market - Student Marketplace at Uganda Martyrs University">
        <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(125,170,203,0.75) 0%, rgba(0,0,0,0.1) 100%); display: flex; flex-direction: column; align-items: flex-start; justify-content: center; padding: 50px;">
            <h1 style="color: white; font-weight: 900; font-size: 38px; margin: 0 0 10px; text-shadow: 0 2px 8px rgba(0,0,0,0.4);">Bella UMU Market</h1>
            <p style="color: rgba(255,255,255,0.92); font-size: 17px; margin-bottom: 25px; max-width: 380px; text-shadow: 0 1px 4px rgba(0,0,0,0.3);">Buy & Sell within the Uganda Martyrs University campus community.</p>
            <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                <a href="allC.php" class="btn" style="background: #CE2626; color: white; font-weight: 800; border-radius: 25px; padding: 12px 28px; font-size: 15px;"><i class="fa fa-shopping-bag"></i> Shop Now</a>
                <a href="new_store_description.php" class="btn" style="background: #F8A036; color: white; font-weight: 800; border-radius: 25px; padding: 12px 28px; font-size: 15px;"><i class="fa fa-tag"></i> Sell Your Items</a>
            </div>
        </div>
    </div>
</div>



<!-- Product Information Start -->
<div class="section-wrapper" style="margin-top: 50px;">
    
    <!-- Trending Section Start -->
    <div style="margin-bottom: 60px;">
        <h3 class="page-title" style="border-bottom: 3px solid var(--accent); display: inline-block; padding-bottom: 10px; margin-bottom: 30px;">Trending Now</h3>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; padding: 20px 0;">
            <?php while($row = mysqli_fetch_array($result_boost)){ ?>
            <?php if($row['quantity']>0): ?>
            <div style="min-width: 0;">
                <div class="bella-card" style="height: 100%; padding: 0; overflow: hidden; position: relative;">
                    <div style="position: relative; height: 220px; overflow: hidden;">
                        <a href="product_page.php?pId=<?= $row['id']; ?>">
                            <?php echo "<img style=\"width:100%; height:100%; object-fit: cover; transition: transform 0.5s ease;\" src='../seller/productPic/".$row['productPic']."' onmouseover=\"this.style.transform='scale(1.1)'\" onmouseout=\"this.style.transform='scale(1)'\">"; ?>
                        </a>
                        <div style="position: absolute; top: 15px; left: 15px; background: var(--accent); color: white; padding: 5px 15px; border-radius: 20px; font-weight: 700; font-size: 12px; box-shadow: 0 4px 10px rgba(206,38,38,0.3);">TRENDING</div>
                    </div>
                    <div style="padding: 20px;">
                        <p style="font-size: 11px; color: var(--primary); font-weight: 800; text-transform: uppercase; margin-bottom: 8px;"><?= $row['shopName']; ?></p>
                        <h4 style="font-size: 18px; font-weight: 700; height: 48px; overflow: hidden; margin-bottom: 15px;">
                            <a href="product_page.php?pId=<?= $row['id']; ?>" style="color: #333; text-decoration: none;"><?= $row['productName']; ?></a>
                        </h4>
                        <div class="comment-inner-card" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <span style="font-size: 20px; font-weight: 900; color: #555;">
                                <small style="font-size: 12px; opacity: 0.8;">UGX</small> <?= number_format($row['price']); ?>
                            </span>
                            <div style="color: #ffc107; font-size: 14px;">
                                <i class="fa fa-star"></i> 4.8
                            </div>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <a href="product_page.php?pId=<?= $row['id']; ?>" class="btn btn-outline-primary" style="flex: 1; border-radius: 10px !important; font-weight: 700;">Details</a>
                            <a href="product_page.php?pId=<?= $row['id']; ?>&order=direct" class="btn btn-accent" style="flex: 1.5; border-radius: 10px !important; font-weight: 700;">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php } ?>
        </div>
    </div>
    <!-- Trending Section End -->

    <!-- All Products Start -->
    <div style="margin-bottom: 60px;">
        <h3 class="page-title" style="border-bottom: 3px solid var(--accent); display: inline-block; padding-bottom: 10px; margin-bottom: 30px;">All Products</h3>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; padding: 20px 0;">
            <?php while($row = mysqli_fetch_array($results)){ ?>
            <div style="min-width: 0;">
                <div class="bella-card" style="height: 100%; padding: 0; overflow: hidden; position: relative;">
                    <div style="position: relative; height: 220px; overflow: hidden;">
                        <a href="product_page.php?pId=<?= $row['id']; ?>">
                            <?php echo "<img style=\"width:100%; height:100%; object-fit: cover; transition: transform 0.5s ease;\" src='../seller/productPic/".$row['productPic']."' onmouseover=\"this.style.transform='scale(1.1)'\" onmouseout=\"this.style.transform='scale(1)'\">"; ?>
                        </a>
                    </div>
                    <div style="padding: 20px;">
                        <p style="font-size: 11px; color: var(--primary); font-weight: 800; text-transform: uppercase; margin-bottom: 8px;"><?= $row['shopName']; ?></p>
                        <h4 style="font-size: 18px; font-weight: 700; height: 48px; overflow: hidden; margin-bottom: 15px;">
                            <a href="product_page.php?pId=<?= $row['id']; ?>" style="color: #333; text-decoration: none;"><?= $row['productName']; ?></a>
                        </h4>
                        <div class="comment-inner-card" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <span style="font-size: 20px; font-weight: 900; color: #555;">
                                <small style="font-size: 12px; opacity: 0.8;">UGX</small> <?= number_format($row['price']); ?>
                            </span>
                            <div style="color: #ffc107; font-size: 14px;">
                                <i class="fa fa-star"></i> 4.8
                            </div>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <a href="product_page.php?pId=<?= $row['id']; ?>" class="btn btn-outline-primary" style="flex: 1; border-radius: 10px !important; font-weight: 700;">Details</a>
                            <a href="product_page.php?pId=<?= $row['id']; ?>&order=direct" class="btn btn-accent" style="flex: 1.5; border-radius: 10px !important; font-weight: 700;">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- All Products End -->

</div>
<!-- Product Information End -->

<div align="center" style="margin: 50px 0;">
    <div class="bella-card" style="display: inline-block; padding: 40px 60px;">
        <h3 style="color: #CE2626; font-weight: 800; margin-bottom: 20px;">What is Bella UMU Market?</h3>
        <p style="max-width: 600px; color: #F8A036; line-height: 1.6;">Bella UMU Market is the official student marketplace for Uganda Martyrs University. Buy and sell electronics, furniture, books, and more within your campus community.</p>
        <a href="about.php" class="btn btn-primary" style="margin-top: 20px; border-radius: 10px !important; padding: 10px 30px;">Learn More</a>
    </div>
</div>

<div align="center" style="margin-top: 50px; border-radius: 20px; overflow: hidden; margin-left: 5%; margin-right: 5%;">
    <img style="width: 100%; height: auto; border-radius: 20px;" src="../img/Buy Sell Banner.jpg">
</div>

</div>

<?php include "footer.php" ?>

</body>
</html>
