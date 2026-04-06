<?php
require "c:/xampp/htdocs/bella/E-Market-Place/login-system/db.php";

$updates = [
    // HOME & LIVING — furniture
    ["Cloth Wardrobe", "Home and Living", "furniture"],
    ["Cofy Sofa", "Home and Living", "furniture"],
    ["Iron Board", "Home and Living", "furniture"],
    ["Shoe Rack", "Home and Living", "furniture"],
    ["Camping Chair", "Home and Living", "furniture"],
    // HOME & LIVING — bedding
    ["Cofy Pillows", "Home and Living", "bedding"],
    ["Mattress", "Home and Living", "bedding"],
    // HOME & LIVING — kitchen & decor
    ["Pack Of 10 Hangers", "Home and Living", "decor"],
    ["Pacolator", "Home and Living", "kitchen"],
    ["Flat Iron", "Home and Living", "appliance"],

    // BOOKS & STATIONERY
    ["Calculator", "Books and Stationery", "calculator"],
    ["Clipboard", "Books and Stationery", "stationery"],
    ["Holy Bible", "Books and Stationery", "novel"],
    ["Mathematical Set", "Books and Stationery", "stationery"],
    ["Noteboook", "Books and Stationery", "notebook"],
    ["Novel", "Books and Stationery", "novel"],

    // Fix misplaced gym items from Men's Fashion -> Sports
    ["Men Gym Wear", "Sports and Travels", "gym"],
    ["Gym Shorts", "Sports and Travels", "gym"],
];

$count = 0;
foreach ($updates as [$name, $category, $keyword]) {
    $n = $mysqli->real_escape_string($name);
    $c = $mysqli->real_escape_string($category);
    $k = $mysqli->real_escape_string($keyword);
    $q = "UPDATE productlist SET productFor='$c', keyword='$k' WHERE productName LIKE '%$n%'";
    if ($mysqli->query($q)) {
        echo "Updated: $name -> $category ($keyword) | Rows: " . $mysqli->affected_rows . PHP_EOL;
        $count += $mysqli->affected_rows;
    } else {
        echo "Error for $name: " . $mysqli->error . PHP_EOL;
    }
}

echo "\nTotal rows updated: $count\n";
?>
