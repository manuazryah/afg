<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
//use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Export */

$this->title = 'Export Details';
$this->params['breadcrumbs'][] = ['label' => 'Exports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">

                <div class="panel-body"><div class="export-view">

                        <p>
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Export</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::button('Dock Receipt', ['value' => Url::to(['dockexport', 'id' => $model->id]), 'class' => 'btn btn-warning  btn-icon btn-icon-standalone modalButton']); ?>
                            <?= Html::button('Houston Cover Letter', ['value' => Url::to(['houston-cover-letter', 'id' => $model->id]), 'class' => 'btn btn-warning  btn-icon btn-icon-standalone modalButton']); ?>
                            <?= Html::button('Customs Cover Letter', ['value' => Url::to(['custom-cover-letter', 'id' => $model->id]), 'class' => 'btn btn-warning  btn-icon btn-icon-standalone modalButton']); ?>
                            <button onclick="jQuery('#customs-cover-letter').modal('show');" class="btn btn-warning  btn-icon btn-icon-standalone" >Customs Cover Letter</button>
                            <button onclick="jQuery('#manifest').modal('show');" class="btn btn-warning  btn-icon btn-icon-standalone" >Manifest</button>
                            <button onclick="jQuery('#bill-of-lading').modal('show');" class="btn btn-warning  btn-icon btn-icon-standalone" >Bill of Lading</button>
                            <button onclick="jQuery('#non-haz').modal('show');" class="btn btn-warning  btn-icon btn-icon-standalone" >Non-Haz</button>

                        </p>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <h4>Export Detail</h4>
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>EXPORT DATE</th>
                                        <td><?= $model->export_date ?></td>
                                    </tr>
                                    <tr>
                                        <th>LOADING DATE</th>
                                        <td><?= $model->loding_date ?></td>
                                    </tr>
                                    <tr>
                                        <th>BROKER NAME</th>
                                        <td><?= $model->broker_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>BOOKING NO</th>
                                        <td><?= $model->booking_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>ETA</th>
                                        <td><?= $model->ETA ?></td>
                                    </tr>
                                    <tr>
                                        <th>AR NO</th>
                                        <td><?= $model->ar_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>XTN NO</th>
                                        <td><?= $model->xtn_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>SEAL NO</th>
                                        <td><?= $model->seal_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>CONTAINER NO</th>
                                        <td><?= $model->container_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>CUT OFF</th>
                                        <td><?= $model->cut_off ?></td>
                                    </tr>
                                    <tr>
                                        <th>VESSEL</th>
                                        <td><?= $model->vessel ?></td>
                                    </tr>
                                    <tr>
                                        <th>VOYAGE</th>
                                        <td><?= $model->voyage ?></td>
                                    </tr>
                                    <tr>
                                        <th>TERMINAL</th>
                                        <td><?= $model->terminal ?></td>
                                    </tr>
                                    <tr>
                                        <th>STREAMSHIP LINE</th>
                                        <td><?= $model->stremship_line ?></td>
                                    </tr>
                                    <tr>
                                        <th>ITN</th>
                                        <td><?= $model->ITN ?></td>
                                    </tr>
                                    <tr>
                                        <th>CONTAINER TYPE</th>
                                        <td><?= $model->additional_info_container_type ?></td>
                                    </tr>
                                    <tr>
                                        <th>PORT OF LOADING</th>
                                        <td><?= $model->port_of_loading ?></td>
                                    </tr>
                                    <tr>
                                        <th>PORT OF DISCHARGE</th>
                                        <td><?= $model->port_of_discharge ?></td>
                                    </tr>
                                    <tr>
                                        <th>BOL NOTE</th>
                                        <td><?= $model->bol_note ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <h4>Houston Custom Cover Letter</h4>
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>EXPORT DATE</th>
                                        <td><?= $model->export_date ?></td>
                                    </tr>
                                    <tr>
                                        <th>VEHICLE LOCATION</th>
                                        <td><?= $model->vehicle_location ?></td>
                                    </tr>
                                    <tr>
                                        <th>EXPORTER ID</th>
                                        <td><?= $model->exporter_id ?></td>
                                    </tr>
                                    <tr>
                                        <th>EXPORTER TYPE ISSUER</th>
                                        <td><?= $model->exporter_type_issue ?></td>
                                    </tr>
                                    <tr>
                                        <th>TRANSPORTATION VALUE</th>
                                        <td><?= $model->transpotation_value ?></td>
                                    </tr>
                                    <tr>
                                        <th>EXPORTER DOB</th>
                                        <td><?= $model->exporter_dob ?></td>
                                    </tr>
                                    <tr>
                                        <th>ULTIMATE CONSIGNEE DOB</th>
                                        <td><?= $model->ultimate_consignee_dob ?></td>
                                    </tr>
                                    <tr>
                                        <th>CONSIGNEE</th>
                                        <?php $consignee = \common\models\Consignee::findOne($model->conignee_id) ?>
                                        <td><?= $consignee->consignee_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>NOTIFY PARTY</th>
                                        <?php $notify_party = \common\models\Consignee::findOne($model->notify_party) ?>
                                        <td><?= $notify_party->consignee_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>LABEL</th>
                                        <td><?php ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <h4>Customer Information</h4>
                                <table class="table table-bordered table-responsive">
                                    <?php
                                    $customer = common\models\Customers::findOne($model->customer);
                                    if (!empty($customer)) {
                                        ?>
                                        <tr>
                                            <th>CUSTOMER NAME</th>
                                            <td><?= $customer->name ?></td>
                                        </tr>
                                        <tr>
                                            <th>CUSTOMER ID</th>
                                            <td><?= $customer->customer_id ?></td>
                                        </tr>
                                        <tr>
                                            <th>COMPANY NAME</th>
                                            <td><?= $customer->company_name ?></td>
                                        </tr>
                                        <tr>
                                            <th>EMAIL</th>
                                            <td><?= $customer->email ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4>Export Vehicles</h4>
                                <?php
                                $vehicles = explode(',', $model->vehicle_id);
                                ?>
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>YEAR</th>
                                        <th>MAKE</th>
                                        <th>MODEL</th>
                                        <th>COLOR</th>
                                        <th>VIN</th>
                                        <th>STATUS</th>
                                        <th>TITLE NO</th>
                                        <th>TITLE STATE</th>
                                        <th>LOT NO</th>
                                    </tr>
                                    <?php
                                    foreach ($vehicles as $vehicle) {
                                        $vehicle_detail = \common\models\Vehicle::findOne($vehicle);
                                        $vehicle_title_info = common\models\VehicleTitleInfo::find()->where(['vehicle_id' => $vehicle_detail->id])->one();
                                        ?>
                                        <tr>
                                            <td><?= $vehicle_detail->year ?></td>
                                            <td><?= $vehicle_detail->make ?></td>
                                            <td><?= $vehicle_detail->model ?></td>
                                            <td><?= $vehicle_detail->color ?></td>
                                            <td><?= $vehicle_detail->vin ?></td>
                                            <td><?= $vehicle_detail->status_id ?></td>
                                            <td><?= $vehicle_title_info->title ?></td>
                                            <td><?php ?></td>
                                            <td><?= $vehicle_detail->lot_no ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4>Container Images Gallery</h4>
                                <?php
                                $path = Yii::getAlias('@paths') . '/export/container/' . $model->id;
                                if (count(glob("{$path}/*")) > 0) {
                                    $k = 0;
                                    foreach (glob("{$path}/*") as $file) {
                                        $k++;
                                        $arry = explode('/', $file);
                                        $img_nmee = end($arry);
                                        $img_nmees = explode('.', $img_nmee);
                                        if ($img_nmees['1'] != '') {
                                            ?>
                                            <div class = "col-md-3 img-box" id="<?= $k; ?>">
                                                <div class="news-img">
                                                    <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/export/container/' . $model->id . '/' . end($arry) ?>">
                                                </div> 
                                            </div>
                                            <?php
                                        }
                                        if ($k % 4 == 0) {
                                            ?>
                                            <div class="clearfix"></div>
                                            <?php
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

<script>
    $(document).on('click', '.modalButton', function () {

        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr("value"));

    });
</script>
<?= Yii::$app->controller->renderPartial('houston_cover_letter'); ?>


