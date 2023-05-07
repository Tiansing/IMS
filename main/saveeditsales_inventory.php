<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$orgqty = $_POST['orgqty'];
$lorgqty = $_POST['lorgqty'];
$retqty = $_POST['qty'];

$delqty = $lorgqty - $retqty;
$prodid = $_POST['productid'];

$a = $_POST['code'];
$b = $_POST['gen'];
$d = $_POST['org_price'];
$e = $_POST['price'];
$f = $_POST['profit'];

$g = $_POST['supplier'];
if (!empty($orgqty)) {
    $h = $orgqty + $retqty;
} else {
    $h = $lorgqty;
}

$i = $_POST['reorder'];
$j = $_POST['date_arrival'];
$k = $_POST['category'];

// query

$query = "SELECT * FROM products WHERE product_id = $prodid";
$result = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_assoc($result)) {
    if (!empty($row['product_id'])) {
        $prd = $row['product_id'];
    } else {
        $prd = 0;
    }
}
if ($prd == $prodid) {

    $sql = "UPDATE sales_order SET qty=? WHERE transaction_id=?";
    $q = $db->prepare($sql);
    $q->execute(array($delqty, $id));

    $sql = "UPDATE products SET qty=? WHERE product_id=?";
    $q = $db->prepare($sql);
    $q->execute(array($h, $prodid));
    if ($delqty == 0) {
        $result = $db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
        $result->bindParam(':memid', $id);
        $result->execute();
    }
    header("location: sales_inventory.php");
} else {
    $sqls = "INSERT INTO products (product_code,gen_name,o_price,price,profit,supplier,qty,reorder,date_arrival,prod_cat_id) VALUES (:a,:b,:d,:e,:f,:g,:h,:i,:j,:k)";
    $qs = $db->prepare($sqls);
    $qs->execute(array(':a' => $a, ':b' => $b, ':d' => $d, ':e' => $e, ':f' => $f, ':g' => $g, ':h' => $h, ':i' => $i, ':j' => $j, ':k' => $k));
    if ($delqty == 0) {
        $result = $db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
        $result->bindParam(':memid', $id);
        $result->execute();
    }

    header("location: sales_inventory.php");
}
