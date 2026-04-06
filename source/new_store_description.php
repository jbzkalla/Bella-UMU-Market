
<?php 
  require "../login-system/db.php";
  
  if(!isset($_SESSION)) session_start();

  // Redirect to login if not logged in
  if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1) {
      header("location:signIn.php");
      exit();
  }

  include ('../seller/storeProductList.php');

  $email = $_SESSION['email'];
  $result = $mysqli->query("SELECT * FROM store WHERE email='$email'");
  $result2 = $mysqli->query("SELECT * FROM productlist WHERE email='$email'");

  $user = $result->fetch_assoc();

  if( $user['store'] == 0){
    header("location:create_new_store.php");
    exit();
  }

  $store_name = $user['store_name'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>Store | Description</title>

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

<script type="text/javascript" src="../js/cp_seller.js"></script>


<style>


/*Style for Rating Start***************************************/

/* Three column layout */

.b{
  color: #F8A036;
}

.side {
    float: left;
    width: 15%;
    margin-top:10px;
}

.middle {
    margin-top:10px;
    float: left;
    width: 70%;
}

/* Place text to the right */
.right {
    text-align: right;
    
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* The bar container */
.bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
    .side, .middle {
        width: 100%;
    }
    .right {
        display: none;
    }
}
/*Style for Rating End***************************************/


/*Style for Product Image show start***************************************/
.card {
    box-shadow: 0 14px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 220px;
    margin: 10px 0px 10px;
   padding: 15px;

    
}

.card:hover {
box-shadow: 2px 2px 20px;
}

/*Style for Product Image show End***************************************/

</style>

</head>
<body class="new_store_description" style="background-color: var(--bg);">

	<?php include "header.php" ?>
    <?php include "header2.php" ?>
	<?php include "sidebar.php" ?>

    <div class="section-wrapper" style="margin-bottom: 80px;">
        
        <!-- Store Hero Banner -->
        <div style="position: relative; margin-bottom: 60px;">
            <div style="position: relative; height: 350px; border-radius: 0 0 20px 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                <div style="position: absolute; top: 15px; right: 20px; z-index: 10;">
                    <a href="member_plane.php" class="btn btn-accent" style="border-radius: 8px; font-weight: 700;"><i class="fa fa-star"></i> Upgrade Membership</a>
                </div>
                <?php 
                    $banner_src = !empty($user['store_banner']) ? "../seller/storePic/".$user['store_banner'] : "../images/store_banner.png";
                    echo "<img style=\"width: 100%; height: 100%; object-fit: cover;\" src='$banner_src'>"; 
                ?>
            </div>
            
            <!-- Store Badge / Logo Overlap -->
            <div style="position: absolute; bottom: -40px; left: 40px; width: 120px; height: 120px; border-radius: 20px; background: white; padding: 5px; box-shadow: 0 8px 25px rgba(0,0,0,0.15); z-index: 5;">
                <?php 
                    $logo_src = !empty($user['store_logo']) ? "../seller/storePic/".$user['store_logo'] : "../images/upload.png";
                    echo "<img style=\"width: 100%; height: 100%; object-fit: cover; border-radius: 15px;\" src='$logo_src'>"; 
                ?>
            </div>

            <!-- Store Name on Top Category style -->
            <div style="position: absolute; bottom: -35px; left: 180px; z-index: 5;">
                <h1 style="margin: 0; font-weight: 900; color: #222; text-shadow: 0 0 10px rgba(255,255,255,0.8);"><?= htmlspecialchars($store_name) ?></h1>
                <span class="badge" style="background: var(--accent); padding: 5px 12px; border-radius: 5px; font-weight: 700; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">Verified Student Seller</span>
            </div>
        </div>

        <!-- Store Info & Actions -->
        <div class="row" style="margin-bottom: 40px;">
            <div class="col-md-8">
                <div class="bella-card" style="height: 100%; padding: 30px;">
                    <h3 style="font-weight: 800; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">About Store</h3>
                    <p style="font-size: 16px; color: #555; line-height: 1.6;"><?= nl2br(htmlspecialchars($user['store_description'])) ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bella-card" style="height: 100%; padding: 30px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
                    <div style="font-size: 48px; color: #F8A036; margin-bottom: 10px;">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                    </div>
                    <h3 style="font-weight: 800; margin-bottom: 5px;">4.5/5 Rating</h3>
                    <p style="color: #888; margin-bottom: 20px;">Based on 254 reviews</p>
                    <a href="add_product.php" class="btn btn-accent" style="width: 100%; padding: 12px; border-radius: 10px; font-weight: 800; font-size: 16px;"><i class="fa fa-plus-circle"></i> Add New Product</a>
                </div>
            </div>
        </div>

        <!-- Store Products -->
        <h3 style="font-weight: 800; margin-bottom: 25px; border-bottom: 3px solid var(--accent); display: inline-block; padding-bottom: 10px;">Manage Products</h3>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
            <?php while($row = mysqli_fetch_array($result2)){ ?>
            <div>
                <div class="bella-card" style="height: 100%; padding: 0; overflow: hidden; position: relative;">
                    <div style="position: relative; height: 240px; overflow: hidden; background: #f5f5f5;">
                        <img style="width:100%; height:100%; object-fit: cover; transition: transform 0.5s ease;" 
                             src="../seller/productPic/<?= htmlspecialchars($row['productPic']); ?>"
                             onmouseover="this.style.transform='scale(1.08)'" 
                             onmouseout="this.style.transform='scale(1)'"
                             onerror="this.src='../images/store_banner.png'">
                    </div>

                    <div style="padding: 25px;">
                        <h4 style="font-size: 17px; font-weight: 700; height: 48px; overflow: hidden; margin-bottom: 15px;">
                            <?= htmlspecialchars($row['productName']); ?>
                        </h4>
                        
                        <div style="font-size: 19px; font-weight: 900; color: #444; margin-bottom: 20px;">
                            <small style="font-size: 11px; opacity: 0.7;">UGX</small> <?= number_format($row['price']); ?>
                        </div>

                        <div style="display: flex; gap: 10px;">
                            <a href="add_product.php?edit=<?= $row['id']; ?>" class="btn btn-outline-primary" style="flex: 1; border-radius: 8px; font-weight: 700; border: 2px solid var(--primary); color: var(--primary); display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="fa fa-pencil" style="margin-right: 5px;"></i> Edit</a>
                            <a href="../seller/storeProductList.php?del=<?= $row['id']; ?>" onclick="return confirm_delete()" class="btn btn-danger" style="flex: 1; border-radius: 8px; font-weight: 700; background: #dc3545; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none; border: none;"><i class="fa fa-trash" style="margin-right: 5px;"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

	<!-- Address info start -->																		
<?php include "address.php" ?>  
<!-- Address info end -->

<?php include "footer.php" ?>

<script>
  
  function confirm_delete(){
        return confirm("Are you sure you want to permanently delete this data?");
    }

</script>

</body>
</html>