<!DOCTYPE html>
<html>

<head>
	<!-- js -->
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
	<title>
		Yuan Rose
	</title>
	<link rel="shortcut icon" href="img/yuanrose.png">
	<?php
	require_once('auth.php');
	?>

	<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
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
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">

	<!-- combosearch box-->

	<script src="vendors/jquery-1.7.2.min.js"></script>
	<script src="vendors/bootstrap.js"></script>



	<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
	<!--sa poip up-->

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>



	<script language="javascript" type="text/javascript">
		/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
		<!-- Begin
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

<body>
	<?php include('navfixed.php'); ?>
	<?php
	$position = $_SESSION['SESS_LAST_NAME'];
	if ($position == 'cashier') {
	?>
		<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Cash</a>

		<a href="../index.php">Logout</a>
	<?php
	}
	if ($position == 'admin' || $position = 'superadmin') {
	?>

		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span2">
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li>
							<li class="active"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Sales</a> </li>
							<li><a href="products.php"><i class="icon-table icon-2x"></i> Inventory</a> </li>
							<li><a href="category.php"><i class="icon-th-list icon-2x"></i> Category</a> </li>

							<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a> </li>
							<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a> </li>
							<li><a href="sales_inventory.php"><i class="icon-exchange icon-2x"></i> Return Item </a> </li>
							<br><br><br><br><br><br>


						</ul>
					<?php } ?>
					</div><!--/.well -->
				</div><!--/span-->
				<div class="span10">
					<div class="contentheader">
						<i class="icon-money"></i> Sales
					</div>
					<ul class="breadcrumb">
						<a href="index.php">
							<li>Dashboard</li>
						</a> /
						<li class="active">Sales</li>
					</ul>
					<div style="margin-top: -19px; margin-bottom: 21px;">
						<a href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
					</div>

					<form action="incoming.php" method="post">

						<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
						<input type="text" oninvalid="this.setCustomValidity('Please enter Sales Invoice No.')" oninput="this.setCustomValidity('')" id="invoice" name="invoice" placeholder="Enter Sales Invoice No." value="<?php if (!empty($_SESSION['invoice_no'])) {
																																																									echo $_GET['invoice'];
																																																								} else {
																																																									echo "";
																																																								}
																																																								?>" required /> <button type="button" id="btnsino" class="btn btn-info btn-small" style="width: 130px; height:35px; margin-top:-5px;"><i class="icon-refresh icon-large"></i> Generate SI no.</button><br>

						<select name="category" style="width:350px; " class="select2" data-placeholder="Select Category" required>
							<option></option>
							<?php
							include('../connect.php');
							$result = $db->prepare("SELECT * FROM category");
							$result->bindParam(':userid', $rescat);
							$result->execute();
							for ($i = 0; $row = $result->fetch(); $i++) {
							?>
								<option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_title']; ?></option>

							<?php

							}
							?>
						</select>
						<select name="product" style="width:650px;" class="select2" name="myDropdown" id="my-dropdown" data-live-search="true" data-placeholder="Select Product" required>

						</select>

						<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
						<input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
						<input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
						<button type="submit" id="addsino" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;"><i class="icon-plus-sign icon-large"></i> Add</button>
					</form>
					<table class="table table-bordered" id="resultTable" data-responsive="table">
						<thead>
							<tr>
								<th> Item Name </th>
								<th> Category</th>
								<th> Price </th>
								<th> Qty </th>
								<th> Amount </th>
								<th> Profit </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>

							<?php
							$id = $_GET['invoice'];
							include('../connect.php');
							$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
							$result->bindParam(':userid', $id);
							$result->execute();
							for ($i = 1; $row = $result->fetch(); $i++) {
								$catid = $row['category'];
							?>
								<tr class="record">
									<td hidden><?php echo $row['product']; ?></td>
									<td><?php echo $row['product_code']; ?></td>

									<?php $rslt = $db->prepare("SELECT * FROM category WHERE cat_id= $catid");
									$rslt->bindParam(':l', $catid);
									$rslt->execute();
									for ($j = 1; $rows = $rslt->fetch(); $j++) {
									?>
										<td><?php echo $rows['cat_title']; ?></td>

									<?php } ?>
									<td>
										<?php
										$ppp = $row['price'];
										echo "&#8369;" . formatMoney($ppp, true);
										?>
									</td>
									<td><?php echo $row['qty']; ?></td>
									<td>
										<?php
										$dfdf = $row['amount'];
										echo "&#8369;" . formatMoney($dfdf, true);
										?>
									</td>
									<td>
										<?php
										$profit = $row['profit'];
										echo "&#8369;" . formatMoney($profit, true);
										?>
									</td>
									<td width="90"><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty']; ?>&code=<?php echo $row['product']; ?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
								</tr>
							<?php
							}
							?>
							<tr>
								<th> </th>
								<th> </th>
								<th> </th>
								<th> </th>
								<th> </th>
								<td> Total Amount: </td>
								<td> Total Profit: </td>
								<th> </th>
							</tr>
							<tr>
								<th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
								<td colspan="1"><strong style="font-size: 12px; color: #222222;">
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
										$sdsd = $_GET['invoice'];
										$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
										$resultas->bindParam(':a', $sdsd);
										$resultas->execute();
										for ($i = 0; $rowas = $resultas->fetch(); $i++) {
											$fgfg = $rowas['sum(amount)'];
											echo "&#8369;" . formatMoney($fgfg, true);
										}
										?>
									</strong></td>
								<td colspan="1"><strong style="font-size: 12px; color: #222222;">
										<?php
										$resulta = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :b");
										$resulta->bindParam(':b', $sdsd);
										$resulta->execute();
										for ($i = 0; $qwe = $resulta->fetch(); $i++) {
											$asd = $qwe['sum(profit)'];
											echo "&#8369;" . formatMoney($asd, true);
										}
										?>

								</td>
								<th></th>
							</tr>

						</tbody>
					</table><br>
					<a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id'] ?>&invoice=<?php echo $_GET['invoice'] ?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd; ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME'] ?>"><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> SAVE</button></a>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<script>
			$("select[name='category']").change(function() {
				var stateID = $(this).val();


				if (stateID) {


					$.ajax({
						url: "ajaxpro.php",
						dataType: 'Json',
						data: {
							'id': stateID
						},
						success: function(data) {
							$('select[name="product"]').empty();
							$.each(data, function(key, value) {
								$('select[name="product"]').append('<option value="' + key + '">' + value + '</option>');
							});


						}
					});


				} else {
					$('select[name="product"]').empty();

				}
			});
			$(document).ready(function() {
				$('.select2').select2();
				$('#my-dropdown').select2({
					placeholder: 'Search for an option'
				});




				// Handle button click event
				$("#btnsino").click(function() {
					// Retrieve PHP value using AJAX or from a hidden input field, replace 'phpValue' with the actual PHP value
					var phpValue = "<?php echo $_GET['invoice']; ?>";

					// Set the value of the input field
					$("#invoice").val(phpValue);
				});


			});
		</script>
</body>
<?php include('footer.php'); ?>

</html>