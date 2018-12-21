<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
?>
<div class="col-sm-3">
    <div class="card card-tiles card-outlined car-count">
        <div id="la_details_all" class="row">
            <div class="col-sm-8 prit0">
                <div class="card-body location_heading">LA</div>
            </div>
            <div class="col-sm-4 plft0">
                <div class="card-body car-count-value"><?= isset($la['total_count']) ? $la['total_count'] : '0' ?></div>
            </div>
        </div>
        <div class="card-body small-padding">
            <span class="text-default-dark">
                <table style="" class="table table-responsive table-condensed no-margin table-hover" id="la_details">
                    <tbody>
                        <tr><td>CARS ON WAY</td><td class="shipped_value"><?= Html::a($la['onway'], ['home', 'status' => 2, 'location' => 1]) ?></td></tr>
                        <!--<tr><td>CARS ON WAY</td><td class="shipped_value"><?= isset($la['onway']) ? $la['onway'] : '0' ?></td></tr>-->
                        <tr><td>SHIPPED</td><td class="shipped_value"><?= isset($la['shipped']) ? $la['shipped'] : '0' ?></td></tr>
                        <tr><td>ON HAND</td><td class="shipped_value"><?= isset($la['onhand']) ? $la['onhand'] : '0' ?></td></tr>
                        <tr><td>O/H WITH TITLE</td><td class="shipped_value"><?= isset($la['onhand_with_title']) ? $la['onhand_with_title'] : '0' ?></td></tr>
                    </tbody>
                </table>
            </span>
        </div>
    </div>
</div>


<div class="col-sm-3">
    <div class="card card-tiles card-outlined car-count">
        <div id="la_details_all" class="row">
            <div class="col-sm-8 prit0">
                <div class="card-body location_heading">GA</div>
            </div>
            <div class="col-sm-4 plft0">
                <div class="card-body car-count-value"><?= isset($ga['total_count']) ? $ga['total_count'] : '0' ?></div>
            </div>
        </div>
        <div class="card-body small-padding">
            <span class="text-default-dark">
                <table style="" class="table table-responsive table-condensed no-margin table-hover" id="la_details">
                    <tbody>
                        <tr><td>CARS ON WAY</td><td class="shipped_value"><?= isset($ga['onway']) ? $ga['onway'] : '0' ?></td></tr>
                        <tr><td>SHIPPED</td><td class="shipped_value"><?= isset($ga['shipped']) ? $ga['shipped'] : '0' ?></td></tr>
                        <tr><td>ON HAND</td><td class="shipped_value"><?= isset($ga['onhand']) ? $ga['onhand'] : '0' ?></td></tr>
                        <tr><td>O/H WITH TITLE</td><td class="shipped_value"><?= isset($ga['onhand_with_title']) ? $ga['onhand_with_title'] : '0' ?></td></tr>
                    </tbody>
                </table>
            </span>
        </div>
    </div>
</div>


<div class="col-sm-3">
    <div class="card card-tiles card-outlined car-count">
        <div id="la_details_all" class="row">
            <div class="col-sm-8 prit0">
                <div class="card-body location_heading">NY</div>
            </div>
            <div class="col-sm-4 plft0">
                <div class="card-body car-count-value"><?= isset($ny['total_count']) ? $ny['total_count'] : '0' ?></div>
            </div>
        </div>
        <div class="card-body small-padding">
            <span class="text-default-dark">
                <table style="" class="table table-responsive table-condensed no-margin table-hover" id="la_details">
                    <tbody>
                        <tr><td>CARS ON WAY</td><td class="shipped_value"><?= isset($ny['onway']) ? $ny['onway'] : '0' ?></td></tr>
                        <tr><td>SHIPPED</td><td class="shipped_value"><?= isset($ny['shipped']) ? $ny['shipped'] : '0' ?></td></tr>
                        <tr><td>ON HAND</td><td class="shipped_value"><?= isset($ny['onhand']) ? $ny['onhand'] : '0' ?></td></tr>
                        <tr><td>O/H WITH TITLE</td><td class="shipped_value"><?= isset($ny['onhand_with_title']) ? $ny['onhand_with_title'] : '0' ?></td></tr>
                    </tbody>
                </table>
            </span>
        </div>
    </div>
</div>

<div class="col-sm-3">
    <div class="card card-tiles card-outlined car-count">
        <div id="la_details_all" class="row">
            <div class="col-sm-8 prit0">
                <div class="card-body location_heading">TX</div>
            </div>
            <div class="col-sm-4 plft0">
                <div class="card-body car-count-value"><?= isset($tx['total_count']) ? $tx['total_count'] : '0' ?></div>
            </div>
        </div>
        <div class="card-body small-padding">
            <span class="text-default-dark">
                <table style="" class="table table-responsive table-condensed no-margin table-hover" id="la_details">
                    <tbody>
                        <tr><td>CARS ON WAY</td><td class="shipped_value"><?= isset($tx['onway']) ? $tx['onway'] : '0' ?></td></tr>
                        <tr><td>SHIPPED</td><td class="shipped_value"><?= isset($tx['shipped']) ? $tx['shipped'] : '0' ?></td></tr>
                        <tr><td>ON HAND</td><td class="shipped_value"><?= isset($tx['onhand']) ? $tx['onhand'] : '0' ?></td></tr>
                        <tr><td>O/H WITH TITLE</td><td class="shipped_value"><?= isset($tx['onhand_with_title']) ? $tx['onhand_with_title'] : '0' ?></td></tr>
                    </tbody>
                </table>
            </span>
        </div>
    </div>
</div>