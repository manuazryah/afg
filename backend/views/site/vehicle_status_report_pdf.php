<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table class="ia table table-striped table-bordered" width="100%">
    <tbody>
        <tr>
            <th width="20%" align="center" id="pipi"><b>Inventory</b>
            </th><th><b>All</b>
            </th><th width="12%" align="right"><b>Sort Type:</b>
            </th><th width="15%">On hand
            </th><th width="15%" align="center">
                <b>Location
                    <b>
                    </b></b></th>
            <th width="15%">NY
            </th></tr>
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
            <th>NOTE</th>
        </tr>
        <?php
        foreach ($vehicles as $vehicle_details) {
            $your_date = strtotime($vehicle_details->DOC);
            $now = strtotime(date('Y-m-d'));
            $datediff = $now - $your_date;
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
                <td><?= round($datediff / (60 * 60 * 24)); ?></td>
                <td></td>
            </tr>
            <?php
        }
        ?>

    </tbody></table>

