<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Export */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="export-form form-inline">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <h4 class="frm-sub-title">Customer Info </h4>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php $customers = ArrayHelper::map(common\models\Customers::findAll(['status' => 1]), 'id', 'name'); ?>
            <?php
            echo $form->field($model, 'customer')->widget(Select2::classname(), [
                'data' => $customers,
                'language' => 'en',
                'options' => ['placeholder' => 'Choose Customer'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'customer_id')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'cust_address')->textInput(['readonly' => true]) ?>
        </div>
    </div>
    <div class="row">
        <h4 class="frm-sub-title">Export Info </h4>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $model->export_date = date('d-m-Y', strtotime($model->export_date));
            } else {
                $model->export_date = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'export_date')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $model->loding_date = date('d-m-Y', strtotime($model->loding_date));
            } else {
                $model->loding_date = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'loding_date')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'broker_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'booking_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $model->ETA = date('d-m-Y', strtotime($model->ETA));
            } else {
                $model->ETA = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'ETA')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'ar_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'xtn_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'seal_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'container_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $model->cut_off = date('d-m-Y', strtotime($model->cut_off));
            } else {
                $model->cut_off = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'cut_off')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'vessel')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'voyage')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'terminal')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'stremship_line')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'ITN')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-8 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'contact_details')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <hr>
        <h4 class="frm-sub-title">Additional Info </h4>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'special_instruction')->textarea(['rows' => 4]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'container_type')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'port_of_loading')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'port_of_discharge')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'bol_note')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <hr>
        <h4 class="frm-sub-title">Dock Receipt - More Info </h4>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'bl_or_awb_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'export_referance')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'forwading_agent')->textarea(['rows' => 3]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'domestic_routing_instructions')->textarea(['rows' => 3]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'pre_carraiage_by')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'place_of_recipt_by_pre_carrrier')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'final_destintion')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'loading_terminal')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'container_type')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'number_of_packages')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'by')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'exporting_carruer')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $model->date = date('d-m-Y', strtotime($model->date));
            } else {
                $model->date = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'date')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $model->auto_recieving_date = date('d-m-Y', strtotime($model->auto_recieving_date));
            } else {
                $model->auto_recieving_date = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'auto_recieving_date')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $model->auto_cut_off = date('d-m-Y', strtotime($model->auto_cut_off));
            } else {
                $model->auto_cut_off = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'auto_cut_off')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $model->vessel_cut_off = date('d-m-Y', strtotime($model->vessel_cut_off));
            } else {
                $model->vessel_cut_off = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'vessel_cut_off')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $model->sale_date = date('d-m-Y', strtotime($model->sale_date));
            } else {
                $model->sale_date = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'sale_date')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <hr>
        <h4 class="frm-sub-title">Houston Customs Cover Letter </h4>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'vehicle_location')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'exporter_id')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'exporter_type_issue')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'transpotation_value')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'exporter_dob')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'ultimate_consignee_dob')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'conignee_id')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'notify_party')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'menifest_consignee')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <hr>
        <h4 class="frm-sub-title">Container Images</h4>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'invoice')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12'>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success', 'style' => 'float:right;']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
