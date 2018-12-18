<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\Customers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$car_on_hand = 0;
$car_on_way = 0;
$manifest = 0;
$picked_up = 0;
$shipped = 0;
$without_title = 0;
$with_title = 0;
$with_towing = 0;
$without_towing = 0;
foreach ($vehicle_id as $vehicle) {
    $vehicle_details = \common\models\Vehicle::findOne($vehicle);
    $vehicle_title_info = common\models\VehicleTitleInfo::find()->where(['vehicle_id' => $vehicle])->one();
    $vehicle_towing = common\models\VehicleTowingInfo::find()->where(['vehicle_id' => $vehicle])->one();
    if ($vehicle_details->status_id == 1) {
        $car_on_hand = $car_on_hand + 1;
    } else if ($vehicle_details->status_id == 2) {
        $car_on_way = $car_on_way + 1;
    } else if ($vehicle_details->status_id == 5) {
        $manifest = $manifest + 1;
    } else if ($vehicle_details->status_id == 4) {
        $picked_up = $picked_up + 1;
    } else if ($vehicle_details->status_id == 3) {
        $shipped = $shipped + 1;
    }
    if ($vehicle_title_info->title == 0) {
        $without_title = $without_title + 1;
    } else if ($vehicle_title_info->title == 1) {
        $with_title = $with_title + 1;
    }

    if ($vehicle_towing->towed == 'Yes') {
        $with_towing = $with_towing + 1;
    } else if ($vehicle_towing->towed == 'No') {
        $without_towing = $without_towing + 1;
    }
}

