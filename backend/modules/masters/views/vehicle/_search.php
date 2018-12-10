<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-search">
    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>
    <div class="row">
        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'vehicle_global_search')->textInput(['placeholder' => 'CUSTOMER NAME,VIN,LOT NO,MODEL,MAKE,COLOR'])->label('VEHICLE GLOBAL SEARCH') ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-warning mrg-top-23']) ?>
                <?= Html::a('Reset', ['index'], ['class' => 'btn btn-default mrg-top-23']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
