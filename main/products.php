<html>

<head>
	<title>
		Yuan Rose
	</title>
	<link rel="shortcut icon" href="img/yuanrose.png">

	<?php
	require_once('auth.php');
	?>
	<link href="css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<style type="text/css">
		body {
			padding-top: 60px;
			padding-bottom: 40px;
		}

		.sidebar-nav {
			padding: 9px 0;
		}

		.badge1 {
			display: inline-block;
			padding: 5px 15px;
			font-size: 16px;
			font-weight: bold;
			color: #fff;
			background-color: #f0ad4e;
			border-radius: 20px;
			text-align: center;
		}

		.badge2 {
			display: inline-block;
			padding: 5px 15px;
			font-size: 16px;
			font-weight: bold;
			color: #fff;
			background-color: #d9534f;
			border-radius: 20px;
			text-align: center;
		}
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">

	<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

	<!--sa poip up-->
	<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="lib/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('a[rel*=facebox]').facebox({
				loadingImage: 'src/loading.gif',
				closeImage: 'src/closelabel.png'
			})
		})
	</script>
</head>
<?php
function createRandomPassword()
{
	$chars = "003232303232023232023456789";
	srand((float)microtime() * 1000000);
	$i = 0;
	$pass = '';
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;
	}
	return $pass;
}
$finalcode = 'RS-' . createRandomPassword();
?>

<script>
	function sum() {
		var txtFirstNumberValue = document.getElementById('txt1').value;
		var txtSecondNumberValue = document.getElementById('txt2').value;
		var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
		if (!isNaN(result)) {
			document.getElementById('txt3').value = result;

		}

		var txtFirstNumberValue = document.getElementById('txt11').value;
		var txtSecondNumberValue = document.getElementById('txt33').value;
		var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
		if (!isNaN(result)) {
			document.getElementById('txt55').value = result;

		}

		var txtFirstNumberValue = document.getElementById('txt4').value;
		var result = parseInt(txtFirstNumberValue);
		if (!isNaN(result)) {
			document.getElementById('txt5').value = result;
		}

	}
</script>


<script language="javascript" type="text/javascript">
	/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */

	var timerID = null;
	var timerRunning = false;

	function stopclock() {
		if (timerRunning)
			clearTimeout(timerID);
		timerRunning = false;
	}

	function showtime() {
		var now = new Date();
		var hours = now.getHours();
		var minutes = now.getMinutes();
		var seconds = now.getSeconds()
		var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
		if (timeValue == "0") timeValue = 12;
		timeValue += ((minutes < 10) ? ":0" : ":") + minutes
		timeValue += ((seconds < 10) ? ":0" : ":") + seconds
		timeValue += (hours >= 12) ? " P.M." : " A.M."
		document.clock.face.value = timeValue;
		timerID = setTimeout("showtime()", 1000);
		timerRunning = true;
	}

	function startclock() {
		stopclock();
		showtime();
	}
	window.onload = startclock;
	// End -->
</SCRIPT>

