<?php

use yii\helpers\Html;
?>
<!--<div class="modal-body">-->
<div id="modalContentreport">
    <button type="button" id="btnPrintThiscover" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>

    <div id="btncover" class="condition_report" contenteditable="true" data-gramm_id="f460bc85-c96b-494a-b58c-7a0ad6df64c2" data-gramm="true" spellcheck="false" data-gramm_editor="true">

        <div class="non_haz">

            <table width="100%">
                <tbody><tr>
                        <td align="center">  <span style="font-size: 25px;color: #3ec1d5;"><b>AFG</b></span>
                        </td></tr>
                </tbody></table>
            <br>
            <table width="100%">
                <tbody><tr><th id="impa">NON-HAZARDOUS <g class="gr_ gr_27 gr-alert gr_spell gr_inline_cards gr_run_anim ContextualSpelling ins-del multiReplace" id="27" data-gr-id="27">DECLERATION</g></th></tr>
                </tbody></table>

            <br>
            <table width="100%" border="1">
                <tbody><tr><td width="33%">CARRIER</td><td align="center" width="67%"><?= $model->stremship_line ?></td></tr>
                    <tr><td>VESSEL NAME / VOYAGE</td><td align="center"><?= $model->vessel ?>&nbsp;/&nbsp;<?= $model->voyage ?></td></tr>
                    <tr><td>ORIGIN</td><td align="center"><?= $model->port_of_loading ?></td></tr>
                    <tr><td>DESTINATION</td><td align="center"><?= $model->destination ?></td></tr>
                    <tr><td>BOOKING NUMBER</td><td align="center"><?= $model->booking_no ?></td></tr>
                    <tr><td>CONTAINER NUMBER</td><td align="center"><?= $model->container_no ?></td></tr>
                    <?php
                    $vehicles = explode(',', $model->vehicle_id);
                    ?>
                    <tr><td>NUMBER OF VEHICLES</td><td align="center"><?= !empty($vehicles) ? count($vehicles) : '0' ?></td></tr>
                </tbody></table>
            <br>
            <br>
            <table width="100%">
                <tbody><tr><td align="left">THIS IS TO CERTIFY THAT ALL VEHICLES INCLUDED IN THIS CONTAINER HAVE BEEN COMPLETELY DRAINED OF FUEL AND RUN UNTIL STALLED. BATTERIES ARE DISCONNECTED AND TAPED BACK AND ARE PROPERLY SECURED TO PREVENT MOVEMENT IN ANY DIRECTION. NO UNDECLARED HAZARDOUS MATERIALS ARE CONTAINERIZED, SECURED TO, OR STOWED IN THIS VEHICLE.<br>WITH THE ABOVE STATEMENT, THESE VEHICLES ARE CLASSIFIED AS NON-HAZARDOUS.</td>
                    </tr></tbody></table>
            <br>
            <table width="100%">
                <tbody><tr>
                        <td width="11%">SIGNED</td>
                        <td width="46%" align="center" class="line_under">

                        </td>
                        <td width="8%">DATE</td>
                        <td width="35%" align="center" class="line_under"></td>
                    </tr>

                </tbody></table>
        </div>



    </div><grammarly-btn><div class="_1BN1N Kzi1t _1v-Lt _3MyEI MoE_1 _2DJZN" style="z-index: 2; transform: translate(933px, 545px);"><div class="_1HjH7"><div title="Found 1 error in text" class="_3qe6h">1</div></div></div></grammarly-btn>
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
<!--</div>-->