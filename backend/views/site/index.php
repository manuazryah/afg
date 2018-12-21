<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'AFGShipping';
?>
<?php
Modal::begin([
    'header' => '',
    'id' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div id = 'modalContent'></div>";
Modal::end();
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $onway ?></h3>

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
                <h3><?= $onhand ?></h3>
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
                <h3><?= $manifest ?></h3>
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
                <h3><?= $shipped ?></h3>
                <p>SHIPPED</p>
            </div>
            <div class="icon">
                <img class="car-img" src="<?= yii::$app->homeUrl; ?>img/cruise.png" alt="car image">
            </div>
        </div>
    </div>

    <div class="customer-search">
        <?php
        $form = ActiveForm::begin([
                    'action' => ['home'],
                    'method' => 'get',
        ]);
        ?>

        <div class="col-md-10">
<?= $form->field($searchModel, 'vehicle_global_search')->textInput(['placeholder' => 'CUSTOMER NAME,VIN,LOT NO,MODEL,MAKE,COLOR'])->label('VEHICLE GLOBAL SEARCH') ?>
        </div>
        <div class="col-md-2">
            <?= Html::submitButton('Search', ['class' => 'btn btn-warning', 'style' => 'margin-top: 22px;']) ?>
<?= Html::a('Reset', ['home'], ['class' => 'btn btn-default mrg-top-23']) ?>
        </div>

    <?php ActiveForm::end(); ?>
    </div>
        <?php if (isset(Yii::$app->request->queryParams['VehicleSearch']) && Yii::$app->request->queryParams['VehicleSearch'] != '') { ?>
        <div class="col-md-12">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'hat',
                    [
                        'attribute' => 'requested_date',
                        'value' => function($model) {
                            return date('Y-m-d', strtotime($model->titleInfos->towing_request_date));
                        }
                    ],
                    [
                        'attribute' => 'dely_date',
                        'value' => function($model) {
                            return date('Y-m-d', strtotime($model->titleInfos->deliver_date));
                        }
                    ],
                    'year',
                    'make',
                    'model',
                    'vin',
                    [
                        'attribute' => 'keys',
                        'value' => function($model) {
                            return $model->towingInfos->keys;
                        }
                    ],
//                    'lot_no',
                    [
                        'attribute' => 'lot_no',
                        'format' => 'raw',
                        'value' => function($model) {
                            return Html::button($model->lot_no, ['value' => Url::to(['masters/vehicle/vehicle-condition-report', 'id' => $model->id]), 'class' => 'modalButton vehicl_lot_no']);
                        }
                    ],
                    [
                        'attribute' => 'status_id',
                        'value' => function($model) {
                            if ($model->status_id == 1) {
                                return 'ON HAND';
                            } else if ($model->status_id == 2) {
                                return 'ON THE WAY';
                            } else if ($model->status_id == 3) {
                                return 'SHIPPED';
                            } else if ($model->status_id == 4) {
                                return 'PICKED UP';
                            } else if ($model->status_id == 5) {
                                return 'MANIFEST';
                            }
                        }
                    ],
                ],
            ]);
            ?>
        </div>
<?php } ?>
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
                        <td><?= yii\helpers\Html::a('VIEW', ['masters/vehicle/index', 'status' => 2], ['target' => '_blank']) ?></td>
                    </tr>
                    <tr>
                        <td>ON HAND</td>
                        <td><?= $onhand ?></td>
                        <td><button class="btn home-report" type="1">Report</button></td>
                        <td><?= yii\helpers\Html::a('VIEW', ['masters/vehicle/index', 'status' => 1], ['target' => '_blank']) ?></td>
                    </tr>
                    <tr>
                        <td>MANIFEST</td>
                        <td><?= $manifest ?></td>
                        <td><button class="btn home-report" type="5">Report</button></td>
                        <td><?= yii\helpers\Html::a('VIEW', ['masters/vehicle/index', 'status' => 5], ['target' => '_blank']) ?></td>
                    </tr>
                    <tr>
                        <td>PICKED UP</td>
                        <td><?= $pickedup ?></td>
                        <td><button class="btn home-report" type="4">Report</button></td>
                        <td><?= yii\helpers\Html::a('VIEW', ['masters/vehicle/index', 'status' => 4], ['target' => '_blank']) ?></td>
                    </tr>
                    <tr>
                        <td>CAR SHIPPED</td>
                        <td><?= $shipped ?></td>
                        <td><button class="btn home-report" type="3">Report</button></td>
                        <td><?= yii\helpers\Html::a('VIEW', ['masters/vehicle/index', 'status' => 3], ['target' => '_blank']) ?></td>
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
    .vehicl_lot_no{
        background: none;
        border: none;
        color: #3c8dbc;
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


<script>
    $(document).on('click', '.modalButton', function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr("value"));
    });
</script>