<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Vehicle Notes</h4>
</div>
<div class="modal-body">
    <div class="row"> 
        <?php $form = ActiveForm::begin(['id' => 'add-notes-here']); ?>

        <?= $form->field($model, 'vehicle_id')->hiddenInput(['value' => $vehicle_id])->label(FALSE) ?>
        <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'notes')->textArea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12'>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-success note-submit', 'style' => 'float:right;']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <div class="clearfix"></div>
    <div class="row vehicle-previous-notes">
        <ul class="vehicle-previous-notes-ul"> 
            <?php foreach ($previous_notes as $p_notes) { ?>
                <li class="vehicle-previous-notes-li">
                    <div class="vehicle-previous-notes-div">
                        <p><?= $p_notes->notes ?></p>
                        <?php
                        if ($p_notes->status == 2) {
                            $added_user = common\models\AdminUsers::findOne($p_notes->CB);
                            ?>
                            <p><?= Html::a('<b>' . $added_user->name . '</b>', ['/admin/admin-users/update', 'id' => $added_user->id], ['target' => '_blank']) ?></p>
                            <?php
                        } else if ($p_notes->status == 1) {
                            $added_user = \common\models\Customers::findOne($p_notes->CB);
                            ?>
                            <p><?= Html::a('<b>' . $added_user->name . '</b>', ['/masters/customersupdate', 'id' => $added_user->id], ['target' => '_blank']) ?></p>
                        <?php } ?>

                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>

</div>

