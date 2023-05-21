<?php
session_start();
include('../connect.php');
unset($_SESSION['invoice_no']);
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$z = $_POST['profit'];
$cname = $_POST['cname'];
if (isset($_POST['cname'])) {
    $sqli = "UPDATE sales_order 
        SET name=?
		WHERE invoice=?";
    $qqq = $db->prepare($sqli);
    $qqq->execute(array($cname, $a));
}

if ($d == 'credit') {

    $f = $_POST['due'];
    $sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name) VALUES (:a,:b,:c,:d,:e,:z,:f,:g)";
    $q = $db->prepare($sql);
    $q->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e, ':z' => $z, ':f' => $f, ':g' => $cname));
    header("location: preview.php?invoice=$a");
    exit();
}
if ($d == 'cash') {


    $f = $_POST['cash'];
    $sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name) VALUES (:a,:b,:c,:d,:e,:z,:f,:g)";
    $q = $db->prepare($sql);
    $q->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e, ':z' => $z, ':f' => $f, ':g' => $cname));
    // header("location: preview.php?invoice=$a");
    $url = "preview.php?invoice=$a";
    $url = str_replace(PHP_EOL, '', $url);
    header("Location: $url");

    exit();
}

// query
