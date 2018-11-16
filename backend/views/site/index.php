<?php
/* @var $this yii\web\View */

$this->title = 'AFGShipping';
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>150</h3>

                <p>ON THE WAY</p>
            </div>
            <div class="icon">
                <img class="car-img" src="<?= yii::$app->homeUrl; ?>img/trailer.png" alt="car image">
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>ON HAND</p>
            </div>
            <div class="icon">
                <img class="car-img" src="<?= yii::$app->homeUrl; ?>img/car-repair.png" alt="car image">
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>44</h3>

                <p>MANIFEST</p>
            </div>
            <div class="icon">
                <img class="car-img" src="<?= yii::$app->homeUrl; ?>img/notebook.png" alt="car image">
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>65</h3>

                <p>SHIPPED</p>
            </div>
            <div class="icon">
                <img class="car-img" src="<?= yii::$app->homeUrl; ?>img/cruise.png" alt="car image">
            </div>
        </div>
    </div>
    <div class="col-md-6">

    </div>
    <div class="col-md-6">
        <div id="piechart"></div>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Order Status'],
            ['MANIFEST', 8],
            ['CAR ON WAY', 8],
            ['SHIPPED', 4],
            ['ON HAND', 6],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title': 'ORDER STATUS', 'width': 550, 'height': 400};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>


