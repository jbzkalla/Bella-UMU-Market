<?php
require "../login-system/db.php";

$products = [
    // Women's Fashion (Seller: Sarah Johnson)
    [
        'shopName' => 'Styles by Sarah', 
        'email' => 'irfansifat@gmail.com', 
        'productPic' => '1775453064941_floral_dress.png', // GEN IMAGE
        'productFor' => "Women's Fashion", 
        'productName' => 'Elegant Floral Maxi Dress', 
        'description' => 'A high-quality, elegant floral maxi dress. Perfect for campus events or social functions. Comfortable and stylish.', 
        'price' => 45000, 
        'quantity' => 5, 
        'sellerQuantity' => 3, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 1, 
        'keyword' => 'womenswomansdressmaxifloral'
    ],
    [
        'shopName' => 'Styles by Sarah', 
        'email' => 'irfansifat@gmail.com', 
        'productPic' => '15192323031UGEDSEFN.jpg', 
        'productFor' => "Women's Fashion", 
        'productName' => 'Polka Dot Summer Blouse', 
        'description' => 'Lightweight, breathable polka dot summer blouse. Ideal for warm Nkozi afternoons.', 
        'price' => 25000, 
        'quantity' => 8, 
        'sellerQuantity' => 4, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'womenswomansblousedotspolka'
    ],
    [
        'shopName' => 'Styles by Sarah', 
        'email' => 'irfansifat@gmail.com', 
        'productPic' => '15189689721UGEDSEFN.jpg', 
        'productFor' => "Women's Fashion", 
        'productName' => 'Designer Handbag', 
        'description' => 'Premium designer handbag for students. Large capacity for essentials, durable leather finish.', 
        'price' => 35000, 
        'quantity' => 10, 
        'sellerQuantity' => 5, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'womenswomansbaghandbag'
    ],

    // Baby's Fashion (Seller: Mary Smith)
    [
        'shopName' => 'The Student Mart', 
        'email' => 'msifat6@gmail.com', 
        'productPic' => '15186431381MVGHSYR2.jpg', 
        'productFor' => "Baby's Fashion", 
        'productName' => 'Organic Hooded Towel', 
        'description' => '100% organic cotton hooded towel for babies. Soft, absorbent, and gentle on sensitive skin.', 
        'price' => 18000, 
        'quantity' => 12, 
        'sellerQuantity' => 6, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'babytowelhoodedorganic'
    ],
    [
        'shopName' => 'The Student Mart', 
        'email' => 'msifat6@gmail.com', 
        'productPic' => '15192322481MVGHSYR2.jpg', 
        'productFor' => "Baby's Fashion", 
        'productName' => 'Soft Cotton Knit Romper', 
        'description' => 'Beautifully knitted romper for infants. Keeps the baby warm and comfortable all day long.', 
        'price' => 22000, 
        'quantity' => 10, 
        'sellerQuantity' => 5, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 1, 
        'keyword' => 'babyromperknitcotton'
    ],

    // Sports and Travels (Seller: Simon Storm)
    [
        'shopName' => 'The Hub', 
        'email' => 'saimon.ctg@gmail.com', 
        'productPic' => '1521564673cricketbat.jpg', 
        'productFor' => 'Sports and Travels', 
        'productName' => 'Heavy-Duty Cricket Bat', 
        'description' => 'Professional Grade English Willow cricket bat. Superior grip and balance for university matches.', 
        'price' => 75000, 
        'quantity' => 4, 
        'sellerQuantity' => 2, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 1, 
        'keyword' => 'sportscricketbatwillow'
    ],
    [
        'shopName' => 'The Hub', 
        'email' => 'saimon.ctg@gmail.com', 
        'productPic' => '1521564374basketball.jpg', 
        'productFor' => 'Sports and Travels', 
        'productName' => 'Match-Grade Football', 
        'description' => 'Durable match-grade football suitable for all weather conditions. High air retention and soft touch.', 
        'price' => 38000, 
        'quantity' => 15, 
        'sellerQuantity' => 8, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'sportsfootballmatch'
    ],

    // Phone and Tablets (Seller: Ian Smith)
    [
        'shopName' => 'Digital Zone', 
        'email' => 'msifat5@gmail.com', 
        'productPic' => '1521537526oppo As7.jpg', 
        'productFor' => 'Phone and Tablets', 
        'productName' => 'Oppo A20 Stealth Black', 
        'description' => 'Reliable and power-efficient smartphone. 6.5" display, long-lasting battery, and 64GB storage. Great for students.', 
        'price' => 450000, 
        'quantity' => 10, 
        'sellerQuantity' => 5, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 1, 
        'keyword' => 'phoneopposmartphone'
    ],
    [
        'shopName' => 'Digital Zone', 
        'email' => 'msifat5@gmail.com', 
        'productPic' => '1521603328mi 4x.jpg', 
        'productFor' => 'Phone and Tablets', 
        'productName' => 'Redmi Note 9 Pro', 
        'description' => 'Powerful Redmi phone for multitasking and gaming. Professional camera setup and ultra-fast charging.', 
        'price' => 580000, 
        'quantity' => 15, 
        'sellerQuantity' => 8, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'phoneredmismartphone'
    ],
    [
        'shopName' => 'Digital Zone', 
        'email' => 'msifat5@gmail.com', 
        'productPic' => '1521538743iphonex.png', 
        'productFor' => 'Phone and Tablets', 
        'productName' => 'iPhone X 256GB Platinum', 
        'description' => 'A classic premium smartphone. 256GB storage, Face ID, and dual camera system. Refurbished, like new condition.', 
        'price' => 950000, 
        'quantity' => 5, 
        'sellerQuantity' => 2, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 1, 
        'keyword' => 'phoneiphonexapple'
    ],

    // Others (Seller: David Miller)
    [
        'shopName' => 'Campus Bookstore', 
        'email' => 'abidsaimon2323@gmail.com', 
        'productPic' => '157500877058542854_172413980341936_1181573764014407680_n.jpg', 
        'productFor' => 'Others', 
        'productName' => 'Advanced Discrete Mathematics', 
        'description' => 'Essential textbook for computer science and mathematics students. Covers logic, set theory, and graph theory.', 
        'price' => 55000, 
        'quantity' => 20, 
        'sellerQuantity' => 10, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'booksmathdiscreteuniversity'
    ],
    [
        'shopName' => 'Campus Bookstore', 
        'email' => 'abidsaimon2323@gmail.com', 
        'productPic' => '1575056794Machine learning algo 2.jpg', 
        'productFor' => 'Others', 
        'productName' => 'Machine Learning for Beginners', 
        'description' => 'A comprehensive introduction to machine learning concepts and algorithms. Practical guide with coding examples.', 
        'price' => 65000, 
        'quantity' => 15, 
        'sellerQuantity' => 8, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 1, 
        'keyword' => 'booksmachinelearningtech'
    ],
    [
        'shopName' => 'Campus Bookstore', 
        'email' => 'abidsaimon2323@gmail.com', 
        'productPic' => '157505681658542854_172413980341936_1181573764014407680_n.jpg', 
        'productFor' => 'Others', 
        'productName' => 'Engineering Calculus III', 
        'description' => 'The ultimate guide to multi-variable calculus for engineering majors. Includes solved problems and practice exams.', 
        'price' => 45000, 
        'quantity' => 12, 
        'sellerQuantity' => 6, 
        'Day' => '06', 'Month' => '04', 'Year' => '2026', 
        'boost' => 0, 
        'keyword' => 'bookscalculusengineeringmath'
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

echo "Sucessfully seeded " . count($products) . " unique products with English names." . PHP_EOL;
?>
