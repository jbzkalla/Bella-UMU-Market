<?php
require "../login-system/db.php";

$products = [
    // Women's Fashion
    [
        'shopName' => 'Apple', 
        'email' => 'msifat5@gmail.com', 
        'productPic' => '15189689721UGEDSEFN.jpg', 
        'productFor' => "Women's Fashion", 
        'productName' => 'Elegant Floral Maxi Dress', 
        'description' => 'Beautiful floral maxi dress for campus events. Comfortable fabric, available in multiple sizes. Perfect for UMU student functions.', 
        'price' => 45000, 
        'quantity' => 10, 
        'sellerQuantity' => 5, 
        'Day' => '21', 'Month' => '3', 'Year' => '2018', 
        'boost' => 1, 
        'keyword' => 'womenswomansgirlsfemalesdressmaxi'
    ],
    [
        'shopName' => 'Style Hub', 
        'email' => 'ahsaimon.ctg@gmail.com', 
        'productPic' => '15189689721UGEDSEFN.jpg', 
        'productFor' => "Women's Fashion", 
        'productName' => 'Canvas Tote Bag', 
        'description' => 'Durable canvas tote bag for carrying books and laptops. Stylish and practical for daily campus use.', 
        'price' => 15000, 
        'quantity' => 20, 
        'sellerQuantity' => 10, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'womensbagtotelaptop'
    ],
    [
        'shopName' => 'Style Hub', 
        'email' => 'ahsaimon.ctg@gmail.com', 
        'productPic' => '15189689721UGEDSEFN.jpg', 
        'productFor' => "Women's Fashion", 
        'productName' => 'Adjustable Ankle Boots', 
        'description' => 'Comfortable ankle boots for all-day campus walking. Water-resistant and durable. Available in Black and Brown.', 
        'price' => 55000, 
        'quantity' => 8, 
        'sellerQuantity' => 4, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 1, 
        'keyword' => 'womensshoesboots'
    ],

    // Baby's Fashion
    [
        'shopName' => 'Pick n Pay', 
        'email' => 'ahsaimon.ctg@gmail.com', 
        'productPic' => '15192322481MVGHSYR2.jpg', 
        'productFor' => "Baby's Fashion", 
        'productName' => 'Soft Cotton Baby Romper', 
        'description' => '100% organic cotton romper for infants. Soft on skin and easy to wash. Includes matching cap.', 
        'price' => 12000, 
        'quantity' => 15, 
        'sellerQuantity' => 5, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'babyinfantromperclothing'
    ],
    [
        'shopName' => 'Pick n Pay', 
        'email' => 'ahsaimon.ctg@gmail.com', 
        'productPic' => '15192322481MVGHSYR2.jpg', 
        'productFor' => "Baby's Fashion", 
        'productName' => 'Plush Toy Set', 
        'description' => 'Set of 3 safe, soft plush toys for babies. Stimulates sensory development. Perfect gift for new parents on campus.', 
        'price' => 25000, 
        'quantity' => 12, 
        'sellerQuantity' => 6, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'babytoysplush'
    ],

    // Sports and Travels
    [
        'shopName' => 'Apple', 
        'email' => 'msifat5@gmail.com', 
        'productPic' => '1521564673cricketbat.jpg', 
        'productFor' => 'Sports and Travels', 
        'productName' => 'Hiking Backpack (40L)', 
        'description' => 'Spacious and lightweight backpack for weekend trips and campus life. Multiple compartments and rain cover included.', 
        'price' => 65000, 
        'quantity' => 10, 
        'sellerQuantity' => 5, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 1, 
        'keyword' => 'travelbagbackpackhiking'
    ],
    [
        'shopName' => 'Apple', 
        'email' => 'msifat5@gmail.com', 
        'productPic' => '1521564374basketball.jpg', 
        'productFor' => 'Sports and Travels', 
        'productName' => 'Professional Football', 
        'description' => 'Official size 5 football for team practice. High durability and excellent grip. Ideal for UMU football fields.', 
        'price' => 35000, 
        'quantity' => 20, 
        'sellerQuantity' => 10, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'sportsfootballball'
    ],

    // Phone and Tablets
    [
        'shopName' => 'Apple', 
        'email' => 'msifat5@gmail.com', 
        'productPic' => '1521538743iphonex.png', 
        'productFor' => 'Phone and Tablets', 
        'productName' => 'Samsung Galaxy Tab A8', 
        'description' => 'Perfect for digital note-taking and entertainment. 10.5-inch display, long-lasting battery. Special student price.', 
        'price' => 850000, 
        'quantity' => 5, 
        'sellerQuantity' => 2, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 1, 
        'keyword' => 'tabletsungtablet'
    ],

    // Others (Books & Stationary)
    [
        'shopName' => 'Boi Bhandar', 
        'email' => 'abidsaimon2323@gmail.com', 
        'productPic' => '157505681658542854_172413980341936_1181573764014407680_n.jpg', 
        'productFor' => 'Others', 
        'productName' => 'Engineering Mathematics III', 
        'description' => 'Essential textbook for second-year engineering students. Clear and concise explanations with solved examples.', 
        'price' => 25000, 
        'quantity' => 10, 
        'sellerQuantity' => 5, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'booksengineeringmath'
    ],
    [
        'shopName' => 'Boi Bhandar', 
        'email' => 'abidsaimon2323@gmail.com', 
        'productPic' => '157500947351417385_621294401655199_936946187909464064_o.jpg', 
        'productFor' => 'Others', 
        'productName' => 'Graphic Design Masterclass', 
        'description' => 'Comprehensive guide to mastering graphic design principles and software. Perfect for creative students.', 
        'price' => 45000, 
        'quantity' => 12, 
        'sellerQuantity' => 6, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 1, 
        'keyword' => 'booksdesigncreative'
    ],
    [
        'shopName' => 'Boi Bhandar', 
        'email' => 'abidsaimon2323@gmail.com', 
        'productPic' => '1575056687Computer Programming First part.jpg', 
        'productFor' => 'Others', 
        'productName' => 'Scientific Calculator FX-991EX', 
        'description' => 'Advaced scientific calculator for complex calculations. Solar and battery-powered. Highly recommended for UMU exams.', 
        'price' => 85000, 
        'quantity' => 15, 
        'sellerQuantity' => 5, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'stationarycalculatorscientific'
    ]
];

foreach ($products as $p) {
    $stmt = $mysqli->prepare("INSERT INTO productlist (shopName, email, productPic, productFor, productName, description, price, quantity, sellerQuantity, Day, Month, Year, boost, keyword) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiiisssis", 
        $p['shopName'], $p['email'], $p['productPic'], $p['productFor'], $p['productName'], 
        $p['description'], $p['price'], $p['quantity'], $p['sellerQuantity'], 
        $p['Day'], $p['Month'], $p['Year'], $p['boost'], $p['keyword']
    );
    $stmt->execute();
}

echo "Sucessfully seeded " . count($products) . " products." . PHP_EOL;
?>
