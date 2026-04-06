<?php
require "c:/xampp/htdocs/bella/E-Market-Place/login-system/db.php";

$img_dir = "c:/xampp/htdocs/bella/E-Market-Place/img/img2/";
$target_dir = "c:/xampp/htdocs/bella/E-Market-Place/seller/productPic/";

if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$files = scandir($img_dir);

$mappings = [
    'laptop' => ['Phone and Tablets', 'laptop'],
    'macbook' => ['Phone and Tablets', 'laptop'],
    'iphone' => ['Phone and Tablets', 'smartphone'],
    'phone' => ['Phone and Tablets', 'smartphone'],
    'speaker' => ['Phone and Tablets', 'accessories'],
    'headphones' => ['Phone and Tablets', 'headphones'],
    
    'baby' => ["Baby's Fashion", 'clothing'],
    
    'bracelet' => ["Women's Fashion", 'accessories'],
    'ear rings' => ["Women's Fashion", 'accessories'],
    'jewelry' => ["Women's Fashion", 'accessories'],
    'bonnet' => ["Women's Fashion", 'accessories'],
    'scarfs' => ["Women's Fashion", 'accessories'],
    'corset' => ["Women's Fashion", 'clothing'],
    'legging' => ["Women's Fashion", 'clothing'],
    'moslem dress' => ["Women's Fashion", 'clothing'],
    'ladies striped' => ["Women's Fashion", 'clothing'],
    'women snikers' => ["Women's Fashion", 'shoes'],
    'heels' => ["Women's Fashion", 'shoes'],
    'women' => ["Women's Fashion", 'clothing'],
    
    'calculator' => ['Others', 'textbook'],
    'mathematical' => ['Others', 'textbook'],
    'clipboard' => ['Others', 'notebook'],
    'noteboook' => ['Others', 'notebook'],
    'bible' => ['Others', 'novel'],
    'novel' => ['Others', 'novel'],
    'chair' => ['Others', 'furniture'],
    'wardrobe' => ['Others', 'furniture'],
    'rack' => ['Others', 'furniture'],
    'iron board' => ['Others', 'furniture'],
    'sofa' => ['Others', 'furniture'],
    'mattress' => ['Others', 'bedding'],
    'pillows' => ['Others', 'bedding'],
    'hangers' => ['Others', 'decor'],
    'pacolator' => ['Others', 'kitchen'],
    'flat iron' => ['Others', 'electronics'],
    
    'dumbell' => ['Sports and Travels', 'gym'],
    'resistance band' => ['Sports and Travels', 'gym'],
    'push ups' => ['Sports and Travels', 'gym'],
    'skipping ropes' => ['Sports and Travels', 'gym'],
    'yoga mat' => ['Sports and Travels', 'gym'],
    'gym' => ['Sports and Travels', 'gym'],
    'jersey' => ['Sports and Travels', 'clothing'],
    'sports shoes' => ['Sports and Travels', 'shoes'],
    'riding gloves' => ['Sports and Travels', 'outdoor'],
    'sport bottles' => ['Sports and Travels', 'outdoor'],
    
    'sneakers' => ["Men's Fashion", 'shoes'],
    'open shoes' => ["Men's Fashion", 'shoes'],
    'office shoes' => ["Men's Fashion", 'shoes'],
    'watches' => ["Men's Fashion", 'accessories'],
    'men\'s ring' => ["Men's Fashion", 'accessories'],
    'black glasses' => ["Men's Fashion", 'accessories'],
    'men' => ["Men's Fashion", 'clothing'],
    'boy' => ["Men's Fashion", 'clothing'],
    
    'hoodie' => ["Men's Fashion", 'winter'],
    'jacket' => ["Men's Fashion", 'winter'],
    'sweater' => ["Men's Fashion", 'winter'],
    'winter gloves' => ["Men's Fashion", 'winter'],
    'warm caps' => ["Men's Fashion", 'winter'],
    
    'winter' => ["Women's Fashion", 'winter'],
    'dress' => ["Women's Fashion", 'clothing'],
    'clothing' => ["Men's Fashion", 'clothing'],
];

$email_str = implode("', '", array('admin@bellamarket.ug', 'seller@bellamarket.ug', 'shop@bellamarket.ug'));

$count = 0;

foreach ($files as $file) {
    if ($file == '.' || $file == '..') continue;
    
    $lowername = strtolower($file);
    $category = 'Others';
    $keyword = 'accessories';
    
    foreach ($mappings as $key => $cat) {
        if (strpos($lowername, strtolower($key)) !== false) {
            $category = $cat[0];
            $keyword = $cat[1];
            break;
        }
    }
    
    if ($category == 'Others' && $keyword == 'accessories') {
       if (strpos($lowername, 'shoe') !== false) { $category = "Men's Fashion"; $keyword = 'shoes'; }
    }
    
    $productNameRaw = str_replace(['.jpg', '.png', '.jpeg'], '', $file);
    $productName = ucwords($productNameRaw);
    $price = rand(15, 150) * 1000;
    $qty = rand(5, 20);
    $desc = "Premium quality $productName perfect for UMU students. Designed to be durable, comfortable, and reliable for all your needs on campus.";
    
    if (!copy($img_dir . $file, $target_dir . $file)) {
        echo "Failed to copy $file\n";
    }
    
    $email = 'admin@bellamarket.ug';
    $shopName = 'Bella Official';
    if(rand(1, 10) > 7) {
        $email = 'seller@example.com';
        $shopName = 'Campus Stores';
    }

    $q_email = $mysqli->real_escape_string($email);
    $q_shopName = $mysqli->real_escape_string($shopName);
    $q_productName = $mysqli->real_escape_string($productName);
    $q_category = $mysqli->real_escape_string($category);
    $q_desc = $mysqli->real_escape_string($desc);
    $q_file = $mysqli->real_escape_string($file);
    $q_keyword = $mysqli->real_escape_string($keyword);
    $boost = (rand(1, 100) > 85) ? 1 : 0; // 15% chance to be boosted
    
    $query = "INSERT INTO productlist (email, shopName, productName, productFor, price, description, productPic, quantity, keyword, boost) VALUES ('$q_email', '$q_shopName', '$q_productName', '$q_category', '$price', '$q_desc', '$q_file', '$qty', '$q_keyword', '$boost')";
    
    if($mysqli->query($query)) {
        $count++;
    } else {
        echo "Error inserting $file: " . $mysqli->error . "\n";
    }
}

echo "Successfully seeded $count new products from the img2 folder.\n";
?>
