<?php
session_start();
include('../connect.php');
$a = $_POST['cat_title'];
$b = $_POST['cat_desc'];
// query
$sql = "INSERT INTO category (cat_title,cat_desc,cat_date) VALUES (:a,:b,now())";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a, ':b' => $b));
header("location: category.php");
