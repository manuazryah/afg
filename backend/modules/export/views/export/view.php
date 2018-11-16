<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Export */

$this->title = 'Export Details';
$this->params['breadcrumbs'][] = ['label' => 'Exports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">

                <div class="panel-body"><div class="export-view">
                        <p>
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Export</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <button onclick="jQuery('#dockexport').modal('show');" class="btn btn-warning  btn-icon btn-icon-standalone" >Dock Receipt</button>

                        </p>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <h4>Export Detail</h4>
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>EXPORT DATE</th>
                                        <td><?= $model->export_date ?></td>
                                    </tr>
                                    <tr>
                                        <th>LOADING DATE</th>
                                        <td><?= $model->loding_date ?></td>
                                    </tr>
                                    <tr>
                                        <th>BROKER NAME</th>
                                        <td><?= $model->broker_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>BOOKING NO</th>
                                        <td><?= $model->booking_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>ETA</th>
                                        <td><?= $model->ETA ?></td>
                                    </tr>
                                    <tr>
                                        <th>AR NO</th>
                                        <td><?= $model->ar_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>XTN NO</th>
                                        <td><?= $model->xtn_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>SEAL NO</th>
                                        <td><?= $model->seal_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>CONTAINER NO</th>
                                        <td><?= $model->container_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>CUT OFF</th>
                                        <td><?= $model->cut_off ?></td>
                                    </tr>
                                    <tr>
                                        <th>VESSEL</th>
                                        <td><?= $model->vessel ?></td>
                                    </tr>
                                    <tr>
                                        <th>VOYAGE</th>
                                        <td><?= $model->voyage ?></td>
                                    </tr>
                                    <tr>
                                        <th>TERMINAL</th>
                                        <td><?= $model->terminal ?></td>
                                    </tr>
                                    <tr>
                                        <th>STREAMSHIP LINE</th>
                                        <td><?= $model->stremship_line ?></td>
                                    </tr>
                                    <tr>
                                        <th>ITN</th>
                                        <td><?= $model->ITN ?></td>
                                    </tr>
                                    <tr>
                                        <th>CONTAINER TYPE</th>
                                        <td><?= $model->additional_info_container_type ?></td>
                                    </tr>
                                    <tr>
                                        <th>PORT OF LOADING</th>
                                        <td><?= $model->port_of_loading ?></td>
                                    </tr>
                                    <tr>
                                        <th>PORT OF DISCHARGE</th>
                                        <td><?= $model->port_of_discharge ?></td>
                                    </tr>
                                    <tr>
                                        <th>BOL NOTE</th>
                                        <td><?= $model->bol_note ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <h4>Houston Custom Cover Letter</h4>
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>EXPORT DATE</th>
                                        <td><?= $model->export_date ?></td>
                                    </tr>
                                    <tr>
                                        <th>VEHICLE LOCATION</th>
                                        <td><?= $model->vehicle_location ?></td>
                                    </tr>
                                    <tr>
                                        <th>EXPORTER ID</th>
                                        <td><?= $model->exporter_id ?></td>
                                    </tr>
                                    <tr>
                                        <th>EXPORTER TYPE ISSUER</th>
                                        <td><?= $model->exporter_type_issue ?></td>
                                    </tr>
                                    <tr>
                                        <th>TRANSPORTATION VALUE</th>
                                        <td><?= $model->transpotation_value ?></td>
                                    </tr>
                                    <tr>
                                        <th>EXPORTER DOB</th>
                                        <td><?= $model->exporter_dob ?></td>
                                    </tr>
                                    <tr>
                                        <th>ULTIMATE CONSIGNEE DOB</th>
                                        <td><?= $model->ultimate_consignee_dob ?></td>
                                    </tr>
                                    <tr>
                                        <th>CONSIGNEE</th>
                                        <?php $consignee = \common\models\Consignee::findOne($model->conignee_id) ?>
                                        <td><?= $consignee->consignee_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>NOTIFY PARTY</th>
                                        <?php $notify_party = \common\models\Consignee::findOne($model->notify_party) ?>
                                        <td><?= $notify_party->consignee_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>LABEL</th>
                                        <td><?php ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <h4>Customer Information</h4>
                                <table class="table table-bordered table-responsive">
                                    <?php
                                    $customer = common\models\Customers::findOne($model->customer);
                                    if (!empty($customer)) {
                                        ?>
                                        <tr>
                                            <th>CUSTOMER NAME</th>
                                            <td><?= $customer->name ?></td>
                                        </tr>
                                        <tr>
                                            <th>CUSTOMER ID</th>
                                            <td><?= $customer->customer_id ?></td>
                                        </tr>
                                        <tr>
                                            <th>COMPANY NAME</th>
                                            <td><?= $customer->company_name ?></td>
                                        </tr>
                                        <tr>
                                            <th>EMAIL</th>
                                            <td><?= $customer->email ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4>Export Vehicles</h4>
                                <?php
                                $vehicles = explode(',', $model->vehicle_id);
                                ?>
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>YEAR</th>
                                        <th>MAKE</th>
                                        <th>MODEL</th>
                                        <th>COLOR</th>
                                        <th>VIN</th>
                                        <th>STATUS</th>
                                        <th>TITLE NO</th>
                                        <th>TITLE STATE</th>
                                        <th>LOT NO</th>
                                    </tr>
                                    <?php
                                    foreach ($vehicles as $vehicle) {
                                        $vehicle_detail = \common\models\Vehicle::findOne($vehicle);
                                        $vehicle_title_info = common\models\VehicleTitleInfo::find()->where(['vehicle_id' => $vehicle_detail->id])->one();
                                        ?>
                                        <tr>
                                            <td><?= $vehicle_detail->year ?></td>
                                            <td><?= $vehicle_detail->make ?></td>
                                            <td><?= $vehicle_detail->model ?></td>
                                            <td><?= $vehicle_detail->color ?></td>
                                            <td><?= $vehicle_detail->vin ?></td>
                                            <td><?= $vehicle_detail->status_id ?></td>
                                            <td><?= $vehicle_title_info->title ?></td>
                                            <td><?php ?></td>
                                            <td><?= $vehicle_detail->lot_no ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4>Container Images Gallery</h4>
                                <?php
                                $path = Yii::getAlias('@paths') . '/export/container/' . $model->id;
                                if (count(glob("{$path}/*")) > 0) {
                                    $k = 0;
                                    foreach (glob("{$path}/*") as $file) {
                                        $k++;
                                        $arry = explode('/', $file);
                                        $img_nmee = end($arry);
                                        $img_nmees = explode('.', $img_nmee);
                                        if ($img_nmees['1'] != '') {
                                            ?>
                                            <div class = "col-md-3 img-box" id="<?= $k; ?>">
                                                <div class="news-img">
                                                    <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/export/container/' . $model->id . '/' . end($arry) ?>">
                                                </div> 
                                            </div>
                                            <?php
                                        }
                                        if ($k % 4 == 0) {
                                            ?>
                                            <div class="clearfix"></div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade custom-width" id="dockexport">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <div id="modalContentreport">

                    <button type="button" id="btnPrintThisdock" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                    <?= Html::a('<i class="fa fa-file-pdf-o "></i> Open as Pdf', ['dockpdf', 'id' => $model->id], ['class' => 'btn btn-primary','target'=>'_blank']) ?>
                    <a class="btn btn-primary" href="/export/dockpdf?id=42543" title="Will open the generated PDF file in a new window" target="_blank" data-toggle="tooltip"><i class="fa fa-file-pdf-o "></i> Open as Pdf</a>
                    <div id="btndock" class="condition_reportss" contenteditable="true">
                        <div class="cond_here">
                            <div id="page_border" class="page_border" style="padding:15px;">
                                <center><strong style="font-family:Arial, Helvetica, sans-serif; font-size:16px;">DOCK RECEIPT</strong></center>
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" rowspan="2" width="50%" valign="top" style="height:100px;">
                                                <i>2.EXPORTER (Principal or seller-license and address including ZIP Code)</i>
                                                <br>
                                                AL QAMAR AL SATEE USED CARS TR LLC&nbsp;20925 ROSCIE BLVD NO <br>
                                                CA<br>
                                                91304<br>
                    <!--                                 <p style="width:150px;"> Ref: </p>-->
                                            </td>
                                            <td colspan="2" valign="top" style="height:65px;"><i>5.BOOKING NUMBER</i>

                                                <br><strong> 900704001</strong>
                                            </td>
                                            <td valign="top"><i>5a.B/L OR AWB NUMBER</i>
                                                <br>	900704001	
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><i>6.EXPORT REFERENCES</i>
                                                <br>	900704001	
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" rowspan="2" style="height:90px;"><i>3.CONSIGNED TO</i>
                                                <br>	                                AL QAMAR AL SATEE USED CARS TR LLC&nbsp;<br>
                                                INDUSTRIAL AREA NO. 2<br>
                                                050-8556036                                                    </td>
                                            <td colspan="3" style="height:70px;"><i>7.FORWARDING AGENT (NAME &amp; ADDRESS - REFERENCES)</i>
                                                <br>	Ariana Worldwide USA INC: 810 Frelinghuysen Ave, Newark, NJ 07114, Tel: 862 237 7066	
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><i>8.POINT(STATE) OF ORIGIN OR FTZ NUMBER</i><br><strong>NEWARK</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="height:90px;"><i>4.NOTIFY PARTY/INTERMEDIATE CONSIGNEE (Name and Address)</i>
                                                <br> 

                                                ARIANA WORLDWIDE SHIPPING LLC&nbsp;1205 CENTURION STAR TOWER, DEIRA<br>
                                                &nbsp;<br>
                                                UAE&nbsp;                                                            
                                            </td>
                                            <td colspan="3" rowspan="2" style="height:125px;">
                                                <i>9.DOMESTIC ROUTING/EXPORT INSTRUCTIONS</i>
                                                <br>			<br>
                                                <div>
                                                    AUTO RECEIVING DATE:2018-11-14 <br>
                                                    AUTO CUT OFF:2018-11-14  <br>
                                                    VESSEL CUT OFF:2018-11-14 <br>
                                                    SAIL DATE: 		                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" width="25%" style="height: 40px;"><i>12.PRE-CARRIAGE BY</i>
                                                <br>	TRT	
                                            </td>
                                            <td width="25%"><i style="font-size: 8px;">13.PLACE OF RECEIPT BY PRE-CARRIER</i>
                                                <br>	NEWARK	
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="height: 40px;"><i>14.EXPORTING CARRIER</i>
                                                <br>MOL PARAMOUNT 103W                        </td>
                                            <td><i>15.PORT OF LOADING/EXPORT</i>
                                                <br> NEWARK		
                                            </td>
                                            <td colspan="3"><i>10.LOADING PIER/TERMINAL</i>
                                                <br><strong> GLOBAL TERMINAL</strong>
                                            </td>
                                        </tr>
                                        <!--
                                           <tr>
                                               <td colspan="2">16.FOREIGN PORT OF UNLOADING</td>
                                               <td>17.FINAL DESTINATION</td>
                                               <td colspan="3">11.AES#</td>
                                           </tr>
                                        -->
                                        <tr>
                                            <td colspan="2" rowspan="2" style="height: 40px;"><i>16.FOREIGN PORT OF UNLOADING</i>
                                                <br>
                                                JEBEL ALI		
                                            </td>
                                            <td rowspan="2"><i>17.FINAL DESTINATION</i>
                                                <br>
                                                JEBEL ALI	
                                            </td>
                                            <td rowspan="2" width="30%"><i>11.AES#</i>
                                                <br> 			
                                            </td>
                                            <td colspan="2"><i>11a.CONTAINERIZED(VESSEL)</i></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"><i>YES</i></td>
                                            <td><i>NO</i></td>
                                        </tr>
                                        <tr>
                                            <td width="20%" style="height: 40px;"><i>MARKS &amp; NUMBERS</i></td>
                                            <td width="5%"><i>NUMBER OF PACKAGES(19)</i></td>
                                            <td colspan="2"><i>(20)DESCRIPTION OF COMMODITIES</i><br><strong>AUTOS</strong></td>
                                            <td><i>GROSS WEIGHT<br>(LBS.)(21)</i></td>
                                            <td><i>MEASUREMENT<br>(22)</i></td>
                                        </tr>
                                        <tr>
                                            <td style=""><strong>CONTAINER NO.:</strong><br>
                                                <strong></strong>
                                                <br>
                                                <strong>SEAL#<br>704001</strong>
                                            </td>
                                            <td>04</td>
                                            <td colspan="2">

                                    <center>1 X 40'HC DRY VAN</center><table id="cars_no_border">
                                        <tbody>

                                            <tr class="table_td_no_border">
                                                <td align="center">1</td>
                                                <td align="center">2016</td>
                                                <td align="center">KIA</td>
                                                <td align="center">OPTIMA</td>
                                                <td align="center">5XXGT4L35GG025617</td>
                                                <td align="center">Wt:3600 &nbsp;lbs</td>

                                            </tr>

                                            <tr class="table_td_no_border">
                                                <td align="center">2</td>
                                                <td align="center">2016</td>
                                                <td align="center">KIA</td>
                                                <td align="center">SOUL</td>
                                                <td align="center">KNDJP3A52G7238672</td>
                                                <td align="center">Wt:CLASS 1C: 4,001 - 5,000 LB (1,814 - 2,268 KG) &nbsp;lbs</td>

                                            </tr>

                                            <tr class="table_td_no_border">
                                                <td align="center">3</td>
                                                <td align="center">2017</td>
                                                <td align="center">TOYOTA</td>
                                                <td align="center">COROLLA</td>
                                                <td align="center">2T1BURHE9HC925833</td>
                                                <td align="center">Wt:2900 &nbsp;lbs</td>

                                            </tr>

                                            <tr class="table_td_no_border">
                                                <td align="center">4</td>
                                                <td align="center">2017</td>
                                                <td align="center">TOYOTA</td>
                                                <td align="center">COROLLA</td>
                                                <td align="center">2T1BURHE0HC856644</td>
                                                <td align="center">Wt:2900 &nbsp;lbs</td>

                                            </tr>


                                        </tbody>
                                    </table>

                                    <center>BATTERIES DISCONNECTED &amp; GASOLINE DRAINED</center>
                                    </td>
                                    <td>9400LBS</td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align:initial;padding-right:5px;">
                                            DELIVERED BY:

                                            <br>LIGHTER TRUCK-------------------------------------------------------------

                                            <br>ARRIVED-DATE-------------------------------TIME-----------------------

                                            <br>UNLOADED-DATE--------------------------TIME-----------------------

                                            <br>CHECKED BY------------------------------------------------------------------

                                            <br>PLACED &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:9px;">IN SHIP</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  LOCATION-----------------
                                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:9px;">ON DOCK</span>
                                        </td>
                                        <td colspan="3" style="text-align:initial;padding-right:5px;">
                                            <i>
                                                RECEIVED THE ABOVE DESCRIBED GOODS OR PACKAGES SUBJECT TO
                                                ALL THE TERMS OF THE UNDERSIGNED'S REGULAR FORM OF DOCK
                                                RECEIPT AND BILL OF LADING WHICH SHALL CONSTITUTE THE
                                                CONTRACT UNDER WHICH THE GOODS ARE RECEIVED, COPIES OF
                                                WHICH ARE AVAIABLE FROM THE CARRIER ON REQUEST AND MAY BE
                                                INSPECTED AT ANY OF ITS OFFICES.
                                            </i>
                                            <br>
                                            <div style="padding:5px;">

                                                <span style="">FOR THE MASTER</span><br>
                                                <table style="border:none;">
                                                    <tbody>
                                                        <tr style="width: 50%;float: left;">
                                                            <td style="border:none;padding: 10px;">BY</td>
                                                            <td style="border:none;padding: 10px;"><span style="border-bottom-width: 1px;
                                                                                                         border-bottom-style: solid;
                                                                                                         border-bottom-color: #000;
                                                                                                         margin-top: 10px;
                                                                                                         margin-bottom: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                                                            </td>
                                                        </tr>
                                                        <tr style="width: 50%;float: left;">
                                                            <td style="border:none;padding: 10px;">
                                                                DATE
                                                            </td>
                                                            <td style="border:none;padding: 10px;">
                                                                <span style="border-bottom-width: 1px;
                                                                      border-bottom-style: solid;
                                                                      border-bottom-color: #000;
                                                                      margin-top: 10px;
                                                                      margin-bottom: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                   
                    <script>
                        $(function () {
                            $("#btnPrintThisdock").click(function () {
                                $(".page_border").printThis();
                            });
                        });
//                        $("#btnPrintThisdock").click(function () {
//                            $("#btndock").printThis({"debug": false, "importCSS": true, "importStyle": false, "pageTitle": "", "removeInline": false, "printDelay": 50, "header": null, "formValues": true});
//                        });
                    </script></div>
            </div>

            <!--            <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info">Save changes</button>
                        </div>-->
        </div>
    </div>
</div>


