<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'make') ?>

    <?= $form->field($model, 'hat') ?>

    <?= $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'value') ?>

    <?php // echo $form->field($model, 'buyer_no') ?>

    <?php // echo $form->field($model, 'towed_from') ?>

    <?php // echo $form->field($model, 'lot_no') ?>

    <?php // echo $form->field($model, 'towed_amount') ?>

    <?php // echo $form->field($model, 'storage_amount') ?>

    <?php // echo $form->field($model, 'cheque_no') ?>

    <?php // echo $form->field($model, 'add_chgs') ?>

    <?php // echo $form->field($model, 'vin') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'year') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
