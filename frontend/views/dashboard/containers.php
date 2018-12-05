<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\StaffInfo;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->user->identity->name;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="customers-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> My Containers</h3>


                </div>
                <div class="panel-body" >

                    <button class="btn btn-white" id="search-option" style="float: right;background: #7fb335;color: #fff;margin-left: 5px;">
                        <i class="linecons-search"></i>
                        <span>Search</span>
                    </button>

                    <p>
                        <?= Html::a('<i class="fa fa-list"></i><span>  Current Inventory </span>', ['home'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone', 'style' => 'float:right']) ?>
                    </p>

                    <div style="margin-top: 45px;">
                        <?php /*
                          GridView::widget([
                          'dataProvider' => $dataProvider,
                          'filterModel' => $searchModel,
                          'columns' => [
                          ['class' => 'yii\grid\SerialColumn'],
                          'export_date',
                          'ETA',
                          'destination',
                          'booking_no',
                          'container_no',
                          'container_type',
                          ],
                          ]);
                         */
                        ?>

                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Export Date</th>
                                        <th>ETA</th>
                                        <th>Destination</th>
                                        <th>Booking Number</th>
                                        <th>Container Number</th>
                                        <th>Type</th>
                                        <th>Car VIN</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($exports as $export) {
                                        $vehicle_id = explode(',', $export->vehicle_id);
                                        foreach ($vehicle_id as $vehicle) {
                                            $vehicle_detail = common\models\Vehicle::findOne($vehicle);
                                            ?>
                                            <tr>
                                                <td><?= $export->export_date ?></td>
                                                <td><?= $export->ETA ?></td>
                                                <td><?= $export->destination ?></td>
                                                <td><?= $export->booking_no ?></td>
                                                <td><?= $export->container_no ?></td>
                                                <td><?= $export->container_type ?></td>
                                                <td><?= $vehicle_detail->vin ?></td>
                                                <td><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['/dashboard/container-detail','id'=>$export->id,'vehicle'=>$vehicle], ['target' => '_blank']) ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>


                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/dataTables.bootstrap.min.css">
<script src="<?= Yii::$app->homeUrl ?>js/jquery.dataTables.min.js"></script>
<script src="<?= Yii::$app->homeUrl ?>js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(".filters").slideToggle();
        $("#search-option").click(function () {
            $(".filters").slideToggle();
        });
        $('#example1').DataTable()
    });
</script>




