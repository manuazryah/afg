<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ExportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="export-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>
    <div class="row">
        <div class='col-md-9 col-sm-9 col-xs-12 left_padd'>
            <?= $form->field($model, 'export_global_search')->textInput(['placeholder' => 'Broker Name,Booking Number,Xtn Number,Seal Number,Container Number,Voyage'])->label('EXPORT GLOBAL SEARCH') ?>
        </div>
        <div class='col-md-3 col-sm-3 col-xs-12 left_padd'>
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-warning mrg-top-23']) ?>
                <?= Html::a('Reset', ['index'], ['class' => 'btn btn-default mrg-top-23']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
