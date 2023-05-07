<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['code'];
$z = $_POST['gen'];
$b = $_POST['category'];

$d = $_POST['price'];
$e = $_POST['supplier'];
$f = $_POST['qty'];
$g = $_POST['o_price'];
$h = $_POST['profit'];
$i = $_POST['date_arrival'];
$j = $_POST['sold'];
// query
$sql = "UPDATE products 
        SET product_code=?, gen_name=?, prod_cat_id=?, price=?, supplier=?, qty=?, o_price=?, profit=?, date_arrival=?, reorder=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($a, $z, $b, $d, $e, $f, $g, $h, $i, $j, $id));
header("location: products.php");
