<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['cat_title'];
$b = $_POST['cat_desc'];

// query
$sql = "UPDATE category 
        SET cat_title=?, cat_desc=?
		WHERE cat_id=?";
$q = $db->prepare($sql);
$q->execute(array($a, $b, $id));
header("location: category.php");
