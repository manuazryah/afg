<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
foreach ($customers as $customer) {
    $customer_vehicles = common\models\VehicleTowingInfo::find()->where(['customers_id' => $customer->id])->all();
    $location = common\models\Location::findOne($customer->state);
    $vehicle_count = 0;
    $vehicle_on_hand = array();
    $vehicle_on_way = array();
    foreach ($customer_vehicles as $customer_vehicle) {
        $vehicle_details = \common\models\Vehicle::findOne($customer_vehicle->vehicle_id);
        if ($vehicle_details->status_id == 1) {
            $vehicle_on_hand[] = $vehicle_details->id;
            $vehicle_count++;
        } else if ($vehicle_details->status_id == 2) {
            $vehicle_on_way[] = $vehicle_details->id;
            $vehicle_count++;
        }
    }

    if ($vehicle_count > 0) {
        for ($inv = 1; $inv <= 2; $inv++) {
            if ($inv == 1) {
                $count_vehicles = count($vehicle_on_hand);
                $vehicles = $vehicle_on_hand;
                $status = 'On Hand';
                $age_title = 'Age';
            } else {
                $count_vehicles = count($vehicle_on_way);
                $vehicles = $vehicle_on_way;
                $status = 'On The Way';
                $age_title = 'Age (SINCE TOW REQUEST)';
            }
            if ($count_vehicles > 0) {
                ?>
                <table class="" width="100%" style="font-size: 12px">
                    <tbody>
                        <tr><th colspan="6" style="text-transform: uppercase"><?= $customer->name ?></th></tr>
                        <tr><th>CUSTOMER : </th><th colspan="5" style="text-transform: uppercase"><?= $customer->name ?></th></tr>
                        <tr>
                            <th width="20%"><b>Customer Id:</b></th>
                            <th><b><?= $customer->customer_id ?></b></th>
                            <th width="12%" align="right"><b>Status:</b></th>
                            <th width="15%"><?= $status ?></th>
                            <th width="15%" align="center"><b>Location:</b></th>
                            <th width="15%"><?= $location->location ?></th>
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
                            <th>VIN</th>
                            <th>TITLE</th>
                            <th><?= $age_title ?></th>
                            <th>LOT NO</th>
                            <th>NOTE</th>
                        </tr>
                        <?php
                        foreach ($vehicles as $customer_vehicle) {
                            $vehicle_details = \common\models\Vehicle::findOne($customer_vehicle);
                            $vehicle_title_info = common\models\VehicleTitleInfo::find()->where(['vehicle_id' => $vehicle_details->id])->one();
                            $your_date = strtotime($vehicle_details->DOC);
                            if ($inv == 1)
                                $now = strtotime(date('Y-m-d'));
                            else
                                $now = strtotime($vehicle_title_info->towing_request_date);
                            $datediff = $now - $your_date;
                            ?>
                            <tr align="center">
                                <td><?= $vehicle_details->hat ?></td>
                                <td><?= date('Y-m-d', strtotime($vehicle_details->titleInfos->towing_request_date)) ?></td>
                                <td><?= $vehicle_details->year ?></td>
                                <td><?= $vehicle_details->make ?></td>
                                <td><?= $vehicle_details->model ?></td>
                                <td><?= $vehicle_details->color ?></td>
                                <td><?= $vehicle_details->vin ?></td>
                                <td><?php
                                    if ($vehicle_details->titleInfos->title == 1) {
                                        echo 'Yes';
                                    } else if ($vehicle_details->titleInfos->title == 2) {
                                        echo 'No';
                                    }
                                    ?>
                                </td>
                                <td><?= round($datediff / (60 * 60 * 24)); ?></td>
                                <td><?= $vehicle_details->lot_no ?></td>
                                <td><?= $vehicle_details->titleInfos->note ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

                <?php
            }
        }
        ?>
        <pagebreak />
        <?php
    }
}
?>
