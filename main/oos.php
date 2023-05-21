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
						<li class="active"><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li>
						<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Sales</a> </li>
						<li><a href="products.php"><i class="icon-table icon-2x"></i> Inventory</a> </li>
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
					<i class="fa-solid fa-boxes-stacked"></i> Out of Stock
				</div>
				<ul class="breadcrumb">
					<li><a href="index.php">Dashboard</a></li> /
					<li class="active">Out of Stock</li>
				</ul>

				<div style="margin-top: -19px; margin-bottom: 21px;">
					<a href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a> <br><br>
					<?php
					include('../connect.php');



					?>



				</div>
				<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search Item..." autocomplete="off" />


				<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
					<thead>
						<tr>
							<th width="5%">Item ID</th>
							<th width="25%"> Item Name </th>
							<th width="23%"> Item Category</th>
							<th width="12%"> Supplier</th>
							<th width="9%"> Available</th>
							<th width="10%">Re-Order Level</th>
							<th width="9%">Action</th>
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

							$query = "SELECT * FROM category WHERE cat_id = $category";
							$catquery = mysqli_query($mysqli, $query);

							while ($row = mysqli_fetch_assoc($catquery)) {
								$cat_title = $row["cat_title"];
							}


							if ($availableqty == 0) {


						?>
								<tr class="record">
									<td><?php echo $product_id; ?></td>
									<td><?php echo $product_code; ?></td>

									<td><?php echo $cat_title; ?></td>
									<td><?php echo $supplier; ?></td>
									<td style="text-align:center;">
										<h4 class="badge1"> <?php echo $qty; ?></h4>
									</td>

									<td style="text-align:center;">
										<h4 class="badge2"> <?php echo $reorder; ?></h4>
									</td>


									<td><a rel="facebox" title="Click to edit the product" href="editreorder.php?id=<?php echo $product_id; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
										<a href="#" id="<?php echo $product_id; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="icon-trash"></i></button></a>
									</td>
								<?php } ?>
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