<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="modal-header">
    <div class="col-md-6">
        <h4 class="modal-title">Reports</h4>
    </div>
    <div class="col-md-6">
        <?= Html::a('<i class="fa fa-file-pdf-o"></i> Open as Pdf', ['report-pdf', 'id' => $customer->id, 'status' => $status], ['class' => 'btn btn-block btn-social btn-bitbucket pdf-link', 'target' => '_blank', 'style' => 'width:40%;float:right']) ?>
    </div>
</div>

<div class="modal-body">
    <?php
    if (count($vehicle_id) > 0) {
        if (isset($status)) {
            if ($status == 1) {
                $the_status = 'On Hand';
            } else if ($status == 2) {
                $the_status = 'On the way';
            } else if ($status == 3) {
                $the_status = 'Shipped';
            } else if ($status == 4) {
                $the_status = 'Picked Up';
            } else if ($status == 5) {
                $the_status = 'Manifest';
            }
        }
        $location_name = '';
        if (isset($customer->state)) {
            $location = common\models\Location::findOne($customer->state);
            $location_name = $location->location;
        }
        ?>

        <table class="ia table table-striped table-bordered" width="100%" style="font-size: 12px">
            <tbody>
                <tr>
                    <th width="20%" align="center" id="pipi"><b>Inventory</b>
                    </th><th><b><?= $customer->name ?></b>
                    </th><th width="12%" align="right"><b>Sort Type:</b>
                    </th><th width="15%"><?= $the_status ?>
                    </th><th width="15%" align="center"><b>Location</b></th>
                    <th width="15%"><?= $location_name ?></th>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="ia table table-striped table-bordered" border="1" style="border:solid 1px;font-size: 12px">
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
                foreach ($vehicle_id as $vehicle) {
                    $vehicle_details = \common\models\Vehicle::findOne($vehicle);
                    $your_date = strtotime($vehicle_details->DOC);
                    $now = strtotime(date('Y-m-d'));
                    $datediff = $now - $your_date;
                    if ($vehicle_details->status_id == $status) {
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
                                ?></td>
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
                            <td><?= $vehicle_details->titleInfos->note ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo '<p>No result found</p>';
    }
    ?>
</div>

