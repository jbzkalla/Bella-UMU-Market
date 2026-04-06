<?php
require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

$email = "Guest";
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $email = $_SESSION['email'];
}

$pCat = isset($_GET['pCat']) ? $_GET['pCat'] : '';
$sub = isset($_GET['sub']) ? $_GET['sub'] : '';

// Build the display category name
$displayCategory = $pCat;
if($sub != '') $displayCategory .= " — " . ucwords(str_replace('-', ' ', $sub));

// Category icon map
$iconMap = [
    "Men's Fashion"       => "fa-male",
    "Women's Fashion"     => "fa-female",
    "Baby's Fashion"      => "fa-child",
    "Phone and Tablets"   => "fa-plug",
    "Sports and Travels"  => "fa-bicycle",
    "Home and Living"     => "fa-home",
    "Books and Stationery"=> "fa-book",
    "Others"              => "fa-ellipsis-h",
];
$icon = isset($iconMap[$pCat]) ? $iconMap[$pCat] : "fa-tag";

// Build query
$query = "SELECT * FROM productlist WHERE 1=1";
if($pCat != '') {
    $query .= " AND productFor LIKE '%" . mysqli_real_escape_string($mysqli, $pCat) . "%'";
}
if($sub != '') {
    $cleanSub = mysqli_real_escape_string($mysqli, $sub);
    $query .= " AND (keyword LIKE '%$cleanSub%' OR productName LIKE '%$cleanSub%')";
}
$query .= " ORDER BY boost DESC, id DESC";

$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title><?= htmlspecialchars($displayCategory); ?> - Bella UMU Market</title>
</head>
<body style="background-color: var(--bg);">

    <?php include "header.php" ?>
    <?php include "header2.php" ?>
    <?php include "sidebar.php" ?>

    <div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
        
        <!-- Breadcrumb & Title -->
        <div style="margin-bottom: 50px;">
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                <a href="allC.php" style="color: var(--primary); text-decoration: none; font-weight: 700; font-size: 15px;">
                    <i class="fa fa-arrow-left" style="margin-right: 5px;"></i> All Categories
                </a>
                <span style="color: #ccc;">/</span>
                <span style="color: #F8A036; font-weight: 700; font-size: 15px;"><?= htmlspecialchars($pCat); ?></span>
                <?php if($sub != ''): ?>
                <span style="color: #ccc;">/</span>
                <span style="color: #999; font-size: 15px;"><?= ucwords($sub); ?></span>
                <?php endif; ?>
            </div>

            <div style="display: flex; align-items: center; gap: 20px;">
                <div style="width: 70px; height: 70px; background: var(--primary); border-radius: 18px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="fa <?= $icon; ?>" style="font-size: 28px; color: white;"></i>
                </div>
                <div>
                    <h1 class="page-title" style="font-size: 36px; margin: 0;">
                        <?= htmlspecialchars($displayCategory); ?>
                    </h1>
                    <?php if($result): ?>
                    <p style="color: #999; margin: 5px 0 0; font-size: 15px;">
                        <?= $result->num_rows; ?> product<?= $result->num_rows != 1 ? 's' : ''; ?> found
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if($result && $result->num_rows > 0): ?>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; padding: 20px 0;">
            <?php while($row = mysqli_fetch_array($result)){ ?>
            <?php if($row['quantity'] > 0): ?>
            <div>
                <div class="bella-card" style="height: 100%; padding: 0; overflow: hidden; position: relative;">
                    <?php if($row['boost'] == '1'): ?>
                    <div style="position: absolute; top: 15px; left: 15px; background: var(--accent); color: white; padding: 5px 15px; border-radius: 20px; font-weight: 700; font-size: 11px; z-index: 10; box-shadow: 0 4px 10px rgba(206,38,38,0.3);">FEATURED</div>
                    <?php endif; ?>

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
                            <a href="product_page.php?pId=<?= $row['id']; ?>" class="btn btn-outline-primary" style="flex: 1; border-radius: 10px !important; font-weight: 700; border: 2px solid var(--primary); color: var(--primary);">Details</a>
                            <a href="product_page.php?pId=<?= $row['id']; ?>&order=direct" class="btn btn-accent" style="flex: 1.5; border-radius: 10px !important; font-weight: 700; background: var(--accent); color: white;">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php } ?>
        </div>

        <?php else: ?>
        <div class="bella-card text-center" style="padding: 100px 20px; max-width: 600px; margin: 0 auto;">
            <div style="font-size: 70px; color: #e0e0e0; margin-bottom: 20px;"><i class="fa fa-search"></i></div>
            <h3 style="color: #aaa; font-weight: 700; margin-bottom: 15px;">No products found here yet.</h3>
            <p style="color: #bbb; margin-bottom: 30px;">This section is growing! Check back soon or browse all categories.</p>
            <a href="allC.php" class="btn btn-accent" style="padding: 12px 40px; border-radius: 10px; font-weight: 700;">Browse All Categories</a>
        </div>
        <?php endif; ?>

    </div>

    <?php include "footer.php" ?>

</body>
</html>