$total_vehicles = $car_on_hand + $car_on_way + $manifest + $picked_up + $shipped;
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

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $car_on_way ?></h3>
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
                <h3><?= $car_on_hand ?></h3>
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
</div>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <div class="panel-body"><div class="export-view">
                        <p>
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Customers</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                        </p>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>CUSTOMER NAME</th>
                                        <td><?= $model->name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>CUSTOMER Id</th>
                                        <td><?= $model->customer_id; ?></td>
                                    </tr>
                                    <tr>
                                        <th>COMPANY NAME</th>
                                        <td><?= $model->company_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>EMAIL</th>
                                        <td><?= $model->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ADDRESS 1</th>
                                        <td><?= $model->address1; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ADDRESS 2</th>
                                        <td><?= $model->address2; ?></td>
                                    </tr>
                                    <tr>
                                        <th>PHONE USA</th>
                                        <td><?= $model->phone_usa; ?></td>
                                    </tr>
                                    <tr>
                                        <th>PHONE UAE</th>
                                        <td><?= $model->phone_uae; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>CITY</th>
                                        <td><?= $model->city; ?></td>
                                    </tr>
                                    <tr>
                                        <th>STATE</th>
                                        <?php
                                        $location_name = '';
                                        if (isset($model->state)) {
                                            $location = common\models\Location::findOne($model->state);
                                            $location_name = $location->location;
                                        }
                                        ?>
                                        <td><?= $location_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>COUNTRY</th>
                                        <td><?= $model->country; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ZIP CODE</th>
                                        <td><?= $model->zipcode; ?></td>
                                    </tr>
                                    <tr>
                                        <th>TRN UAE</th>
                                        <td><?= $model->trn_uae; ?></td>
                                    </tr>
                                    <tr>
                                        <th>TRN USA</th>
                                        <td><?= $model->trn_usa; ?></td>
                                    </tr>
                                    <tr>
                                        <th>OTHER EMAILS</th>
                                        <td><?= $model->other_emails; ?></td>
                                    </tr>

                                    <tr>
                                        <th>NOTE</th>
                                        <td><?= $model->notes; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div>
                            <div id="custom_carousel" class="customer-view-count" data-ride="carousel" data-interval="">
                                <div class="controls">
                                    <ul class="nav">
                                        <li data-target="#custom_carousel" class="active" data-slide-to="3">
                                            <a href="#">
                                                <div class="box-body2 box-text-right">
                                                    <p class="box-text2">
                                                        <?php
                                                        $location_name = '';
                                                        if (isset($model->state)) {
                                                            $location = common\models\Location::findOne($model->state);
                                                            $location_name = $location->location;
                                                        }
                                                        ?>
                                                        LOCATION: <strong style=""> <?= $location_name ?></strong><br>
                                                        ON THE WAY <span class="states" style="float: right"><?= $car_on_way ?></span><br>
                                                        ON THE HAND <span class="states" style="float: right"><?= $car_on_hand ?></span><br>
                                                        SHIPPED<span class="states" style="float: right"><?= $shipped ?></span>
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3 class="">   ORDER OVERVIEW     </h3>
                                                    <div id="piechart"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h3 class="pull-left"> VEHICLE STATUS  </h3>
                                                    <button type="button" class="btn btn-block btn-success btn-sm inventory-report" id="<?= $model->id ?>">Inventory Report</button>
                                                    <table class="table table-striped table-bordered" style="min-height: 447px;">
                                                        <thead>
                                                            <tr>

                                                                <th>Sort Type</th>
                                                                <th>Quantity</th>
                                                                <th>Inventory</th><th>Pdf</th>
                                                                <th>View</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td>ALL VEHICLES</td>
                                                                <td><?= $total_vehicles ?></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><?= Html::a('VIEW', ['vehicle/index', 'customer' => $model->id], ['class' => '', 'target' => '_blank']) ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Car on  way</td>
                                                                <td><?= $car_on_way ?></td>
                                                                <td><?= Html::button('Report', ['value' => Url::to(['report', 'id' => $model->id, 'status' => 2]), 'class' => 'customer-view-report modalButton']); ?></td>
                                                                <td><?= Html::a('<i class="fa fa-file-pdf-o"></i> Open as Pdf', ['report-pdf', 'id' => $model->id, 'status' => 2], ['class' => 'btn btn-primary open-pdf', 'target' => '_blank']) ?></td>
                                                                <td><?= Html::a('VIEW', ['vehicle/index', 'customer' => $model->id, 'status' => 2], ['class' => '', 'target' => '_blank']) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Car On hand</td>
                                                                <td><?= $car_on_hand ?></td>
                                                                <td><?= Html::button('Report', ['value' => Url::to(['report', 'id' => $model->id, 'status' => 1]), 'class' => 'customer-view-report modalButton']); ?></td>
                                                                <td><?= Html::a('<i class="fa fa-file-pdf-o"></i> Open as Pdf', ['report-pdf', 'id' => $model->id, 'status' => 1], ['class' => 'btn btn-primary open-pdf', 'target' => '_blank']) ?></td>
                                                                <td><?= Html::a('VIEW', ['vehicle/index', 'customer' => $model->id, 'status' => 1], ['class' => '', 'target' => '_blank']) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Manifest</td>
                                                                <td><?= $manifest ?></td>
                                                                <td><?= Html::button('Report', ['value' => Url::to(['report', 'id' => $model->id, 'status' => 5]), 'class' => 'customer-view-report modalButton']); ?></td>
                                                                <td><?= Html::a('<i class="fa fa-file-pdf-o"></i> Open as Pdf', ['report-pdf', 'id' => $model->id, 'status' => 5], ['class' => 'btn btn-primary open-pdf', 'target' => '_blank']) ?></td>
                                                                <td><?= Html::a('VIEW', ['vehicle/index', 'customer' => $model->id, 'status' => 5], ['class' => '', 'target' => '_blank']) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Picked Up</td>
                                                                <td><?= $picked_up ?></td>
                                                                <td><?= Html::button('Report', ['value' => Url::to(['report', 'id' => $model->id, 'status' => 4]), 'class' => 'customer-view-report modalButton']); ?></td>
                                                                <td><?= Html::a('<i class="fa fa-file-pdf-o"></i> Open as Pdf', ['report-pdf', 'id' => $model->id, 'status' => 4], ['class' => 'btn btn-primary open-pdf', 'target' => '_blank']) ?></td>
                                                                <td><?= Html::a('VIEW', ['vehicle/index', 'customer' => $model->id, 'status' => 4], ['class' => '', 'target' => '_blank']) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>CAR SHIPPED </td>
                                                                <td><?= $shipped ?></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><?= Html::a('VIEW', ['vehicle/index', 'customer' => $model->id, 'status' => 3], ['class' => '', 'target' => '_blank']) ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td>WITH TITLE</td>
                                                                <td><?= $with_title ?></td>
                                                                <td></td><td></td>
                                                                <td><?= Html::a('VIEW', ['vehicle/index', 'customer' => $model->id, 'status' => 7], ['class' => '', 'target' => '_blank']) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>W/O TITLE</td>
                                                                <td><?= $without_title ?></td>
                                                                <td></td><td></td>
                                                                <td><?= Html::a('VIEW', ['vehicle/index', 'customer' => $model->id, 'status' => 6], ['class' => '', 'target' => '_blank']) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>CAR TOWED</td>
                                                                <td><?= $with_towing ?></td>
                                                                <td></td><td></td>
                                                                <td><?= Html::a('VIEW', ['vehicle/index', 'customer' => $model->id, 'status' => 8], ['class' => '', 'target' => '_blank']) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Not Towed</td>
                                                                <td><?= $without_towing ?></td>
                                                                <td></td><td></td>
                                                                <td><?= Html::a('VIEW', ['vehicle/index', 'customer' => $model->id, 'status' => 9], ['class' => '', 'target' => '_blank']) ?></td>

                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item -->
                                </div>
                                <!-- End Carousel Inner -->

                                <div class="white-box consignee-tab">
                                    <h4>Consignee /Notifying party</h4>
                                    <div class="row">

                                        <?php foreach ($consignees as $consigne) { ?>
                                            <div class="col-md-6">
                                                <table id="w0" class="table table-striped table-bordered detail-view">
                                                    <tbody>
                                                        <tr>
                                                            <th>Consignee Name</th>
                                                            <td><?= $consigne->consignee_name ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Consignee Address</th>
                                                            <td><?= $consigne->address1 ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Consignee City</th>
                                                            <td><?= $consigne->city ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Consignee Country</th>
                                                            <td><?= $consigne->country ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Consignee Phone</th>
                                                            <td><?= $consigne->phone ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <h4>Customer Documents</h4>

                                    <?php
                                    $path = Yii::getAlias('@paths') . '/customers/' . $model->id;
                                    if (count(glob("{$path}/*")) > 0) {
                                        $k = 0;
                                        foreach (glob("{$path}/*") as $file) {
                                            $k++;
                                            $arry = explode('/', $file);
                                            $img_nmee = end($arry);

                                            $img_nmees = explode('.', $img_nmee);

                                            if ($img_nmees['1'] != '') {
                                                ?>

                                                <div class="col-md-3">
                                                    <?php if ($img_nmees['1'] == 'pdf') { ?>
                                                        <iframe id="fred" style="border:1px solid #666CCC"  src="<?= Yii::$app->homeUrl . '../uploads/customers/' . $model->id . '/' . end($arry) ?>" frameborder="1" scrolling="auto" height="300" width="100%"></iframe>
                                                        <br> <a target="_blank" href="<?= Yii::$app->homeUrl . '../uploads/customers/' . $model->id . '/' . end($arry) ?>">Download</a>                                                       
                                                    <?php } else { ?>
                                                        <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/customers/' . $model->id . '/' . end($arry) ?>">
                                                    <?php } ?>
                                                </div>
                                                <?php
                                            }
                                            if ($k % 4 == 0) {
                                                echo '<div class="clearfix"></div>';
                                            }
                                        }
                                    }
                                    ?>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Order Status'],
            ['MANIFEST', <?= $manifest ?>],
            ['CAR ON WAY', <?= $car_on_way ?>],
            ['SHIPPED', <?= $shipped ?>],
            ['ON HAND', <?= $car_on_hand ?>],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title': '', 'width': 550, 'height': 400};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

<script>
    $(document).on('click', '.modalButton', function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr("value"));
    });
</script>

<script>
    $(document).ready(function () {
        $(document).on('click', '.inventory-report', function () {
            $.ajax({
                url: '<?= Yii::$app->homeUrl; ?>masters/customers/inventory-content',
                type: "POST",
                data: {customer: $(this).attr('id')},
                success: function (data) {
                    var res = $.parseJSON(data);
                    $('.modal-content').html(res.result['report']);
                    $('#modal-default').modal('show');
                }
            });
        });

    });
</script>