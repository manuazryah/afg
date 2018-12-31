<?php

use yii\helpers\Html;
?>
<table class="header-tbl">
    <tr>
        <td class="col1"><strong style="color:#3ec1d5;">AFG</strong> GLOBAL SHIPPER LLC</td>
        <td class="col2">A108 Adam Street NY 535022, USA Tel: +1 5589 55488 55</td>
        <td class="col3">Vehicle Condition Report</td>
    </tr>
</table>
<div class="main-contents">
    <div class="top-content">
        <div class="main-left">
            <table class="inner-tbl-left">
                <?php
                $customer_details = common\models\Customers::findOne($model->towingInfos->customers_id);
                ?>
                <tr>
                    <th>Customer</th>
                    <td colspan="3"><?= $customer_details->name ?>
                    </td>
                </tr>
                <tr>
                    <th>Address </th>
                    <td colspan="3"><?= $customer_details->address1 ?></td>
                </tr>
                <tr>
                    <th>Phone #</th>
                    <td><?= $customer_details->phone_usa ?></td>
                    <th>Weight</th>
                    <td><?= $model->weight ?></td>
                </tr>
                <tr>
                    <th>Lot #</th>
                    <td><?= $model->lot_no ?></td>
                    <th>Inv #</th>
                    <td>446</td>
                </tr>
                <tr>
                    <th>Destination</th>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <?php
                    $condition = '';
                    if (isset($model->towingInfos->condition) && $model->towingInfos->condition != '') {
                        $condition = $model->towingInfos->condition;
                    }
                    ?>
                    <th>Condition</th>
                    <td><?= $condition ?></td>
                    <th>Damaged</th>
                    <td><?= $model->towingInfos->damaged ?></td>
                </tr>
                <tr>
                    <th>Towed From</th>
                    <td colspan="3"><?= $model->towed_from ?></td>
                </tr>
            </table>
        </div>
        <div class="main-right">
            <table class="inner-tbl-right">
                <tr>
                    <th>Year</th>
                    <td colspan="2"><?= $model->year ?></td>
                    <th>Color</th>
                    <td colspan="2"><?= $model->color ?></td>
                </tr>
                <tr>
                    <th>Model</th>
                    <td colspan="2"><?= $model->model ?></td>
                    <th>Make</th>
                    <td colspan="2"><?= $model->make ?></td>
                </tr>
                <tr>
                    <th>VIN</th>
                    <td colspan="5"><?= $model->vin ?></td>
                </tr>
                <tr>
                    <th>License#</th>
                    <td colspan="5"></td>
                </tr>

                <tr>
                    <th>Towed Amount</th>
                    <td colspan="2"><?= $model->towed_amount ?></td>
                    <th>Storage Amount</th>
                    <td colspan="2"><?= $model->storage_amount ?></td>
                </tr>
                <tr>
                    <th>Towed</th>
                    <td><?= $model->towingInfos->towed ?></td>
                    <th>Title Provided</th>
                    <td>
                        <?php
                        if ($model->titleInfos->title == 1) {
                            echo 'Yes';
                        } else if ($model->titleInfos->title == 2) {
                            echo 'No';
                        }
                        ?></td>
                    <th>Pictures</th>
                    <td><?= $model->towingInfos->pictures ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="vehicle-condition">

        <table class="head">
            <tr>
                <td>CHECK OPTIONS INCLUDED IN VEHICLE</td>
            </tr>
        </table>

        <table class="specification">
            <tr>
                <th><input disabled="true" name="Keys" type="checkbox"  <?php if ($model->vehiceCheckOptions->keys == 1) { ?> checked="checked" <?php } ?>></th>
                <td>Keys</td>
                <th><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->cd_changer == 1) { ?> checked="checked" <?php } ?>></th>
                <td>CD Changer </td>
                <th><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->gps_navigation_system == 1) { ?> checked="checked" <?php } ?>></th>
                <td>GPS Navigation System</td>
                <th><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->spare_tire_jack == 1) { ?> checked="checked" <?php } ?>></th>
                <td>Spare Tire/Jack</td>
                <th><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->wheel_covers == 1) { ?> checked="checked" <?php } ?>></th>
                <td>Wheel Covers </td>
            </tr>
            <tr>
                <th><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->radio == 1) { ?> checked="checked" <?php } ?>></th>
                <td>Radio  </td>
                <th><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->cd_player == 1) { ?> checked="checked" <?php } ?>></th>
                <td>CD Player </td>
                <th><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->mirror == 1) { ?> checked="checked" <?php } ?>></th>
                <td>Mirror</td>
                <th><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->speaker == 1) { ?> checked="checked" <?php } ?>></th>
                <td>Speaker</td>
                <th><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->other == 1) { ?> checked="checked" <?php } ?>></th>
                <td>Other...</td>
            </tr>
        </table>

        <table class="head">
            <tr>
                <td>CONDITION OF VEHICLE</td>
            </tr>
        </table>
        <table class="sub-head">
            <tr>
                <td>Indicate any damage to the vehicle using the following legend.</td>
            </tr>
        </table>
        <table class="specification">
            <tr>
                <th>H</th>
                <td>Hairline Scratch</td>
                <th>PT</th>
                <td>Pitted </td>
                <th>T</th>
                <td>Torn</td>
                <th>B</th>
                <td>Bent</td>
            </tr>
            <tr>
                <th>GC</th>
                <td>Glass Cracked </td>
                <th>M</th>
                <td>Missing </td>
                <th>SM</th>
                <td>Smashed </td>
                <th>R</th>
                <td>Rusty</td>
            </tr>
            <tr>
                <th>CR</th>
                <td>Creased </td>
                <th>S</th>
                <td>Scratched  </td>
                <th>ST</th>
                <td>Stained </td>
                <th>BR</th>
                <td>Broken</td>
            </tr>
            <tr>
                <th>D</th>
                <td>Dented</td>
            </tr>
        </table>
    </div>
    <div class="vehicle-condition-report">
        <table class="tbl0">
            <tr>
                <td><img src="<?= Yii::$app->homeUrl; ?>img/vhehicle-front.jpg" width="100"></td>
                <td>
                    <table class="tbl1">
                        <tr>
                            <th>01</th>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th>02</th>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th>03</th>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th>04</th>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th>05</th>
                            <td colspan="2"></td>
                        </tr>
                    </table>
                </td>
                <td><img src="<?= Yii::$app->homeUrl; ?>img/vehicle-back.jpg" width="100"></td>
                <td>
                    <table class="tbl1">
                        <tr>
                            <th>06</th>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th >07</th>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th>08</th>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th>09</th>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th >10</th>
                            <td colspan="2"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="tbl01">
            <tr>
                <td>
                    <img src="<?= Yii::$app->homeUrl; ?>img/vehicle-driverside.jpg" width="300">
                    <table class="tbl4" >
                        <tr >
                            <th style="border-bottom:1px solid">11</th>
                            <td style="border-bottom:1px solid"></td>
                            <th>12</th>
                            <td style="border-bottom:1px solid"></td>
                            <th>13</th>
                            <td style="border-bottom:1px solid"></td>
                        </tr>
                        <tr>
                            <th>14</th>
                            <td></td>
                            <th>15</th>
                            <td ></td>
                            <th>16</th>
                            <td></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <img src="<?= Yii::$app->homeUrl; ?>img/vehicle-passengerside.jpg" width="300">
                    <table class="tbl4">
                        <tr>
                            <th>17</th>
                            <td style="border-bottom:1px solid"></td>
                            <th>18</th>
                            <td style="border-bottom:1px solid"></td>
                            <th>19</th>
                            <td style="border-bottom:1px solid"></td>
                        </tr>
                        <tr>
                            <th>20</th>
                            <td></td>
                            <th>21</th>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="tbl02" style="font-size: 12px">
            <tr>
                <td>
                    <ol>
                        <li>Liability-Shipper (customer) must have door-to-door insurance while goods are in warehouse and during transit. Ariana
                            Worldwide will not assume any responsibility for uninsured or underinsured shipment(s)..</li>
                        <li>Rates for individual cars are based on consolidation; company is not responsible for exact shipping dates. Company is
                            not responsible for delays in shipping schedules and/or transit time or custom charges and delays..</li>
                    </ol>
                </td>
            </tr>
        </table>
        <table class="tbl03" style="font-size: 12px">
            <tr>
                <td>
                    <p ><strong>DIMENSIONS: </strong>The above is an accurate representation of the condition of the vehicle at the time of loading. NOTICE: The
                        OWNER'S or AUTHORIZED AGENT'S Signature of the origin is also to the following RELEASE: this will authorize CARRIER to
                        drive my vehicle either at origin destination between point (s) of loading/unloading and the point(s) of pick-up/delivery.</p>
                    <p><strong>This above Vehicle has been deliverd in the condition described.</strong></p>
                </td>
            </tr>
        </table>
        <table class="tbl04" style="font-size: 12px">
            <tr>
                <th>Completed By </th>
                <td>SYED MAHMOOD AND IBRAHIM USED CARS & SPARE PARTS </td>
                <th>Date</th>
                <td>2018-12-04</td>
            </tr>
        </table>
    </div>

    <div class="row">
        <div class="pics">
            <?php
            $path = Yii::getAlias('@paths') . '/vehicle/' . $model->id;
            if (count(glob("{$path}/*")) > 0) {
                $k = 0;
                foreach (glob("{$path}/*") as $file) {
                    $k++;
                    $arry = explode('/', $file);
                    $img_nmee = end($arry);
                    $img_nmees = explode('.', $img_nmee);
                    if ($img_nmees['1'] != '') {
                        ?>
                        <img width="230px" height="230px" src="<?= Yii::$app->homeUrl . '../uploads/vehicle/' . $model->id . '/' . end($arry) ?>" style="margin-left: 20px;">
                        <?php
                    }
                    if ($k % 4 == 0) {
                        ?>

                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</div>