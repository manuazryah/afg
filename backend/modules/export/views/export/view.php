<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Export */

$this->title = 'Export Details';
$this->params['breadcrumbs'][] = ['label' => 'Exports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
                                        <td><?php ?></td>
                                    </tr>
                                    <tr>
                                        <th>CONSIGNEE</th>
                                        <td><?= $model->conignee_id ?></td>
                                    </tr>
                                    <tr>
                                        <th>NOTIFY PARTY</th>
                                        <td><?= $model->notify_party ?></td>
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
                                    <tr>
                                        <th>CUSTOMER NAME</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>CUSTOMER ID</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>COMPANY NAME</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>EMAIL</th>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


