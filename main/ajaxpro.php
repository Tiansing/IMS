<?php


require('../connect.php');


$sql = "SELECT * FROM products 
         WHERE prod_cat_id LIKE '%" . $_GET['id'] . "%'";


$result = $mysqli->query($sql);


$json = [];
while ($row = $result->fetch_assoc()) {

    $prce = number_format($row['price']);
    $qty = $row['qty'];
    if ($qty == 0) {
        echo "";
    } else {
        $json[$row['product_id']] = $row['product_code'] . " | &#x20B1;" . $prce . " | Qty Left : " . $qty;
    }
}


echo json_encode($json);
