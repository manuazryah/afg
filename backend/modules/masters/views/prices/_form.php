<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Prices */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="prices-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'file')->fileInput()->label('Upload File [Pdf Only]'); ?>
            <?php
            if ($model->isNewRecord)
                echo "";
            else {
                if (!empty($model->file)) {
                    ?>
                    <embed src="<?= Yii::$app->homeUrl . '../uploads/prices/' . $model->id . '/price.' . $model->file ?>" width="250px" height="200px" />

                    <?php
                }
            }
            ?>

        </div><div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
            <?=
            $form->field($model, 'month')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                        'autoclose' => true,
                        'startView'=>'year',
                        'minViewMode'=>'months',
                        'format' => 'M-yyyy'
                    ]
            ]);
            ?>

        </div><div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    <?= $form->field($model, 'pricing_type')->dropDownList(['1' => 'Towing Price', '2' => 'Ocean Freight Price']) ?>

        </div>
    </div>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    <?= $form->field($model, 'status')->dropDownList(['1' => 'Active', '2' => 'In Active']) ?>

        </div><div class='col-md-4 col-sm-6 col-xs-12 left_padd'>   <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        </div>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12'>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'float:right;']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
