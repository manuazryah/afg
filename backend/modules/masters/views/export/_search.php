<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ExportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="export-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'cust_address') ?>

    <?= $form->field($model, 'export_date') ?>

    <?php // echo $form->field($model, 'loding_date') ?>

    <?php // echo $form->field($model, 'broker_name') ?>

    <?php // echo $form->field($model, 'booking_no') ?>

    <?php // echo $form->field($model, 'ETA') ?>

    <?php // echo $form->field($model, 'ar_no') ?>

    <?php // echo $form->field($model, 'xtn_no') ?>

    <?php // echo $form->field($model, 'seal_no') ?>

    <?php // echo $form->field($model, 'container_no') ?>

    <?php // echo $form->field($model, 'cut_off') ?>

    <?php // echo $form->field($model, 'vessel') ?>

    <?php // echo $form->field($model, 'voyage') ?>

    <?php // echo $form->field($model, 'terminal') ?>

    <?php // echo $form->field($model, 'stremship_line') ?>

    <?php // echo $form->field($model, 'destination') ?>

    <?php // echo $form->field($model, 'ITN') ?>

    <?php // echo $form->field($model, 'contact_details') ?>

    <?php // echo $form->field($model, 'special_instruction') ?>

    <?php // echo $form->field($model, 'port_of_loading') ?>

    <?php // echo $form->field($model, 'port_of_discharge') ?>

    <?php // echo $form->field($model, 'bol_note') ?>

    <?php // echo $form->field($model, 'bl_or_awb_number') ?>

    <?php // echo $form->field($model, 'export_referance') ?>

    <?php // echo $form->field($model, 'forwading_agent') ?>

    <?php // echo $form->field($model, 'domestic_routing_instructions') ?>

    <?php // echo $form->field($model, 'pre_carraiage_by') ?>

    <?php // echo $form->field($model, 'place_of_recipt_by_pre_carrrier') ?>

    <?php // echo $form->field($model, 'final_destintion') ?>

    <?php // echo $form->field($model, 'loading_terminal') ?>

    <?php // echo $form->field($model, 'container_type') ?>

    <?php // echo $form->field($model, 'number_of_packages') ?>

    <?php // echo $form->field($model, 'by') ?>

    <?php // echo $form->field($model, 'exporting_carruer') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'auto_recieving_date') ?>

    <?php // echo $form->field($model, 'auto_cut_off') ?>

    <?php // echo $form->field($model, 'vessel_cut_off') ?>

    <?php // echo $form->field($model, 'sale_date') ?>

    <?php // echo $form->field($model, 'vehicle_location') ?>

    <?php // echo $form->field($model, 'exporter_id') ?>

    <?php // echo $form->field($model, 'exporter_type_issue') ?>

    <?php // echo $form->field($model, 'transpotation_value') ?>

    <?php // echo $form->field($model, 'exporter_dob') ?>

    <?php // echo $form->field($model, 'ultimate_consignee_dob') ?>

    <?php // echo $form->field($model, 'conignee_id') ?>

    <?php // echo $form->field($model, 'notify_party') ?>

    <?php // echo $form->field($model, 'menifest_consignee') ?>

    <?php // echo $form->field($model, 'invoice') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'CB') ?>

    <?php // echo $form->field($model, 'UB') ?>

    <?php // echo $form->field($model, 'DOC') ?>

    <?php // echo $form->field($model, 'DOU') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
