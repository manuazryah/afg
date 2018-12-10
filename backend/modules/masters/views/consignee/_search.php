<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\ConsigneeSearch */
/* @var $form yii\widgets\ActiveForm */
$customers = ArrayHelper::map(common\models\Customers::findAll(['status' => 1]), 'id', 'name');
?>

<div class="consignee-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'consignee_global_search')->textInput(['placeholder' => 'CONSIGNEE NAME, CITY, STATE, COUNTRY']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'customers_id')->widget(Select2::classname(), [
                'data' => $customers,
                'language' => 'de',
                'options' => ['placeholder' => 'Select a Customer ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
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
