<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Categories - Bella UMU Market</title>
</head>
<body style="background-color: var(--bg);">

<?php include "header.php" ?>
<?php include "header2.php" ?>
<?php include "sidebar.php" ?>

<div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
    <div class="text-center" style="margin-bottom: 50px;">
        <h1 class="page-title" style="font-size: 42px; margin-bottom: 15px;">Shop by Category</h1>
        <p style="color: #666; font-size: 18px;">Discover everything you need for your campus life at UMU.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; padding: 20px 0;">

        <!-- Category 1: Men's Fashion -->
        <div>
            <div class="bella-card text-center" style="padding: 40px; height: 100%; transition: all 0.3s ease;">
                <div style="font-size: 50px; color: var(--primary); margin-bottom: 25px;"><i class="fa fa-male"></i></div>
                <h4 style="color: var(--text); font-weight: 800; margin-bottom: 20px; font-size: 20px; text-transform: uppercase;">Men's Fashion</h4>
                <div class="comment-inner-card" style="text-align: left; margin-top: 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0; line-height: 2.8;">
                        <li><a href="subIndex.php?pCat=Men's Fashion&sub=clothing" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Clothings</a></li>
                        <li><a href="subIndex.php?pCat=Men's Fashion&sub=shoes" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Shoes</a></li>
                        <li><a href="subIndex.php?pCat=Men's Fashion&sub=winter" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Winter Clothing</a></li>
                        <li><a href="subIndex.php?pCat=Men's Fashion&sub=accessories" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Accessories</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Category 2: Women's Fashion -->
        <div>
            <div class="bella-card text-center" style="padding: 40px; height: 100%; transition: all 0.3s ease;">
                <div style="font-size: 50px; color: var(--primary); margin-bottom: 25px;"><i class="fa fa-female"></i></div>
                <h4 style="color: var(--text); font-weight: 800; margin-bottom: 20px; font-size: 20px; text-transform: uppercase;">Women's Fashion</h4>
                <div class="comment-inner-card" style="text-align: left; margin-top: 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0; line-height: 2.8;">
                        <li><a href="subIndex.php?pCat=Women's Fashion&sub=clothing" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Clothings</a></li>
                        <li><a href="subIndex.php?pCat=Women's Fashion&sub=shoes" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Shoes</a></li>
                        <li><a href="subIndex.php?pCat=Women's Fashion&sub=winter" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Winter Clothing</a></li>
                        <li><a href="subIndex.php?pCat=Women's Fashion&sub=accessories" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Accessories</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Category 3: Baby's Fashion -->
        <div>
            <div class="bella-card text-center" style="padding: 40px; height: 100%; transition: all 0.3s ease;">
                <div style="font-size: 50px; color: var(--primary); margin-bottom: 25px;"><i class="fa fa-child"></i></div>
                <h4 style="color: var(--text); font-weight: 800; margin-bottom: 20px; font-size: 20px; text-transform: uppercase;">Baby's Fashion</h4>
                <div class="comment-inner-card" style="text-align: left; margin-top: 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0; line-height: 2.8;">
                        <li><a href="subIndex.php?pCat=Baby's Fashion&sub=clothing" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Clothings</a></li>
                        <li><a href="subIndex.php?pCat=Baby's Fashion&sub=shoes" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Shoes</a></li>
                        <li><a href="subIndex.php?pCat=Baby's Fashion&sub=accessories" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Accessories</a></li>
                        <li><a href="subIndex.php?pCat=Baby's Fashion" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>All Baby Items</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Category 4: Electronics & Phones -->
        <div>
            <div class="bella-card text-center" style="padding: 40px; height: 100%; transition: all 0.3s ease;">
                <div style="font-size: 50px; color: var(--primary); margin-bottom: 25px;"><i class="fa fa-plug"></i></div>
                <h4 style="color: var(--text); font-weight: 800; margin-bottom: 20px; font-size: 20px; text-transform: uppercase;">Electronics & Phones</h4>
                <div class="comment-inner-card" style="text-align: left; margin-top: 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0; line-height: 2.8;">
                        <li><a href="subIndex.php?pCat=Phone and Tablets&sub=laptop" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Laptops</a></li>
                        <li><a href="subIndex.php?pCat=Phone and Tablets&sub=smartphone" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Smartphones</a></li>
                        <li><a href="subIndex.php?pCat=Phone and Tablets&sub=headphones" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Headphones</a></li>
                        <li><a href="subIndex.php?pCat=Phone and Tablets&sub=accessories" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Accessories</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Category 5: Sports & Outdoor -->
        <div>
            <div class="bella-card text-center" style="padding: 40px; height: 100%; transition: all 0.3s ease;">
                <div style="font-size: 50px; color: var(--primary); margin-bottom: 25px;"><i class="fa fa-bicycle"></i></div>
                <h4 style="color: var(--text); font-weight: 800; margin-bottom: 20px; font-size: 20px; text-transform: uppercase;">Sports & Outdoor</h4>
                <div class="comment-inner-card" style="text-align: left; margin-top: 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0; line-height: 2.8;">
                        <li><a href="subIndex.php?pCat=Sports and Travels&sub=gym" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Gym Equipment</a></li>
                        <li><a href="subIndex.php?pCat=Sports and Travels&sub=clothing" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Activewear</a></li>
                        <li><a href="subIndex.php?pCat=Sports and Travels&sub=outdoor" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Outdoor Gear</a></li>
                        <li><a href="subIndex.php?pCat=Sports and Travels&sub=shoes" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Footwear</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Category 6: Home & Living (NEW) -->
        <div>
            <div class="bella-card text-center" style="padding: 40px; height: 100%; transition: all 0.3s ease; position: relative; overflow: hidden;">
                <div style="position: absolute; top: 15px; right: 15px; background: var(--accent); color: white; font-size: 10px; font-weight: 800; padding: 4px 10px; border-radius: 20px;">NEW</div>
                <div style="font-size: 50px; color: var(--primary); margin-bottom: 25px;"><i class="fa fa-home"></i></div>
                <h4 style="color: var(--text); font-weight: 800; margin-bottom: 20px; font-size: 20px; text-transform: uppercase;">Home & Living</h4>
                <div class="comment-inner-card" style="text-align: left; margin-top: 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0; line-height: 2.8;">
                        <li><a href="subIndex.php?pCat=Home and Living&sub=furniture" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Furniture</a></li>
                        <li><a href="subIndex.php?pCat=Home and Living&sub=bedding" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Bedding</a></li>
                        <li><a href="subIndex.php?pCat=Home and Living&sub=kitchen" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Kitchen</a></li>
                        <li><a href="subIndex.php?pCat=Home and Living&sub=decor" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Decor & Storage</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Category 7: Books & Stationery (NEW) -->
        <div>
            <div class="bella-card text-center" style="padding: 40px; height: 100%; transition: all 0.3s ease; position: relative; overflow: hidden;">
                <div style="position: absolute; top: 15px; right: 15px; background: var(--accent); color: white; font-size: 10px; font-weight: 800; padding: 4px 10px; border-radius: 20px;">NEW</div>
                <div style="font-size: 50px; color: var(--primary); margin-bottom: 25px;"><i class="fa fa-book"></i></div>
                <h4 style="color: var(--text); font-weight: 800; margin-bottom: 20px; font-size: 20px; text-transform: uppercase;">Books & Stationery</h4>
                <div class="comment-inner-card" style="text-align: left; margin-top: 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0; line-height: 2.8;">
                        <li><a href="subIndex.php?pCat=Books and Stationery&sub=novel" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Novels & Bibles</a></li>
                        <li><a href="subIndex.php?pCat=Books and Stationery&sub=notebook" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Notebooks</a></li>
                        <li><a href="subIndex.php?pCat=Books and Stationery&sub=stationery" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Stationery Sets</a></li>
                        <li><a href="subIndex.php?pCat=Books and Stationery&sub=calculator" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Calculators</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Category 8: Others -->
        <div>
            <div class="bella-card text-center" style="padding: 40px; height: 100%; transition: all 0.3s ease;">
                <div style="font-size: 50px; color: var(--primary); margin-bottom: 25px;"><i class="fa fa-ellipsis-h"></i></div>
                <h4 style="color: var(--text); font-weight: 800; margin-bottom: 20px; font-size: 20px; text-transform: uppercase;">Others</h4>
                <div class="comment-inner-card" style="text-align: left; margin-top: 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0; line-height: 2.8;">
                        <li><a href="subIndex.php?pCat=Others" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>All Other Items</a></li>
                        <li><a href="subIndex.php?pCat=Others&sub=accessories" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Accessories</a></li>
                        <li><a href="subIndex.php?pCat=Others&sub=electronics" style="color: #555; font-weight: 600; text-decoration: none;"><i class="fa fa-angle-right" style="color: var(--accent); margin-right: 8px;"></i>Appliances</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "footer.php" ?>

</body>
</html>