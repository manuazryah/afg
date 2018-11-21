<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="modalContentreport">

   
    <div id="btndock" class="condition_reportss" contenteditable="true">
        <div class="cond_here">
            <div id="page_border" class="page_border" style="padding:15px;">
                <center><strong style="font-family:Arial, Helvetica, sans-serif; font-size:16px;">DOCK RECEIPT</strong></center>
                <table class="table table-bordered" width="100%">
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

                                <br><strong> <?= $model->booking_no ?></strong>
                            </td>
                            <td valign="top"><i>5a.B/L OR AWB NUMBER</i>
                                <br>	<?= $model->bl_or_awb_number ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><i>6.EXPORT REFERENCES</i>
                                <br>	<?= $model->export_referance ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="2" style="height:90px;"><i>3.CONSIGNED TO</i>
                                <br>	    
                                <?php
                                if ($model->conignee_id) {
                                    $consignee = \common\models\Consignee::findOne($model->conignee_id);
                                    $consignee_value = !empty($consignee) ? $consignee->consignee_name . '&nbsp;<br>' .
                                            $consignee->address1 . '<br>' .
                                            $consignee->phone : '';
                                    echo $consignee_value;
                                }
                                ?>                                             </td>
                            <td colspan="3" style="height:70px;"><i>7.FORWARDING AGENT (NAME &amp; ADDRESS - REFERENCES)</i>
                                <br>	<?= $model->forwading_agent ?>	
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><i>8.POINT(STATE) OF ORIGIN OR FTZ NUMBER</i><br><strong>NEWARK</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="height:90px;"><i>4.NOTIFY PARTY/INTERMEDIATE CONSIGNEE (Name and Address)</i>
                                <br> 	    
                                <?php
                                if ($model->notify_party) {
                                    $consignee = \common\models\Consignee::findOne($model->notify_party);
                                    $consignee_value = !empty($consignee) ? $consignee->consignee_name . '&nbsp;' .
                                            $consignee->address1  : '';
                                    echo $consignee_value;
                                }
                                ?>                                                         
                            </td>
                            <td colspan="3" rowspan="2" style="height:125px;">
                                <i>9.DOMESTIC ROUTING/EXPORT INSTRUCTIONS</i>
                                <br>			<br>
                                <div>
                                    <?= $model->domestic_routing_instructions ?>	                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="25%" style="height: 40px;"><i>12.PRE-CARRIAGE BY</i>
                                <br> <?= $model->pre_carraiage_by ?>	
                            </td>
                            <td width="25%"><i style="font-size: 8px;">13.PLACE OF RECEIPT BY PRE-CARRIER</i>
                                <br><?= $model->place_of_recipt_by_pre_carrrier ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height: 40px;"><i>14.EXPORTING CARRIER</i>
                                <br><?= $model->exporting_carruer ?>                        </td>
                            <td><i>15.PORT OF LOADING/EXPORT</i>
                                <br> <?= $model->port_of_loading ?>  		
                            </td>
                            <td colspan="3"><i>10.LOADING PIER/TERMINAL</i>
                                <br><strong> <?= $model->loading_terminal ?></strong>
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
                                <?= $model->port_of_discharge ?>		
                            </td>
                            <td rowspan="2"><i>17.FINAL DESTINATION</i>
                                <br>
                             <?= $model->final_destintion ?>   
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
                                <strong><?= $model->container_no?></strong>
                                <br>
                                <strong>SEAL#<br><?= $model->seal_no?></strong>
                            </td>
                            <td><?= $model->number_of_packages?></td>
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


</div>