<body>
	<?php include('navfixed.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2">
				<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li>
						<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Sales</a> </li>
						<li class="active"><a href="products.php"><i class="icon-table icon-2x"></i> Inventory</a> </li>
						<li><a href="category.php"><i class="icon-th-list icon-2x"></i> Category</a> </li>

						<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a> </li>
						<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a> </li>
						<li><a href="sales_inventory.php"><i class="icon-exchange icon-2x"></i> Return Item </a> </li>

						<br><br><br><br><br><br>


					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<div class="span10">
				<div class="contentheader">
					<i class="icon-table"></i> Inventory
				</div>
				<ul class="breadcrumb">
					<li><a href="index.
					.php">Dashboard</a></li> /
					<li class="active">Inventory</li>
				</ul>


				<div style="margin-top: -19px; margin-bottom: 21px;">
					<a href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
					<?php
					include('../connect.php');
					$result = $db->prepare("SELECT * FROM products ORDER BY reorder DESC");
					$result->execute();
					$rowcount = $result->rowcount();
					?>

					<div style="text-align:center;">
						Total Number of Products: <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount; ?>]</font>
					</div>


					<div style="text-align:center;">
						<font style="color:#f0ad4e; font:bold 22px 'Aleo';">[&#11044;]</font> Products are below Safety Stock level
					</div>
					<div style="text-align:center;">
						<font style="color:#d9534f; font:bold 22px 'Aleo';">&nbsp;&nbsp;&nbsp;&nbsp;[&#11044;]</font> Products are Out of Stock
					</div>

				</div>

				<input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" />
				<a rel="facebox" href="addproduct.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Product</button></a><br><br>
				<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
					<thead>
						<tr>
							<th width="12%"> Item Name </th>

							<th width="13%"> Category </th>
							<th width="7%"> Supplier </th>

							<th width="6%"> Original Price </th>
							<th width="6%"> Selling Price </th>
							<th width="7%"> Safety Stock </th>
							<th width="5%"> Qty Left </th>
							<th width="5%"> Order Quantity</th>
							<th width="8%"> Total </th>
							<th width="8%"> Action </th>
						</tr>
					</thead>
					<tbody>

						<?php
						function formatMoney($number, $fractional = false)
						{
							if ($fractional) {
								$number = sprintf('%.2f', $number);
							}
							while (true) {
								$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
								if ($replaced != $number) {
									$number = $replaced;
								} else {
									break;
								}
							}
							return $number;
						}
						include('../connect.php');

						// $result = $db->prepare("SELECT *, price * qty as total FROM products ORDER BY product_id DESC");
						// $result->execute();
						// for ($i = 0; $row = $result->fetch(); $i++) 



						$query = "SELECT *, price * qty as total FROM products ORDER BY product_id DESC";
						$result = mysqli_query($mysqli, $query);

						while ($row = mysqli_fetch_assoc($result)) {
							$product_code = $row['product_code'];
							$gen_name = $row['gen_name'];
							$supplier = $row['supplier'];
							$date_arrival = $row['date_arrival'];
							$o_price = $row['o_price'];
							$price = $row['price'];
							$reorder = $row['reorder'];
							$qty = $row['qty'];
							$totals = $row['total'];
							$product_id = $row['product_id'];

							$total = $row['total'];

							$availableqty = $row['qty'];


							$category = $row['prod_cat_id'];
							// ======START SOLD QTY======
							$query1 = "SELECT SUM(qty) AS soldqty FROM sales_order WHERE product = $product_id";
							$soldqtyquery = mysqli_query($mysqli, $query1);
							while ($row2 = mysqli_fetch_assoc($soldqtyquery)) {
								$soldqty = $row2["soldqty"];

								$query2 = "UPDATE products SET sold_qty = $soldqty WHERE product_id = $product_id";
								$soldqtyquery1 = mysqli_query($mysqli, $query2);
							}
							// ========END SOLD QTY=======

							// ======START ORD QTY======
							$query3 = "SELECT sold_qty, reorder, qty FROM products WHERE product_id = $product_id";
							$ordqtyquery = mysqli_query($mysqli, $query3);
							while ($row3 = mysqli_fetch_assoc($ordqtyquery)) {
								$ordsldqty = $row3["sold_qty"];
								$ordsafety = $row3["reorder"];
								$ordqtyleft = $row3["qty"];
								$ordqty = $ordsldqty + $ordsafety - $ordqtyleft;
								if ($ordqty < 0) {
									$order_quantity = 0;
								} else {
									$order_quantity = $ordqty;
								}
								if ($soldqty > $ordqtyleft) {
									$query4 = "UPDATE products SET sold_qty = 0 WHERE product_id = $product_id";
									$soldqtyreset_query = mysqli_query($mysqli, $query4);
								}
							}
							// ========END ORD QTY=======

							$query = "SELECT * FROM category WHERE cat_id = $category";
							$catquery = mysqli_query($mysqli, $query);

							while ($row = mysqli_fetch_assoc($catquery)) {
								$cat_title = $row["cat_title"];
							}

							if ($availableqty < $reorder) {
								echo '<tr class="alert alert-warning record" style="color: #fff; background-color:#f0ad4e;">';
								if ($availableqty == 0) {
									echo '<tr class="alert alert-warning record" style="color: #fff; background-color:#d9534f;">';
								}
							} else {
								echo '<tr class="record">';
							}

						?>

							<td><?php echo $product_code; ?></td>


							<td><?php echo $cat_title; ?></td>
							<td><?php echo $supplier; ?></td>

							<td>&#8369;<?php
										$oprice = $o_price;
										echo formatMoney($oprice, true);
										?></td>
							<td>&#8369;<?php
										$pprice = $price;
										echo formatMoney($pprice, true);
										?></td>
							<td style="text-align:center;">
								<h4 class="badge1"> <?php echo $reorder; ?></h4>
							</td>

							<td style="text-align:center;">
								<h4 class="badge2"> <?php echo $qty; ?></h4>
							</td>
							<td><?php echo $order_quantity; ?></td>
							<td>&#8369;<?php
										$total = $totals;
										echo formatMoney($total, true);
										?>
							</td>
							<td><a rel="facebox" title="Click to edit the product" href="editproduct.php?id=<?php echo $product_id; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
								<a href="#" id="<?php echo $product_id; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="icon-trash"></i></button></a>
							</td>
							</tr>
						<?php
						}
						?>



					</tbody>
				</table>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<script src="js/jquery.js"></script>
	<script type="text/javascript">
		$(function() {


			$(".delbutton").click(function() {

				//Save the link in a variable called element
				var element = $(this);

				//Find the id of the link that was clicked
				var del_id = element.attr("id");

				//Built a url to send
				var info = 'id=' + del_id;
				if (confirm("Sure you want to delete this Product? There is NO undo!")) {

					$.ajax({
						type: "GET",
						url: "deleteproduct.php",
						data: info,
						success: function() {

						}
					});
					$(this).parents(".record").animate({
							backgroundColor: "#fbc7c7"
						}, "fast")
						.animate({
							opacity: "hide"
						}, "slow");

				}

				return false;

			});

		});
	</script>
</body>
<?php include('footer.php'); ?>

</html>