<?php

use yii\helpers\Html;
?>
<div id="modalContentreport">
    <button type="button" id="btnPrintThislanding" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>                
    <a class="btn btn-primary" href="/export/landingpdf?id=43915&amp;mail=1" title="Will send the mail to customer" target="_blank" data-toggle="tooltip"><i class="fa fa-envelope"></i> Email</a>                
    <?= Html::a('<i class="fa fa-file-pdf-o"></i> Open as Pdf', ['landingpdf', 'id' => $model->id], ['class' => 'btn btn-primary', 'target' => '_blank', 'title' => 'Will open the generated PDF file in a new window']) ?>  
    <div id="btnlanding" class="condition_reports">
        <div class="bola">
            <table class="" width="100%">
                <tbody><tr><td width="73%" id="lopa"><b>AFG GLOBAL SHIPPER LLC</b></td><td width="27%"><b>BILL OF LADING</b></td></tr>
                </tbody></table>

            <div class="shipa">
                <table width="100%">
                    <thead><tr><td><b>SHIPPER / EXPORTER</b></td></tr></thead>
                    <tbody>
<?php
                        if ($model->customer) {
                            $customer = common\models\Customers::findOne($model->customer);
                        }
                        ?>
                        <tr><td contenteditable="true">  <?= !empty($customer) ? $customer->company_name : '' ?>, <?= !empty($customer) ? $customer->address1 : '' ?></td></tr>
                        <tr><td contenteditable="true"><?= !empty($customer) ? $customer->city : '' ?>&nbsp;<?= !empty($customer) ? $customer->zipcode : '' ?></td></tr>
                        <tr><td contenteditable="true"> <?= !empty($customer) ? $customer->phone_usa : '' ?>	</td></tr>
                    </tbody>
                </table>


            </div>
            <div class="shipa1">
                <div class="kiki">
                    <div class="pipi1">
                        <table width="100%">
                            <tbody><tr><td><b>BOOKING #</b></td></tr>
                                <tr><td contenteditable="true"><?= $model->booking_no ?></td></tr>	
                            </tbody></table>

                    </div>
                    <div class="pipi2">
                        <table width="100%">
                            <tbody><tr><td><b>REFERENCE #</b></td></tr>
                                <tr><td contenteditable="true"><?= $model->ar_no ?></td></tr>	
                            </tbody></table>
                    </div>
                </div>
                <div class="kiki">
                    <div class="pipi1">
                        <table width="100%">
                            <tbody><tr>
                                    <td><b>PLACE OF RECEIPT</b></td></tr>
                                <tr><td contenteditable="true"><?= $model->place_of_recipt_by_pre_carrrier ?></td></tr>	
                            </tbody></table>

                    </div>
                    <div class="pipi2">
                        <table width="100%">
                            <tbody><tr>
                                    <td><b>PORT OF LOADING</b></td></tr>
                                <tr><td contenteditable="true"><?= $model->port_of_loading ?></td></tr>	
                            </tbody></table>
                    </div>
                </div>

                <div class="pipi12">
                    <table width="100%">
                        <tbody><tr><td width="50%"><b>PORT OF DISCHARGE:</b></td>
                                <td width="50%" contenteditable="true"><?= $model->port_of_discharge ?></td></tr>
                        </tbody></table>

                </div>

            </div>

            <div class="shipa221">
                <table width="100%">
                    <thead><tr><td><b>CONSIGNEE</b></td></tr></thead>
                    <tbody>
                        <?php
                        if ($model->conignee_id) {
                            $consignee = \common\models\Consignee::findOne($model->conignee_id);
                        }
                        ?>
                        <tr><td contenteditable="true"><?= !empty($consignee) ? $consignee->consignee_name : '' ?> </td></tr>
                        <tr><td contenteditable="true"><?= !empty($consignee) ? $consignee->address1 : '' ?></td></tr>
                        <tr><td contenteditable="true"> TEL: <?= !empty($consignee) ? $consignee->phone : '' ?>  </td></tr>
                        <tr>
                        </tr>
                    </tbody>

                </table>

            </div>


            <div class="shipa1234">
                <div class="kiki">
                    <div class="pipi1">
                        <table width="100%">
                            <tbody><tr>
                                    <td><b>PIER</b></td></tr>
                                <tr><td contenteditable="true"><?= $model->terminal ?></td></tr>	
                            </tbody></table>

                    </div>
                    <div class="pipi2">
                        <table width="100%">
                            <tbody><tr>
                                    <td><b>VESSEL</b></td></tr>
                                <tr><td contenteditable="true"><?= $model->vessel ?></td></tr>	
                            </tbody></table>
                    </div>
                </div>
                <div class="kiki">
                    <div class="pipi1">
                        <table width="100%">
                            <tbody><tr>
                                    <td><b>LOADING PIER / TERMINAL</b></td></tr>
                                <tr><td contenteditable="true"><?= $model->loading_terminal ?></td></tr>	
                            </tbody></table>

                    </div>
                    <div class="pipi2">
                        <table width="100%">
                            <tbody><tr>
                                    <td><b>VOYAGE NO.</b></td></tr>
                                <tr><td contenteditable="true"><?= $model->voyage ?></td></tr>	
                            </tbody></table>
                    </div>
                </div>

            </div>
            <div class="shipa221">
                <table width="100%">
                    <thead><tr><td><b>NOTIFY</b></td></tr></thead>
                    <tbody>
                        <?php
                        if ($model->notify_party) {
                            $consignee_notify = \common\models\Consignee::findOne($model->notify_party);
                        }
                        ?>
                        <tr><td contenteditable="true"><?= !empty($consignee_notify) ? $consignee_notify->consignee_name : '' ?>                                           </td></tr>
                        <tr><td contenteditable="true"><?= !empty($consignee_notify) ? $consignee_notify->address1 : '' ?></td></tr>
                        <tr><td contenteditable="true"> TEL: <?= !empty($consignee_notify) ? $consignee_notify->phone : '' ?>  </td></tr>
                        <tr>
                        </tr>
                    </tbody>

                </table>

            </div>


            <div class="shipa1234">
                <table id="KIAM" width="100%">
                    <tbody><tr><td><b>FOR RELEASE OF CARGO PLEASE CONTACT:</b></td></tr>
                        <tr>
                            <td height="49"></td>
                        </tr>
                    </tbody></table>
                <table id="siam" width="100%">
                    <tbody><tr><td width="12%"><b>ETA/</b></td>
                            <td width="88%" contenteditable="true"> </td></tr>
                    </tbody></table>
            </div>

            <div class="shipa2212">
                <div class="simi">
                    <table width="100%">
                        <tbody><tr><td><b>CONTAINER #</b></td></tr>
                            <tr><td contenteditable="true"><?= $model->container_no ?></td></tr>
                        </tbody></table>

                </div>
                <div class="simi">
                    <table width="100%">
                        <tbody><tr>
                                <td><b>CONTAINER TYPE</b></td></tr>
                            
                            <tr><td contenteditable="true" style="font-size:13px;">1 X 40'HC DRY VAN</td></tr>
                        </tbody></table>

                </div>
                <div class="simi1" style="float: left;">
                    <table width="100%">
                        <tbody><tr><td><b>SEAL #</b></td></tr>
                            <tr><td contenteditable="true"></td></tr>
                        </tbody></table>
                </div>
            </div>


            <div class="shipa12342">
                <table id="KIAM" width="100%">
                    <tbody><tr><td contenteditable="true"><b>SPECIAL INSTRUCTIONS:</b></td></tr>
                        <tr>
                            <td contenteditable="true">

                            </td>
                        </tr>
                    </tbody></table>

            </div>
            <div class="desc">
                <table width="100%">
                    <tbody>
                        <tr>
                            <?php $vehicles = explode(',', $model->vehicle_id); ?>
                            <th width="72%" colspan="4"><b>SHIPPERS DESCRIPTIONS OF GOODS</b><br><?= count($vehicles) ?> UNITS USED VEHICLE</th>
                            <th width="12%"><b>WEIGHT</b></th>
                            <th width="16%" contenteditable="true"><b>CUBE <br>55 M3</b></th>
                        </tr>

                             <?php
                        $vehicles = explode(',', $model->vehicle_id);
                        $weight = 0;
                        foreach ($vehicles as $vehicle) {
                            $vehicle_detail = common\models\Vehicle::findOne($vehicle);
                            $weight = $weight + $vehicle_detail->weight;
                            ?>
                            <tr class = "">
                                <td align = "center" width = "15%" contenteditable = "true"><?= $vehicle_detail->year ?></td>
                                <td align = "" width = "15%" contenteditable = "true"><?= $vehicle_detail->make ?></td>
                                <td align = "" width = "20%" contenteditable = "true"><?= $vehicle_detail->model . '/' . $vehicle_detail->color ?></td>
                                <td align = "" width = "30%" contenteditable = "true"><?= $vehicle_detail->vin ?></td>
                                <td width = "12%" contenteditable = "true"><?= $vehicle_detail->weight ?></td>
                                <td width = "16%"></td>
                            </tr>
                        <?php } ?>

                    </tbody></table>
            </div>

            <div class="carsi">
                <table class="" width="100%">
                    <tbody><tr><th width="72%"> <b></b></th><th width="12%" contenteditable="true"<?= $weight ?>kg</th><th width="16%"></th></tr>
                    </tbody>
                </table>
            </div>

            <div class="addtls">
                <table width="100%">

                    <tbody><tr><td><b>*** NON HAZ MAT</b></td><td><b>OCEAN FREIGHT PRE-PAID</b></td><td><b>TOTAL WEIGHT KG</b></td></tr>
                        <tr><td><b>*** SEND TELEX RELEASE</b></td><td><b>ITN#</b></td><td>3742</td></tr>
                        <tr>
                            <td colspan="3">
                                <p>These Comodities, technology or software were exported from the United States in the acordance with the export administrative regulations. Diversion contrary to the U.S. law prohibited.</p>
                            </td>
                        </tr>
                    </tbody></table>


            </div>

            <table class="bottom-text" width="100%">
                <tbody><tr><td>
                            HEREBY CERTIFY HAVING RECEIVED THE ABOVE DESCRIBED SHIPMENT IN OUTWARDLY GOOD CONDITION FROM THE SHIPPER SHOWN IN SECTION "EXPORTER", FOR FORWARDING TO THE ULTIMATE CONSIGNEE SHOWN IN THE SECTION "CONSIGNEE" ABOVE. IN WITNESS WHEREOF, THE ____________ NONNEGOTIABLE FCR'S HAVE BEEN SIGNED, AND IF ONE (1) IS ACCOMPLISHED BY DELIVERY OF GOODS, ISSUANCE OF A DELIVERY ORDER OR BY SOME OTHER MEANS, THE OTHERS SHALL BE AVOIDED IF REQUIRED BY THE FREIGHT FORWARDER, ONE (1) ORIGINAL FCR MUST BE SURRENDERED, DULY ENDORSED IN EXCHANGE FOR THE GOODS OR DELIVERY ORDER.
                        </td></tr>
                </tbody></table>

            <table class="" width="100%">
                <tbody>
                    <tr>
                        <td colspan="4">
                            <span style="display:block;margin-top:10px;">AFG Global Shipper LLC is a freight forwarding company, and we are not liable for any charges if your container is stopped by the US Customs for random, routine procedural checks.
                            </span><span style="display:block;margin-top:10px;">
                                On our end, we will always make sure to have all the necessary paperwork attached when we ship your container and take the correct steps to meet all requirements.  However, due to US Customs policy, they can always stop a container for random inspections.  Although we will try our best to help you with anything we can, we are not responsible for this stop or any fees related to it because they are a completely separate entity from us.  You will be liable to US Customs and all charges pertaining to this stop will be covered by you and paid directly to them.
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="12%"><b>AUTHORIZED</b></td><td width="42%" style="border-bottom-width: 1px;border-bottom-style: solid;" contenteditable="true">

                        </td>
                        <td width="11%"><b>DATED AT:</b></td><td style="border-bottom-width: 1px;border-bottom-style: solid;" width="35%" contenteditable="true"></td>
                    </tr>

                </tbody></table>


        </div>
    </div>


    <script>$("#btnPrintThislanding").click(function () {
            $("#btnlanding").printThis({"debug": false, "importCSS": true, "importStyle": false, "loadCSS": "/assets_b/css/print_bl.css", "pageTitle": "", "removeInline": false, "printDelay": 2000, "header": null, "formValues": true});
        });
    </script></div>