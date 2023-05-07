<!DOCTYPE html>
<html>

<head>
	<title>
		POS
	</title>
	<link href="css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<style type="text/css">
		.sidebar-nav {
			padding: 9px 0;
		}
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
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
	<?php
	require_once('auth.php');
	?>
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

<body>
	<?php include('navfixed.php'); ?>
	<?php
	$position = $_SESSION['SESS_LAST_NAME'];
	if ($position == 'cashier') {
	?>

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
							<li class="active"><a href="#"> <i class="icon-dashboard icon-2x"></i> Dashboard </a></li>
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
						Dashboard
					</div>
					<ul class="breadcrumb">
						<li class="active">Dashboard</li>
					</ul>
					<?php

					if ($position == 'superadmin') {
						include "dashboardcard.php";
					} else {
					?>
						<div class="image-container" style="text-align: center;">
							<img src="./img/yuanrose.png" width="600px	" alt="">
							<h1 style="margin-left: 340px; margin-right: 340px;">Yuan Rose Trading, Construction, and Hardware Supply Corporation</h1>
						</div>

				<?php
					}
				}
				?>

				</div>

			</div>
		</div>
</body>
<?php include('footer.php'); ?>

</html>