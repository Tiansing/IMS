<?php
include('../connect.php');
$id = $_GET['id'];
$result = $db->prepare("SELECT * FROM sales_order WHERE transaction_id= :userid");
$result->bindParam(':userid', $id);
$result->execute();

for ($i = 0; $row = $result->fetch(); $i++) {
	$prodi = $row['product'];
	$query = "SELECT * FROM products WHERE product_id = $prodi";
	$pid_query = mysqli_query($mysqli, $query);
	while ($raw = mysqli_fetch_assoc($pid_query)) {
		if (!empty($raw["qty"])) {
			$orgqty = $raw["qty"];
		} else {
			$orgqty = 0;
		}
	}

?>
	<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

	<form action="saveeditsales_inventory.php" method="post">

		<center>
			<h4><i class="icon-share-alt icon-large"></i> Return Item</h4>
		</center>
		<hr>
		<div id="ac">
			<input type="hidden" name="memi" value="<?php echo $id; ?>" />
			<span class="horizontal-span">Date Ordered :</span>
			<p class="text" style="font-size: 14px;"><?php echo $row['date'] . " " . $id; ?></p>

			<br>
			<span class="horizontal-span">Invoice :</span>
			<p class="text" style="font-size: 14px;"><?php echo $row['invoice']; ?></p>
			<input type="hidden" style="width:265px; height:30px;" name="invoice" value="<?php echo $row['invoice']; ?>" required />

			<br><span class="horizontal-span">Item Name :</span>
			<p class="text" style="font-size: 14px;width:265px; "><?php echo $row['product_code']; ?></p>
			<input type="hidden" style="width:auto; height:auto;" name="code" value="<?php echo $row['product_code']; ?>" />
			<input type="hidden" style="width:auto; height:auto;" name="gen" value="<?php echo $row['gen_name']; ?>" />
			<input type="hidden" style="width:auto; height:auto;" name="category" value="<?php echo $row['prod_cat_id']; ?>" />
			<input type="hidden" style="width:auto; height:auto;" name="supplier" value="<?php echo $row['supplier']; ?>" />
			<input type="hidden" style="width:auto; height:auto;" name="reorder" value="<?php echo $row['reorder']; ?>" />
			<input type="hidden" style="width:auto; height:auto;" name="profit" value="<?php echo $row['profit']; ?>" />
			<input type="hidden" style="width:auto; height:auto;" name="productid" value="<?php echo $row['product']; ?>" />
			<input type="hidden" style="width:auto; height:auto;" name="org_price" value="<?php echo $row['o_price']; ?>" />
			<input type="hidden" style="width:auto; height:auto;" name="category" value="<?php echo $row['category']; ?>" />
			<input type="hidden" style="width:auto; height:auto;" name="date_arrival" value="<?php echo $row['date']; ?>" />

			<br><span class="horizontal-span">Buyer Name :</span>
			<p class="text" style="font-size: 14px;"><?php echo $row['name']; ?></p>

			<br><span class="horizontal-span">Return QTY :</span>
			<input type="hidden" style="width:auto; height:auto;" name="lorgqty" value="<?php echo $row['qty']; ?>" />
			<input type="hidden" style="width:auto; height:auto;" name="orgqty" value="<?php echo $orgqty; ?>" />
			<input type="number" style="width:auto; height:auto;" id="txt1" onkeyup="sum();" min="0" name="qty" value="<?php echo $row['qty']; ?>" />

			<br><span class="horizontal-span">Price:</span>
			<input type="number" style="width:auto; height:auto;" id="txt2" onkeyup="sum();" min="0" name="price" value="<?php echo $row['price']; ?>" />

			<br><span class="horizontal-span">Total Amount :</span>
			<input type="number" style="width:auto; height:auto;" id="txt3" onkeyup="sum();" min="0" name="amount" value="<?php echo $row['amount']; ?>" disabled />

			<br>

			<div style="float:right; margin-right:10px;">

				<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Confirm Return</button>
			</div>

		</div>
	</form>
	<script>
		function sum() {
			var txtFirstNumberValue = document.getElementById('txt1').value;
			var txtSecondNumberValue = document.getElementById('txt2').value;

			var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);

			if (!isNaN(result)) {

				document.getElementById('txt3').value = result;


			}
		}
	</script>
<?php
}
?>