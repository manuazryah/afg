<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="modalContentreport">             
    <div class="bola">
<!--            <table class="" width="100%">
            <tbody>
                <tr><td width="73%" id="lopa"><b><?= $model->broker_name ?> </b></td><td width="27%"><b>BILL OF LADING </b></td></tr>
            </tbody>
        </table>-->
        <div>
            <div class="shipa">
                <table class="table table-bordered" width="100%">
                    <thead>
                        <tr><td class="newtd tdbg" >SHIPPER / EXPORTER</td></tr></thead>
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
                        <table class="table table-bordered" width="100%">
                            <tbody>
                                <tr><td class="newtd tdbg">BOOKING #</td></tr>
                                <tr><td class="newtd">038HOU1596509E</td></tr>	
                            </tbody>
                        </table>
                    </div>
                    <div class="pipi2">
                        <table class="table table-bordered" width="100%">
                            <tbody>
                                <tr><td class="newtd borderleft tdbg">REFERENCE #</td></tr>
                                <tr><td class="newtd borderleft">N125018JANMOHAMMAD4</td></tr>	
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="kiki">
                    <div class="pipi1">
                        <table class="table table-bordered" width="100%">
                            <tbody>
                                <tr><td class="newtd tdbg">PLACE OF RECEIPT</td></tr>
                                <tr><td class="newtd">232323</td></tr>	
                            </tbody>
                        </table>

                    </div>
                    <div class="pipi2">
                        <table class="table table-bordered" width="100%">
                            <tbody>
                                <tr><td class="newtd borderleft tdbg">PORT OF LOADING</td></tr>
                                <tr><td class="newtd borderleft">345435</td></tr>	
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="pipi12">
                    <table class="table table-bordered" width="100%">
                        <tbody>
                            <tr><td width="50%" class="tdbg" style="padding: 5px">PORT OF DISCHARGE</td>
                                <td width="50%" class="borderleft">JEBEL ALI</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div style="clear: both" class="clearfix"></div>
        <div style="display: block"></div>

        <div class="shipa221">
            <div class="shipa222">dfhhrthrt</div>

        </div>

        <div class="shipa221">
            <div class="shipa222">dfhhrthrt</div>
        </div>



    </div>
</div>

</div>

