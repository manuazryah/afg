<?php

use yii\helpers\Html;
?>
<div id="modalContentreport">
    <button type="button" id="btnPrintThisdock" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
    <?= Html::a('<i class="fa fa-file-pdf-o "></i> Open as Pdf', ['vehicle-condition-reportpdf', 'id' => $model->id], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
    <?= Html::a('<i class="fa fa-message "></i> Email', ['#'], ['class' => 'btn btn-primary send-email','id' => $model->id]) ?>
    <div id="conditionreport" class="condition_reports display-msg">
        <div class="cond_here">
            <div class="row">
                <div class="col-md-12">
                    <div class="cond_logo lefti" style="float: left;margin-top: 10px;margin-bottom: 10px;">
                        <span class="logo-lg" style="color:#3ec1d5;font-size: 15px"><b>AFG</b><span> GLOBAL SHIPPER LLC</span></span>
                    </div>

                    <div class="lefti title" style="float: left;font-size: 20px;font-weight: bold;margin-top: 10px;margin-bottom: 10px;margin-left: 49px;">Vehicle Condition Report</div>
                </div>
            </div>
            <div class="basic_info">
                <div class="row">
                    <div class="col-md-6">
                        <div class="part1">
                            <?php
                            $customer_details = common\models\Customers::findOne($model->towingInfos->customers_id);
                            ?>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="18%" style="font-size: 1em;"><b>Customer</b></td>
                                        <td width="82%" class="line_under" id="CUSTOMER NAME" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $customer_details->name ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="18%" style="font-size: 1em;"><b>Address</b></td>
                                        <td width="72%" class="line_under" id="Address L1" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $customer_details->address1 ?></td>

                                    </tr>
                                </tbody></table>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="18%" style="font-size: 1em;"><b>Phone #</b></td>
                                        <td width="44%" class="line_under" id="Phone Number" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $customer_details->phone_usa ?></td>
                                        <td width="14%" style="font-size: 1em;"><b>Weight</b></td>
                                        <td width="24%" class="line_under" id="Weight" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->weight ?></td>  
                                    </tr>
                                </tbody></table>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="18%" style="font-size: 1em;"><b>Lot #</b></td>
                                        <td width="44%" class="line_under" id="Lot Number" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->lot_no ?></td>
                                        <td width="14%" style="font-size: 1em;"><b>Inv #</b></td>
                                        <td width="24%" class="line_under" id="Hat Number" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"></td>  
                                    </tr>
                                </tbody></table>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="18%" style="font-size: 1em;"><b>Destination</b></td>
                                        <td width="82%" class="line_under" id="Destination" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"></td>
                                    </tr>
                                </tbody></table>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody>
                                    <tr>
                                        <?php
                                        $condition = '';
                                        if (isset($model->towingInfos->condition) && $model->towingInfos->condition != '') {
                                            $condition = $model->towingInfos->condition;
                                        }
                                        ?>
                                        <td width="6%" style="font-size: 1em;"><b>Condition</b></td>
                                        <td width="24%" class="line_under" id="Condition" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $condition ?></td>
                                        <td width="6%" style="font-size: 1em;"><b>Damaged</b></td>
                                        <td width="24%" class="line_under" id="Damages" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->towingInfos->damaged ?></td>  
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="part2">
                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="18%" style="font-size: 1em;"><b>Year</b></td>
                                        <td width="38%" class="line_under" id="Year" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->year ?></td>
                                        <td width="11%" style="font-size: 1em;"><b>Color</b></td>
                                        <td width="33%" class="line_under" id="Color" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->color ?></td>  
                                    </tr>
                                </tbody></table>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="18%" style="font-size: 1em;"><b>Model</b></td>
                                        <td width="38%" class="line_under" id="Model" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->model ?></td>
                                        <td width="11%" style="font-size: 1em;"><b>Make</b></td>
                                        <td width="33%" class="line_under" id="Make" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->make ?></td>  
                                    </tr>
                                </tbody></table>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="18%" style="font-size: 1em;"><b>VIN</b></td>
                                        <td width="82%" class="line_under" id="VIN" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->vin ?></td>
                                    </tr>
                                </tbody></table>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="18%" style="font-size: 1em;"><b>License#</b></td>
                                        <td width="82%" class="line_under" id="License Number" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"></td>
                                    </tr>
                                </tbody></table>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="30%" style="font-size: 1em;"><b>Towed From</b></td>
                                        <td width="70%" class="line_under" id="Towed From" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->towed_from ?></td>
                                    </tr>
                                </tbody></table>

                            <table width="100%" style="margin-bottom:4px">
                                <tbody><tr>
                                        <td width="30%" style="font-size: 1em;"><b>Tow Amount</b></td>
                                        <td width="31%" class="line_under" id="Tow Amount" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->towed_amount ?></td>
                                        <td width="20%" style="font-size: 1em;"><b>Storage Amount</b></td>
                                        <td width="14%" class="line_under" id="Storage" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->storage_amount ?></td>  
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <table width="100%" style="margin-bottom:4px">
                            <tbody><tr>
                                    <td width="6%" style="font-size: 1em;"><b>Towed </b></td><td width="12%" class="line_under" id="Damages" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->towingInfos->towed ?></td>  
                                    <td width="21%" style="font-size: 1em;"><b>Title Provided</b></td><td width="11%" class="line_under" id="Damages" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?php
                                        if ($model->titleInfos->title == 1) {
                                            echo 'Yes';
                                        } else if ($model->titleInfos->title == 2) {
                                            echo 'No';
                                        }
                                        ?></td>  
                                    <td width="6%" style="font-size: 1em;"><b>Pictures</b></td><td width="24%" class="line_under" id="Damages" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><?= $model->towingInfos->pictures ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="checklist" style="width: 99%;float: left;margin-top: 15px;border: 1px solid #000;margin-left: 3px;">
                    <table width="100%" style="margin-bottom:4px">
                        <thead>
                            <tr>
                                <th class="biga">CHECK OPTIONS INCLUDED IN VEHICLE</th>
                            </tr>
                        </thead>
                    </table>

                    <table width="100%" style="margin-bottom:4px">
                        <tbody>
                            <tr>
                                <td><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->keys == 1) { ?> checked <?php } ?>>Keys</td>
                                <td><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->cd_changer == 1) { ?> checked <?php } ?>>CD Changer</td>
                                <td><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->gps_navigation_system == 1) { ?> checked <?php } ?>>GPS Navigation System</td>
                                <td><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->spare_tire_jack == 1) { ?> checked <?php } ?>>Spare Tire/Jack</td>
                                <td><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->wheel_covers == 1) { ?> checked <?php } ?>>Wheel Covers</td>
                                <td><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->radio == 1) { ?> checked <?php } ?>>Radio</td>
                            </tr>
                            <tr>
                                <td><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->cd_player == 1) { ?> checked <?php } ?>>CD Player</td>
                                <td><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->mirror == 1) { ?> checked <?php } ?>>Mirror</td>
                                <td><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->speaker == 1) { ?> checked <?php } ?>>Speaker</td>
                                <td><input disabled="true" name="Keys" type="checkbox" <?php if ($model->vehiceCheckOptions->other == 1) { ?> checked <?php } ?>>Other...</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="condition" style="width: 99%;float: left;margin-top: 15px;border: 1px solid #000;margin-left: 3px;">
                    <table width="100%">
                        <thead>
                            <tr>
                                <th class="biga">CONDITION OF VEHICLE</th>
                            </tr>
                            <tr>
                                <th class="biga1">Indicate any damage to the vehicle in the space provided using your own words or the following legend. If None write None</th>
                            </tr>
                        </thead>
                    </table>

                    <table id="Sik" width="100%">
                        <tbody>
                            <tr>
                                <td>H - Hairline Scratch</td>
                                <td>PT - Pitted</td>
                                <td>T - Torn</td>
                                <td>B - Bent</td>
                                <td>GC - Glass Cracked</td>
                                <td>M - Missing</td>
                            </tr>
                            <tr>
                                <td>SM - Smashed</td>
                                <td>R - Rusty</td>
                                <td>CR - Creased</td>
                                <td>S - Scratched</td>
                                <td>ST - Stained</td>
                                <td>BR - Broken</td>
                                <td>D - Dented</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="clear:both"></div>
                <div class="row">
                    <div class="col-md-6" style="margin-top: 20px">
                        <div class="picas1" style="width: 100%;height: 140px;margin-bottom: 10px;border: 1px solid #000;">
                            <span class="lefti" style="width: 39%;float: left"><img src="<?= Yii::$app->homeUrl; ?>img/vhehicle-front.jpg" style="height: 120px;margin-left: 2px;margin-top: 2px;"></span>										
                            <span class="lefti" id="piss" style="width: 60%;border-left-width: 1px;border-left-style: solid;border-left-color: #000;height: 125px;float: left;">
                                <div class="line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"> <table><tbody><tr><td>1. </td><td align="center" id="1"> DG</td></tr></tbody></table></div>
                                <div class="line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"> <table><tbody><tr><td>2</td><td align="center" id="2">DG</td></tr></tbody></table></div>
                                <div class="line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"> <table><tbody><tr><td>3</td><td align="center" id="3">DG</td></tr></tbody></table></div>
                                <div class="line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"> <table><tbody><tr><td>4</td><td align="center" id="4">DG</td></tr></tbody></table></div>
                                <div class="line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"> <table><tbody><tr><td>5</td><td align="center" id="5">DG</td></tr></tbody></table></div>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-top: 20px">
                        <div class="picas2" style="width: 100%;height: 140px;margin-bottom: 10px;border: 1px solid #000;">
                            <span class="lefti" style="width: 39%;float: left"><img src="<?= Yii::$app->homeUrl; ?>img/vehicle-back.jpg" style="height: 120px;margin-left: 2px;margin-top: 2px;"></span>										
                            <span class="lefti" id="piss2" style="width: 60%;border-left-width: 1px;border-left-style: solid;border-left-color: #000;height: 125px;float: left;">
                                <div class="line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"><table><tbody><tr>
                                                <td>6</td><td align="center" id="6"></td></tr></tbody></table></div>
                                <div class="line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"> <table><tbody><tr>
                                                <td>7</td><td align="center" id="7">S</td></tr></tbody></table></div>
                                <div class="line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"> <table><tbody><tr>
                                                <td>8</td><td align="center" id="8">S</td></tr></tbody></table></div>
                                <div class="line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"> <table><tbody><tr>
                                                <td>9</td><td align="center" id="9">S</td></tr></tbody></table></div>
                                <div class="line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;"> <table><tbody><tr><td>10</td><td align="center" id="10">S</td></tr></tbody></table></div>
                            </span>
                        </div>
                    </div>
                </div>

                <div style="clear:both"></div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="picas3" style="border: 1px solid #000;border-left-width: 1px;border-right-style: solid;border-bottom-style: solid;border-left-style: solid;border-left-color: #000;">
                            <div class="">
                                <img src="<?= Yii::$app->homeUrl; ?>img/vehicle-driverside.jpg" width="384" height="141" style="margin-left: 2px;margin-top: 2px;margin-bottom: 2px;"></div>
                            <div id="yoba" style="border-top-width: 1px;border-top-style: solid;border-top-color: #000;float: left;width: 100%;"> 
                                <table width="100%" style="border: 1px solid #000">
                                    <tbody><tr>
                                            <td width="6%">11</td><td class="line_right" align="center" width="28%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                            <td width="6%">12</td><td class="line_right" align="center" width="27%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                            <td width="6%">13</td><td align="center" width="27%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                        </tr>
                                    </tbody></table>
                            </div>
                            <div id="yoba" style="border-top-width: 1px;border-top-style: solid;border-top-color: #000;float: left;width: 100%;">
                                <table width="100%" style="border: 1px solid #000">
                                    <tbody><tr>
                                            <td width="6%">14</td><td align="center" class="line_right" width="28%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                            <td width="6%">15</td><td align="center" class="line_right" width="27%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                            <td width="6%">16</td><td align="center" width="27%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="picas3" style="border: 1px solid #000;border-left-width: 1px;border-right-style: solid;border-bottom-style: solid;border-left-style: solid;border-left-color: #000;">
                            <div class="">
                                <img src="<?= Yii::$app->homeUrl; ?>img/vehicle-passengerside.jpg" width="384" height="141" style="margin-left: 2px;margin-top: 2px;margin-bottom: 2px;"></div>
                            <div id="yoba" style="border-top-width: 1px;border-top-style: solid;border-top-color: #000;border-top-color: #000;width: 100%;"> 
                                <table width="100%">
                                    <tbody><tr>
                                            <td width="6%">17</td><td align="center" class="line_right" width="28%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                            <td width="6%">18</td><td align="center" class="line_right" width="27%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                            <td width="6%">19</td><td align="center" width="27%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                        </tr>
                                    </tbody></table>
                            </div>

                            <div id="yoba" style="border-top-width: 1px;border-top-style: solid;border-top-color: #000;float: left;width: 100%;">
                                <table width="100%" style="border: 1px solid #000">
                                    <tbody><tr>
                                            <td width="6%">20</td><td align="center" class="line_right" width="28%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                            <td width="6%">21</td><td align="center" class="line_right" width="27%" style="border-right-width: 1px;border-right-style: solid;border-right-color: #000;"></td>
                                        </tr>
                                    </tbody></table>
                            </div>

                        </div>
                    </div>
                </div>
                <div style="clear:both"></div>

                <div class="papugay" style="width: 99%;float: left;margin-top: 10px;border: 1px solid #000;margin-left: 3px;">
                    <table width="100%">
                        <tbody><tr><td><b>1.</b> Liability-Shipper (customer) must have door-to-door insurance while goods are in warehouse and during transit. Ariana Worldwide will not
                                    assume any responsibility for uninsured or underinsured shipment(s).</td></tr>

                            <tr><td><b>2.</b> Rates for individual cars are based on consolidation; company is not responsible for exact shipping dates. Company is not responsible for delays
                                    in shipping schedules and/or transit time or custom charges and delays..</td></tr>
                        </tbody></table>

                </div>

                <div class="dimen" style="width: 99%;margin-left: 3px;border-right-width: 1px;border-bottom-width: 1px;border-left-width: 1px;border-right-style: solid;border-bottom-style: solid;border-left-style: solid;"><table width="100%">
                        <tbody><tr>
                                <td>
                                    <b>DIMENSIONS: </b>
                                    The above is an accurate representation of the condition of the vehicle at the time of loading. NOTICE: The OWNER'S or AUTHORIZED AGENT'S
                                    Signature of the origin is also to the following RELEASE: this will authorize CARRIER to drive my vehicle either at origin destination between point
                                    (s) of loading/unloading and the point(s) of pick-up/delivery.
                                </td>
                            </tr>
                        </tbody></table>

                </div>

                <div class="sign" style="width: 99%;margin-left: 3px;margin-top: 30px;">
                    <table width="100%">
                        <tbody><tr>
                                <td>
                                    This above Vehicle has been delivered in the condition described.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="sign" style="width: 99%;margin-left: 3px;margin-top: 30px;">
                    <table style="margin-bottom: 2px;">
                        <tbody><tr>
                                <td class="leni line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;width: 350px;float: left;margin-right: 15px;">&nbsp;
                                </td>
                                <td class="leni1 line_under" style="font-size: 1em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #000;width: 140px;margin-left: 15px; ">
                                </td>
                            </tr>
                            <tr><td align="center" class="leni ">
                                    <b>Completed By</b>
                                </td>
                                <td align="center" class="leni1 ">
                                    <b>Date</b>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>


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
</div>

<script>
    $("#btnPrintThisdock").click(function () {
        $("#conditionreport").printThis({"debug": false, "importCSS": true, "importStyle": false, "loadCSS": '<?= Yii::$app->homeUrl ?>/css/print.css', "scale": 90, "pageTitle": "", "removeInline": false, "printDelay": 200, "header": null, "formValues": true});
    });
</script>


<script>
    $(document).ready(function(){
        $('.send-email').click(function(e){
            e.preventDefault();
            var id=$(this).attr('id');
            $.ajax({
                type: 'POST',
                cache: false,
                data: {id: id},
                url: '<?= Yii::$app->homeUrl ?>masters/vehicle/send-email',
                success: function (data) {
                 $("<p class='contact-sucess-msg msg1'>Your mail has been successfully send. <button type='button' class='close ome-enquiry-close' data-dismiss='alert' aria-hidden='true'>×</button></p>").insertBefore($(".display-msg"));
                }
            });
        })
    });
    </script>