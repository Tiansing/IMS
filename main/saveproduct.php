<?php
session_start();
include('../connect.php');
$a = $_POST['code'];
$b = $_POST['category'];
$d = $_POST['price'];
$e = $_POST['supplier'];
$f = $_POST['qty'];
$g = $_POST['o_price'];
$h = $_POST['profit'];
$i = $_POST['gen'];
$j = $_POST['date_arrival'];
$k = $_POST['reorder'];
// query
$sql = "INSERT INTO products (product_code,prod_cat_id,price,supplier,qty,o_price,profit,gen_name,date_arrival,reorder) VALUES (:a,:b,:d,:e,:f,:g,:h,:i,:j,:k)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a, ':b' => $b, ':d' => $d, ':e' => $e, ':f' => $f, ':g' => $g, ':h' => $h, ':i' => $i, ':j' => $j, ':k' => $k));
header("location: products.php");
