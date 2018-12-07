<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>

<tr id='append_<?= $val ?>'>
    <td colspan='10'>
        <div class='col-md-12'>
            <table class='table table-condensed append-table' style="border: 1px solid #eee;">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Color</th>
                        <th>Vin</th>
                        <th>Lot Number</th>
                        <th>Company Name</th>
                        <th>View Vehicle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $vehicles = explode(',', $container->vehicle_id);
                    $company_detail = common\models\Customers::findOne($container->customer);
                    foreach ($vehicles as $vehicle) {
                        $vehicle_detail = common\models\Vehicle::findOne($vehicle);
                        ?>
                        <tr>
                            <td><?= $vehicle_detail->year ?></td>
                            <td><?= $vehicle_detail->make ?></td>
                            <td><?= $vehicle_detail->model ?></td>
                            <td><?= $vehicle_detail->color ?></td>
                            <td><?= $vehicle_detail->vin ?></td>
                            <td><?= $vehicle_detail->lot_no ?></td>
                            <td><?=Html::a($company_detail->name,['/masters/customers/view','id'=>$company_detail->id],['target'=>'_blank'])?></td>
                            <td><?=Html::a('View',['/masters/vehicle/view','id'=>$vehicle_detail->id],['target'=>'_blank'])?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </td>
</tr>