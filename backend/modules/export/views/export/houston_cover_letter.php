<?php

use yii\helpers\Html;
?>
<div id="modalContentreport">
    <button type="button" id="btnPrintThiscover" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>

    <div id="btncover" class="">
        <div class="cond_here" contenteditable="true">
            <div class="toppper">
                <table width="100%">
                    <tbody><tr><th width="15%" rowspan="2"><img src="http://manage.awwshipping.com/uploads/department-of-homeland-security-logo.jpg" width="80" height="80"></th>
                            <td width="85%" align="left">
                                <span style="font-size:18px;"><strong>U.S. CUSTOMS &amp; BORDER PROTECTION</strong></span>
                                <br>
                                <span style="font-size:18px;"><strong>VEHICLE EXPORT COVER SHEET</strong></span>
                            </td>
                        </tr><tr>
                            <td align="left" style="padding-left:4px; border:1px solid black;">PORT OF EXPORT : <span style="font-family:Arial, Helvetica, sans-serif;"><?= $model->port_of_loading ?></span></td>
                        </tr>

                    </tbody></table>
            </div>
            <div class="lefti pika" style="line-height:20px;">

                <table width="100%">

                </table>
                <?php if ($model->vehicle_id) { ?>
                    <table width="100%" class="inner">
                        <thead>
                            <tr><th colspan="7" class="spec1"><strong>DESCRIPTION OF VEHICLE/EQUIPMENT</strong></th></tr>
                            <tr class="car_list_heading"><th width="5%">YEAR</th><th width="15%">MAKE</th><th width="15%">MODEL</th><th width="25%">VIN</th><th width="25%">TITLE NUMBER</th><th width="20%">STATE</th><th width="10%">VALUE</th></tr>
                        </thead>
                        <tbody>
                            <?php
                            $vehicles = explode(',', $model->vehicle_id);
                            foreach ($vehicles as $vehicle) {
                                $vehicle_detail = common\models\Vehicle::findOne($vehicle);
                                ?>
                                <tr class="car_list">
                                    <td align="center"><?= $vehicle_detail->year ?></td>
                                    <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->make ?></td>
                                    <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->model ?></td>
                                    <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->vin ?></td>
                                    <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->title_amount ?></td>
                                    <td align="center" style="border-left: 1px solid black;">RI</td>
                                    <td align="center" style="border-left: 1px solid black;"><?= $vehicle_detail->value ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } ?>

            </div>




            <div class="informations" style="line-height:12px;">

                <table width="100%" class="inner">
                    <tbody><tr><th colspan="2">TRANSPORTATION INFORMATION</th></tr>
                        <tr>
                            <td width="50%">ITN : <span class="inputtext"></span></td>
                            <td width="50%">VALUE : <span class="inputtext"></span></td>
                        </tr>
                        <tr>
                            <td width="50%">CARRIER : <span class="inputtext"><?= $model->stremship_line ?></span></td>
                            <td width="50%">VESSEL : <span class="inputtext"><?= $model->vessel ?></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="100%">BoL/AWB/BOOKING # : <span class="inputtext"><?= $model->bl_or_awb_number ?></span></td>
                        </tr>
                        <tr>
                            <td width="50%">EXPORT DATE : <span class="inputtext"><?= $model->export_date ?></span></td>
                            <td width="50%">PORT OF UNLADING : </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="100%">ULTIMATE DESTINATION : <span class="inputtext"><?= $model->port_of_discharge ?></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="100%">VEHICLE LOCATION : <span class="inputtext"></span></td>
                        </tr>

                    </tbody></table>
                <br>
                <table width="100%" class="inner">
                    <tbody><tr><th colspan="4">SHIPPER/EXPORTER</th></tr>
                        <?php
                        if ($model->customer) {
                            $custmer = \common\models\Customers::findOne($model->customer);
                        }
                        ?>
                        <tr>
                            <td colspan="3" width="60%">NAME : <span class="inputtext"><?= !empty($custmer) ? $custmer->name : '' ?></span></td>
                            <td width="40%">DOB :  </td>
                        </tr>
                        <tr>
                            <td colspan="4" width="100%">ADDRESS: <span class="inputtext"><?= $model->cust_address ?></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="35%">CITY : <span class="inputtext"><?= !empty($custmer) ? $custmer->city : '' ?></span></td>
                            <td width="30%">STATE : <span class="inputtext"><?= !empty($custmer) ? $custmer->state : '' ?></span></td>
                            <td width="35%">ZIP CODE : <span class="inputtext"><?= !empty($custmer) ? $custmer->zipcode : '' ?></span></td>
                        </tr>
                        <tr>
                            <td colspan="4">PHONE : TEL:<span class="inputtext"><?= !empty($custmer) ? $custmer->phone_usa : '' ?>	</span>,FAX:<span class="inputtext"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="35%">ID # : </td>

<!-- <td colspan="2" width="65%">TYPE &amp; ISSUER : TAX ID </td> -->
                            <td colspan="2" width="65%">TYPE &amp; ISSUER : </td>
                        </tr></tbody></table>
                <br>
                <table width="100%" class="inner">
                    <tbody><tr><th colspan="4">ULTIMATE CONSIGNEE<span style="font-weight:normal;"> ([&nbsp;&nbsp;&nbsp;&nbsp;] CHECK IF SHIPPER)</span></th></tr>

                        <?php
                        if ($model->conignee_id) {
                            $consignee = \common\models\Consignee::findOne($model->conignee_id);
                        }
                        ?>
                        <tr>
                            <td colspan="3" width="60%">NAME : <span class="inputtext"><?= !empty($consignee) ? $consignee->consignee_name : '' ?></span></td>
                            <td width="40%">DOB : </td>
                        </tr>
                        <tr>
                            <td colspan="4" width="100%">ADDRESS: <span class="inputtext"><?= !empty($consignee) ? $consignee->address1 : '' ?></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="35%">CITY : <span class="inputtext"> <?= !empty($consignee) ? $consignee->city : '' ?> </span></td><td width="30%">STATE : <span class="inputtext"> <?= !empty($consignee) ? $consignee->state : '' ?> </span></td><td width="35%"><span class="inputtext">COUNTRY :  <?= !empty($consignee) ? $consignee->country : '' ?> </span></td>
                        </tr>
                        <tr>
                            <td colspan="4">PHONE : <span class="inputtext"> <?= !empty($consignee) ? $consignee->phone : '' ?> </span></td>
                        </tr>

                    </tbody></table>
                <br>
                <table width="100%" class="inner">
                    <tbody><tr>
                            <th colspan="2">DESIGNATED AGENT/BROKER/FREIGHT FORWARDER</th>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="inputtext">NAME : Ariana Worldwide</span></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="inputtext">ADDRESS : 7801 PARKHURST DR</span></td>
                        </tr>
                        <tr>
                            <td><span class="inputtext">CITY :  HOUSTON</span></td>
                            <td><span class="inputtext">STATE : TX</span></td> 
                        </tr>
                        <tr>
                            <td><span class="inputtext">PHONE : l713-631-1560</span></td>
                            <td><span class="inputtext">CONTACT :SOPHIA</span></td>
                        </tr>
                    </tbody></table>
                <br>
                <p>
                </p><center><span style="text-align: center; letter-spacing: 6px; font-weight: bold; font-family:  Arial, Helvetica, sans-serif;">UNITED STATES CUSTOMS AND BORDER PROTECTION</span></center>
                <p></p>


            </div>

        </div>
    </div>
    <script>
        $(function () {
            $("#btnPrintThiscover").click(function () {
                $("#btncover").printThis();
            });
        });
        //                        $("#btnPrintThisdock").click(function () {
        //                            $("#btndock").printThis({"debug": false, "importCSS": true, "importStyle": false, "pageTitle": "", "removeInline": false, "printDelay": 50, "header": null, "formValues": true});
        //                        });
    </script>
</div>
