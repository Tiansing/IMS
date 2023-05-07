<?php include "../connect.php"; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>


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
<style type="text/css">
    .dashboard {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card {
        width: 300px;
        height: 100px;
        margin: 10px;
        background-color: #e82a36;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .chart_card {
        width: 250px;
        height: 260px;
        margin: 10px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .table_card {
        width: 300px;
        height: auto;
        margin: 10px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        display: flex;
        flex-direction: column;

        align-items: center;
    }

    .report {
        width: 150px;
        height: 260px;
        margin: 10px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        display: flex;
        flex-direction: column;

        align-items: center;
    }

    .card-icon {
        font-size: 70px;
        color: #8c2626;
    }

    .card-info h3 {
        margin: 0;
        font-size: 24px;
        color: #fff;
    }

    .card-info p {
        margin: 0;
        font-size: 36px;
        font-weight: bold;
        color: #efff00;
    }

    .card-info {
        text-align: center;
    }


    .card-infos h3 {
        margin: 0;
        font-size: 14px;
        color: #747474;
    }

    .card-infos p {
        margin: 0;
        font-size: 29px;
        font-weight: bold;
        color: #00235B;
    }

    .card-infos {
        text-align: center;
        margin-top: 35px;

    }
</style>


<!-- ---------------DASHBOARD CARDS START-------------- -->

<div class="dashboard">
    <div class="card">
        <div class="card-icon">
            <i class="fas fa-chart-bar"></i>
        </div>
        <div class="card-info">


            <h3>Inventory Value</h3>
            <?php
            $query = "SELECT * FROM products";
            $inv_query = mysqli_query($mysqli, $query);
            $inventory_value = 0;
            while ($row = mysqli_fetch_assoc($inv_query)) {
                $inventory_value += $row["price"];
            }
            ?>
            <p><?php echo "&#8369;" . formatMoney($inventory_value, true); ?></p>

        </div>
    </div>
    <a href="re_order.php">
        <div class="card">
            <div class="card-icon">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>

            <div class="card-info">

                <h3>Re-Order</h3>


                <?php $query = "SELECT * FROM products";
                $prod_query = mysqli_query($mysqli, $query);
                $reorder_level = 0;
                while ($row = mysqli_fetch_assoc($prod_query)) {
                    $qty = $row["qty"];
                    $reorder = $row["reorder"];
                    if ($qty < $reorder) {
                        $reorder_level += 1;
                    }
                }

                ?>
                <p><?php echo $reorder_level; ?></p>
            </div>

        </div>
    </a>
    <a href="oos.php">
        <div class="card">
            <div class="card-icon">
                <i class="fa-sharp fa-solid fa-box-open"></i>
            </div>
            <div class="card-info">
                <h3>Out of Stock</h3>
                <?php $query = "SELECT * FROM products";
                $oos_query = mysqli_query($mysqli, $query);
                $oos = 0;
                while ($row = mysqli_fetch_assoc($oos_query)) {
                    $qty = $row["qty"];

                    if ($qty <= 0) {
                        $oos += 1;
                    }
                }

                ?>
                <p><?php echo $oos; ?></p>
            </div>
        </div>
    </a>

    <div id="donutchart" class="chart_card"> </div>


    <div id="donutchart1" class="chart_card"></div>

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

    $res = $db->prepare("SELECT category, product_code FROM sales_order GROUP BY product_code ORDER BY COUNT(*) DESC LIMIT 5");
    $res->execute();

    ?>
    <div class="report">
        <div class="card-infos" style=" border-bottom: 1px solid black; padding-bottom:20px;">

            <?php $query = "SELECT sum(amount) FROM sales_order";
            $totrev_query = mysqli_query($mysqli, $query);

            while ($row = mysqli_fetch_assoc($totrev_query)) {
                $total_rev = $row["sum(amount)"];
            }

            ?>
            <p><?php echo "&#8369;" . number_format($total_rev); ?></p>
            <h3>Total Revenue</h3>
        </div>

        <div class="card-infos">

            <?php

            $query = "SELECT SUM(amount) AS total_sales, COUNT(DISTINCT DATE(date)) AS num_days FROM sales";
            $avg_query = mysqli_query($mysqli, $query);
            $row = $avg_query->fetch_assoc();
            if (!empty($row["total_sales"])) {

                $total_sales = $row["total_sales"];
                $num_days = $row["num_days"];
                $avg_sales_per_day = $total_sales / $num_days;


                $formatted_number = number_format($avg_sales_per_day);
                $thousands = explode(',', $formatted_number)[0];
                $re = $thousands . "k";
            } else {
                $re = 0;
            }
            ?>
            <p><?php echo "&#8369;" . $re; ?></p>
            <h3>Avg Sales Per Day</h3>
        </div>
    </div>
    <div class="table_card">

        <h5 style="align-items: center; text-align:center;"><strong>Top Selling Products</strong></h5>

        <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">

            <thead>
                <tr>
                    <th width="5%">Ranking</th>
                    <th width="20%">Category</th>

                    <th width="40%">Item Name</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($res as $row) {
                    $i++;
                    $catid = $row['category'];
                ?>

                    <tr>
                        <td><?php echo "Top " . $i; ?></td>
                        <?php

                        $query = "SELECT * FROM category WHERE cat_id =$catid";
                        $cat_query = mysqli_query($mysqli, $query);

                        while ($rows = mysqli_fetch_assoc($cat_query)) {


                        ?>
                            <td><?php echo  $rows['cat_title']; ?></td>
                        <?php  } ?>
                        <td><?php echo  $row['product_code']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>







</div>

<!-- ---------------DASHBOARD CARDS END-------------- -->
<?php
// $query = "SELECT category.cat_title, sum(product.price) as halaga FROM products JOIN category ON products.prod_cat_id = category.cat_id GROUP BY products.prod_cat_id";
// $catval = mysqli_query($mysqli, $query);
$result = $db->prepare("SELECT category.cat_title, sum(price) as halaga FROM products JOIN category ON products.prod_cat_id = category.cat_id GROUP BY products.prod_cat_id");
$result->execute();


$results = $db->prepare("SELECT category.cat_title, sum(profit) as proft FROM products JOIN category ON products.prod_cat_id = category.cat_id GROUP BY products.prod_cat_id");
$results->execute();

?>
<script>
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart1);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Category', 'Value'],

            <?php
            for ($i = 0; $row = $result->fetch(); $i++) {
                echo "['" . $row["cat_title"] . "', " . $row["halaga"] . "],";
            }

            ?>


        ]);

        var options = {
            title: 'Inventory Value by Category:',
            titleTextStyle: {
                fontSize: 15, // or any other font size you want

            },
            pieHole: 0.4,
            legend: 'none',


        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }

    function drawChart1() {
        var data = google.visualization.arrayToDataTable([
            ['Category', 'Revenue'],
            <?php
            for ($i = 0; $rows = $results->fetch(); $i++) {
                echo "['" . $rows["cat_title"] . "', " . $rows["proft"] . "],";
            }

            ?>
        ]);

        var options = {
            title: 'Total Revenue by Category:',
            titleTextStyle: {
                fontSize: 15, // or any other font size you want

            },
            pieHole: 0.4,
            legend: 'none',

        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
        chart.draw(data, options);
    }
</script>