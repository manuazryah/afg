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
    <div class="col-md-12">
        <button type="button" class="btn btn-block btn-success btn-sm inventory-report">Inventory Report</button>
    </div>
    <div class="col-md-6">
        <div class="vehicle-stat-home">
            <h4>VEHICLE STATUS</h4>
            <table class="table table-bordered">
                <?php $total = $onway + $onhand + $manifest + $shipped ?>
                <thead>
                    <tr>
                        <th>SORT TYPE</th>
                        <th>QUANTITY</th>
                        <th>INVENTORY</th>
                        <th>VIEW</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ALL VEHICLES</td>
                        <td><?= $total ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ON THE WAY</td>
                        <td><?= $onway ?></td>
                        <td><button class="btn home-report" type="2">Report</button></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ON HAND</td>
                        <td><?= $onhand ?></td>
                        <td><button class="btn home-report" type="1">Report</button></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>MANIFEST</td>
                        <td></td>
                        <td><button class="btn home-report" type="">Report</button></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>PICKED UP</td>
                        <td><?= $manifest ?></td>
                        <td><button class="btn home-report" type="4">Report</button></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>CAR SHIPPED</td>
                        <td><?= $shipped ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>WITH TITLE</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>W/O TITLE</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>CAR TOWED</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>NOT TOWED</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div id="piechart"></div>
    </div>
</div>
<div class="modal fade inventory-report-modal" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<style>
    #piechart rect{
        fill: #ecf0f5;
    }
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!---------------------Script for showing order status in home page-------------------------->
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Order Status'],
            ['MANIFEST', <?= $manifest ?>],
            ['CAR ON WAY', <?= $onway ?>],
            ['SHIPPED', <?= $shipped ?>],
            ['ON HAND', <?= $onhand ?>],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title': 'ORDER STATUS', 'width': 550, 'height': 400};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.inventory-report', function () {
            $.ajax({
                url: '<?= Yii::$app->homeUrl; ?>site/inventory-content',
                type: "POST",
                data: {},
                success: function (data) {
                    var res = $.parseJSON(data);
                    $('.modal-content').html(res.result['report']);
                    $('#modal-default').modal('show');
                }
            });
        });


        $(document).on('click', '.home-report', function () {
            var type = $(this).attr('type');
            $.ajax({
                url: '<?= Yii::$app->homeUrl; ?>site/vehicle-status-report',
                type: "POST",
                data: {type: type},
                success: function (data) {
                    var res = $.parseJSON(data);
                    $('.modal-content').html(res.result['report']);
                    $('#modal-default').modal('show');
                }
            });

        });


    });
</script>


