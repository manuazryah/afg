<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="modalContentreport">
    <div id="btncover" class="condition_reports menifest_modal_print" contenteditable="true">
        <div class="cond_here">

            <div class="manifesta">


                <table class="table table-bordered ui-widget-header" width="100%" contenteditable="false">
                    <tbody><tr>
                            <td width="70%" rowspan="2" id="lli">AFG</td>
                            <td width="12%">Manifest #:</td><td width="18%"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <!--<img class="barcodeimge" src="http://manage.awwshipping.com/vehicle/bar?text=N1111618ALQAMAR171">-->
                            </td>
                        </tr>
                        <tr><td>ETA:</td><td></td></tr>
                    </tbody></table>

                <table class="table table-bordered" width="100%">
                    <tbody><tr>
                            <td width="50%" style="border: 1px solid #000;background-color: #d9fbfa;">
                                <table id="shipi" class="lefti" width="100%" style="float:left;">
                                    <thead><tr class="ui-widget-header"><td><b>Shipper</b></td></tr></thead>
                                </table>
                            </td>
                            <td width="50%" style="border: 1px solid #000;background-color: #d9fbfa;">
                                <table id="shipi" class="table lefti" width="100%" style="float:left;">
                                    <thead><tr class="ui-widget-header"><td><b>Notify / Consignee</b></td></tr></thead>
                                </table>
                            </td>

                        </tr>
                    </tbody></table>

                <div class="row" width="100%">
                    <div class="col-md-6" width="50%">
                        <table class="table table-bordered" id="olpa">
                            <tbody>
                                <?php
                                if ($model->customer) {
                                    $customer = common\models\Customers::findOne($model->customer);
                                }
                                ?>
                                <tr><td><?= !empty($customer) ? $customer->company_name : '' ?>, <?= !empty($customer) ? $customer->address1 : '' ?> </td></tr>
                                <tr><td><?= !empty($customer) ? $customer->state : '' ?></td></tr>
                                <tr><td><?= !empty($customer) ? $customer->city : '' ?>&nbsp;<?= !empty($customer) ? $customer->zipcode : '' ?></td></tr>
                                <tr><td> <?= !empty($customer) ? $customer->phone_usa : '' ?>	</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-5" width="50%">
                        
                        <table class="table table-bordered ">
                            <tbody>
                                <tr><td colspan="4">AFG<br>1205 CENTURION STAR TOWER, DEIRA</td>
                                </tr>
                                <tr>
                                    <td colspan="4">PHONE :<span class="inputtext">TEL: +971508073548, FAX: +97142249718</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <table class="table table-bordered line_under" width="100%">
                    <tbody><tr class="ui-widget-header"><th>Description</th></tr>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody></table>

                <table class="table table-bordered" width="100%">
                    <tbody><tr>
                            <td class="ui-state-active" width="17%"><b>Vessel/Voyage:</b></td><td width="28%"><?= $model->vessel ?>&nbsp;/&nbsp;<?= $model->voyage ?></td>
                            <td width="16%"></td>
                            <td width="21%">
                            </td>
                            <td align="center" width="18%" class="ui-state-active"><b>Weight</b></td>
                        </tr>
                        <tr>
                            <td class="ui-state-active">
                                <b>Cut Off:</b>
                            </td>
                            <td><?= $model->cut_off ?></td><td>&nbsp;</td>
                            <td></td><td align="center" class="line_under">9400</td>
                        </tr>
                        <tr>
                            <td class="ui-state-active"><b>Booking#:</b></td>
                            <td><?= $model->booking_no ?></td><td>&nbsp;</td>
                            <td>
                            </td>
                            <td align="center" class="ui-state-active"><b>Pieces</b></td></tr>
                        <tr><td class="ui-state-active"><b>File Ref#:</b></td><td><?= $model->ar_no ?></td><td></td><td></td><td align="center" class="line_under">4</td></tr>
                        <tr><td class="ui-state-active"><b>Container#:</b></td><td><?= $model->container_no ?></td><td>&nbsp;</td><td></td><td></td></tr>
                        <tr><td class="ui-state-active"><b>Seal#:</b></td><td><?= $model->seal_no ?></td><td>&nbsp;</td><td></td><td></td></tr>
                        <tr><td class="ui-state-active"><b>Export Terminal:</b></td><td><?= $model->terminal ?></td>
                            <td class="ui-state-active"><b>Export Date:</b></td><td><?= $model->export_date ?></td><td></td></tr>
                    </tbody></table>

                <table width="100%" class="table table-bordered">
                    <thead>
                        <tr class="ui-state-active">
                            <th width="6%">Year</th>
                            <th width="15%">Make</th>
                            <th width="16%">Model</th>
                            <th width="18%">VIN</th>
                            <th width="9%">Hat #</th>
                            <th width="6%">Towing</th>
                            <th width="7%">Storage</th>
                            <th width="9%">Add. Ch.</th>
                            <th width="8%">Title Fee</th>
                            <th width="8%">A. Storage</th>
                            <th width="6%">Keys</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $vehicles = explode(',', $model->vehicle_id);
                        $towing = 0;
                        $storage = 0;
                        $add_chgs = 0;
                        $title_amount = 0;
                        foreach ($vehicles as $vehicle) {
                            $towing = $towing + $vehicle_detail->towed_amount;
                            $storage = $storage + $vehicle_detail->storage_amount;
                            $add_chgs = $add_chgs + $vehicle_detail->add_chgs;
                            $title_amount = $title_amount + $vehicle_detail->title_amount;
                            $vehicle_detail = common\models\Vehicle::findOne($vehicle);
                            ?>
                            <tr>
                                <td align="center"><?= $vehicle_detail->year ?></td>
                                <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->make ?></td>
                                <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->model ?></td>
                                <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->vin ?></td>
                                <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->hat ?></td>
                                <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->towed_amount ?></td>
                                <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->storage_amount ?></td>
                                <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->add_chgs ?></td>
                                <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->title_amount ?></td>
                                <td align="center" style="border-left: 1px solid black;">
                                    0
                                </td>
                                <?php $vehicle_check = common\models\VehiceCheckOptions::find()->where(['vehicle_id' => $model->vehicle_id])->one(); ?>
                                <td align="center" style="border-left: 1px solid black;"><?= ($vehicle_check->keys == 1) ? 'Yes' : 'No' ?></td>
                            </tr>
                        <?php } ?>


                        <tr><td class="ui-state-highlight" align="right" colspan="5"><b>Total:</b></td>
                            <td align="center" class="ui-state-active" width="6%"><?= $towing ?></td>
                            <td class="ui-state-active" align="center" width="7%"><?= $storage ?></td>
                            <td class="ui-state-active" align="center" width="9%"><?= $add_chgs ?></td>
                            <td width="8%" class="ui-state-active" align="center"><?= $title_amount ?></td>
                            <td width="8%" class="ui-state-active" align="center">0</td>
                            <td width="6%"></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                VEHICLES ARE BRACED AND BLOCKED.FUEL TANKS HAVE BEEN SECURELY CLOSED.THE KEYS ARE NOT IN THE IGNITION.BATERIES ARE SECURED AND FASTENED IN THE UPRIGHT POSITION AND PROTECTED AGAINST SHORT CIRCUITS. THE FUEL TANKS ARE EMPTY AND THE ENGINE STOPPED DUE TO LACK OF FUEL.THE VEHICLES HAVE BEEN LOADED INTO THE CONTAINER IN RANCHO DOMINGUEZ, CALIFORNIA.
                            </td><td>
                            </td></tr>
                    </tbody>
                </table>
                <hr class="line_under">
                <table class="table table-bordered" width="100%">
                    <tbody>
                        <tr><td width="23%">Received in Good Order</td><td width="34%" class="line_under"></td><td width="10%">Date/Time</td><td width="33%" class="line_under"></td></tr>
                        <tr><td>Drivers Signature</td><td class="line_under"></td><td>Date/Time</td><td class="line_under"></td></tr>
                        <tr><td>Shippers Signature</td><td class="line_under"></td><td>Date/Time</td><td class="line_under"></td></tr>
                        <tr>
                            <td colspan="4">
                                <span style="display:block;margin-top:8px;">            
                                    The liability of Ariana Worldwide, for any reason shall in no case exceed $0.50 cent per hundred pounds or $500.00 per shipment whichever is less.
                                    Ariana Worldwide will not be liable for consequential or incidental damages or loss of profits. Net 15 days, with a monthly finance charge of 1.5% on all balances over thirty days.
                                    Ariana Worldwide reserves the right to hold or lien cargo for nonpayment Payment is required within (15) days of presentation.
                                    Failure to pay billed charges may result in lien on future shipment, including cost of storage and appropriate security for the subsequent shipment(s) held pursuant to California Civil Code, Section 3051.5
                                </span>
                                <span style="display:block;margin-top:8px;">Ariana Worldwide is a freight forwarding company, and we are not liable for any charges if your container is stopped by the US Customs for random, routine procedural checks.
                                </span><span style="display:block;margin-top:8px;">
                                    On our end, we will always make sure to have all the necessary paperwork attached when we ship your container and take the correct steps to meet all requirements.  However, due to US Customs policy, they can always stop a container for random inspections.  Although we will try our best to help you with anything we can, we are not responsible for this stop or any fees related to it because they are a completely separate entity from us.  You will be liable to US Customs and all charges pertaining to this stop will be covered by you and paid directly to them.
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    
</div>

