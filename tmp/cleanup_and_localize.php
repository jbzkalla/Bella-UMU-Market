<?php
require "../login-system/db.php";

// 1. Delete duplicates (IDs 36 and up)
$mysqli->query("DELETE FROM productlist WHERE id >= 36");
echo "Deleted duplicate products (IDs >= 36)." . PHP_EOL;

// 2. Localize User Names
$user_updates = [
    'minhajulalam@gmail.com' => 'Michael Owens',
    'irfansifat@gmail.com' => 'Sarah Johnson',
    'saimon.ctg@gmail.com' => 'Simon Storm',
    'msifat5@gmail.com' => 'Ian Smith',
    'msifat6@gmail.com' => 'Mary Smith',
    'ahsaimon.ctg@gmail.com' => 'Andrew Hills',
    'abidsaimon2323@gmail.com' => 'David Miller'
];

foreach ($user_updates as $email => $new_name) {
    // Update Users
    $mysqli->query("UPDATE users SET name = '$new_name' WHERE email = '$email'");
    // Update Community Posts
    $mysqli->query("UPDATE community SET name = '$new_name' WHERE email = '$email'");
    // Update Comments
    $mysqli->query("UPDATE comment SET name = '$new_name' WHERE email = '$email'");
    // Update Seller Info
    $mysqli->query("UPDATE sellerinfo SET email = '$email' WHERE email = '$email'");
    // Update Store
    $mysqli->query("UPDATE store SET email = '$email' WHERE email = '$email'");
}
echo "Localized user names to English." . PHP_EOL;

// 3. Localize Store Names
$store_updates = [
    'Boi Bhandar' => 'Campus Bookstore',
    'Pick n Pay' => 'The Student Mart',
    'Apple' => 'The Hub'
];

foreach ($store_updates as $old_name => $new_name) {
    $mysqli->query("UPDATE store SET store_name = '$new_name' WHERE store_name = '$old_name'");
    $mysqli->query("UPDATE productlist SET shopName = '$new_name' WHERE shopName = '$old_name'");
}
echo "Localized store names to English." . PHP_EOL;

// 4. Update existing non-English names in Community that might not have matching emails
$mysqli->query("UPDATE community SET name = 'Michael' WHERE name = 'minhaj'");
$mysqli->query("UPDATE community SET name = 'Ian Smith' WHERE name = 'irfan_sifat'");

echo "Finalizing localization..." . PHP_EOL;
?>
