<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>
    <div class="row">
        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'global_search')->textInput(['placeholder' => 'CUSTOMER ID,CUSTOMER NAME,COMPANY NAME,CITY,STATE,COUNTRY,TAX ID'])->label('GLOBAL SEARCH') ?>
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
