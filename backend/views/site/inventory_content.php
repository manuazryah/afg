<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Reports</h4>
    <div>
        <?= Html::a('<i class="fa fa-file-pdf-o"></i> Open as Pdf', ['/site/inventory-report'], ['class' => 'btn btn-block btn-social btn-bitbucket pdf-link', 'target' => '_blank']) ?>
        <?= Html::a('<i class="fa fa-file-pdf-o"></i> Download as Excel', ['/site/inventory-export'], ['class' => 'btn btn-block btn-social btn-bitbucket excel-link', 'target' => '_blank']) ?>
    </div>
</div>
<div class="modal-body">

    <?php
    foreach ($customers as $customer) {
        $customer_vehicles = common\models\VehicleTowingInfo::find()->where(['customers_id' => $customer->id])->all();
        $vehicle_count = 0;
        foreach ($customer_vehicles as $customer_vehicle) {
            $vehicle_details = \common\models\Vehicle::findOne($customer_vehicle->vehicle_id);
            if ($vehicle_details->status_id == 1 || $vehicle_details->status_id == 2)
                $vehicle_count++;
        }
        if ($vehicle_count > 0) {
            ?>
            <table class="ia table table-striped table-bordered" width="100%">
                <tbody>
                    <tr>
                        <th width="20%" align="center" id="pipi"><b>Inventory</b>
                        </th><th><b><?= $customer->name ?></b>
                        </th><th width="12%" align="right"><b>Sort Type:</b>
                        </th><th width="15%">On hand
                        </th><th width="15%" align="center"><b>Location</b></th>
                        <th width="15%">NY</th>
                    </tr>
                </tbody>
            </table>
            <table width="100%" class="ia table table-striped table-bordered" border="1" style="border:solid 1px;">
                <tbody>
                    <tr>
                        <th>HAT NO</th>
                        <th>DATE RECEIVED</th>
                        <th>YEAR</th>
                        <th>MAKE</th>
                        <th>MODEL</th>
                        <th>COLOR</th>
                        <th>LOT NO</th>
                        <th>VIN</th>
                        <th>TITLE</th>
                        <th>AGE</th>
                        <th>STATUS</th>
                        <th>NOTE</th>
                    </tr>
                    <?php
                    foreach ($customer_vehicles as $customer_vehicle) {
                        $vehicle_details = \common\models\Vehicle::findOne($customer_vehicle->vehicle_id);
                        $your_date = strtotime($vehicle_details->DOC);
                        $now = strtotime(date('Y-m-d'));
                        $datediff = $now - $your_date;
                        if ($vehicle_details->status_id == 1 || $vehicle_details->status_id == 2) {
                            ?>
                            <tr align="center">
                                <td><?= $vehicle_details->hat ?></td>
                                <td><?= date('Y-m-d', strtotime($vehicle_details->titleInfos->towing_request_date)) ?></td>
                                <td><?= $vehicle_details->year ?></td>
                                <td><?= $vehicle_details->make ?></td>
                                <td><?= $vehicle_details->model ?></td>
                                <td><?= $vehicle_details->color ?></td>
                                <td><?= $vehicle_details->lot_no ?></td>
                                <td><?= $vehicle_details->vin ?></td>
                                <td><?php
                                    if ($vehicle_details->titleInfos->title == 1) {
                                        echo 'Yes';
                                    } else if ($vehicle_details->titleInfos->title == 2) {
                                        echo 'No';
                                    }
                                    ?>
                                </td>
                                <td><?= round($datediff / (60 * 60 * 24));?></td>
                                <td><?php
                                    if ($vehicle_details->status_id == 1) {
                                        echo 'ON HAND';
                                    } else if ($vehicle_details->status_id == 2) {
                                        echo 'ON THE WAY';
                                    } else if ($vehicle_details->status_id == 3) {
                                        echo 'SHIPPED';
                                    } else if ($vehicle_details->status_id == 4) {
                                        echo 'PICKED UP';
                                    }
                                    ?></td>
                                <td></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
    }
    ?>
</div>

