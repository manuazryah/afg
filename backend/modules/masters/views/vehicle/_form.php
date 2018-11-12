<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Vehicle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <label>CUSTOMER INFO</label>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php $customers = ArrayHelper::map(common\models\Customers::findAll(['status' => 1]), 'id', 'name'); ?>
            <?php
            if(!$vehicle_towing->isNewRecord){
               $customer= common\models\Customers::findOne($vehicle_towing->customers_id); 
               $vehicle_towing->customer_name=$customer->id;
            }
            
            echo $form->field($vehicle_towing, 'customer_name')->widget(Select2::classname(), [
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
            <?php
            if(!$vehicle_towing->isNewRecord){
               $customer= common\models\Customers::findOne($vehicle_towing->customers_id); 
               $vehicle_towing->customers_id=$customer->customer_id;
            }
            ?>
            <?= $form->field($vehicle_towing, 'customers_id')->textInput(['maxlength' => true,'readonly'=>true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_towing, 'customer_address')->textInput(['maxlength' => true,'readonly'=>true]) ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <label>TOWING INFO</label>
        </div>
    </div>


    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_towing, 'condition')->dropDownList(['Non-OP' => 'Non-OP', 'Operable' => 'Operable',], ['prompt' => '']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_towing, 'damaged')->dropDownList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => '']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_towing, 'pictures')->dropDownList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => '']) ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_towing, 'towed')->dropDownList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => '']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_towing, 'keys')->dropDownList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => '']) ?>
        </div>

    </div>
    
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <label>TITLE INFO</label>
        </div>
    </div>
    
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_title, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_title, 'title_received')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_title, 'title_no')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_title, 'title_state')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
             <?php
            if (!$vehicle_title->isNewRecord) {
                $vehicle_title->towing_request_date = date('d-m-Y', strtotime($vehicle_title->towing_request_date));
            } else {
                $vehicle_title->towing_request_date = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($vehicle_title, 'towing_request_date')->widget(DatePicker::classname(), [
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
            if (!$vehicle_title->isNewRecord) {
                $vehicle_title->deliver_date = date('d-m-Y', strtotime($vehicle_title->deliver_date));
            } else {
                $vehicle_title->deliver_date = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($vehicle_title, 'deliver_date')->widget(DatePicker::classname(), [
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
        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_title, 'note')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <label>VEHICLE INFO</label>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'make')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'hat')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'buyer_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'towed_from')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'lot_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'towed_amount')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'storage_amount')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'cheque_no')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'add_chgs')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'vin')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'status_id')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'year')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <label>CHECK OPTIONS INCLUDED ON THE VEHICLE</label>
        </div>
    </div>
    
    <div class="row vehicle-check-options">
        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_check_options, 'keys')->checkbox(['0' => 'Disabled', '1' => 'Active']); ?>
        </div>
        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_check_options, 'cd_changer')->checkbox(['0' => 'Disabled', '1' => 'Active']); ?>
        </div>
        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_check_options, 'gps_navigation_system')->checkbox(['0' => 'Disabled', '1' => 'Active']); ?>
        </div>
        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_check_options, 'spare_tire_jack')->checkbox(['0' => 'Disabled', '1' => 'Active']); ?>
        </div>
        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_check_options, 'wheel_covers')->checkbox(['0' => 'Disabled', '1' => 'Active']); ?>
        </div>
        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_check_options, 'radio')->checkbox(['0' => 'Disabled', '1' => 'Active']); ?>
        </div>
    </div>


    <div class="row vehicle-check-options">
        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_check_options, 'cd_player')->checkbox(['0' => 'Disabled', '1' => 'Active']); ?>
        </div>
        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_check_options, 'mirror')->checkbox(['0' => 'Disabled', '1' => 'Active']); ?>
        </div>
        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_check_options, 'speaker')->checkbox(['0' => 'Disabled', '1' => 'Active']); ?>
        </div>
        <div class='col-md-2 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_check_options, 'other')->checkbox(['0' => 'Disabled', '1' => 'Active']); ?>
        </div>

    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <label>CONDITION OF VEHICLE</label>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'front_windshield')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'bonnet')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'bonnet')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'grill')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'front_bumber')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'front_head_light')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'rear_windshield')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'truck_door')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'rear_bumber')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'rear_bumber_support')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'tail_lamp')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'front_left_fender')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'left_front_door')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'left_rear_door')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'left_rear_fender')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'piller')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'roof')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'right_rear_fender')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'right_rear_door')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'right_front_door')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'front_right_fender')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($vehicle_condition, 'front_tyers')->textInput() ?>
        </div>
    </div>
    
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'attachments[]')->fileInput(['multiple'=>true]) ?>
        </div>
    </div>
    
    
    <div class="row">
        <?php
        $path = Yii::getAlias('@paths') . '/vehicle/'.$model->id;
        if (count(glob("{$path}/*")) > 0) {
            $k = 0;
            foreach (glob("{$path}/*") as $file) {
                $k++;
                $arry = explode('/', $file);
                $img_nmee = end($arry);

                $img_nmees = explode('.', $img_nmee);
                if ($img_nmees['1'] != '') {
                    ?>

                    <div class = "col-md-3 img-box" id="<?= $k; ?>">
                        <div class="news-img">
                            <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/vehicle/'.$model->id.'/' . end($arry) ?>">
                            <?= Html::a('<i class="fa fa-remove"></i>', ['/masters/vehicle/remove', 'file' => end($arry), 'id' => $model->id], ['class' => 'gal-img-remove']) ?>
                        </div> 
                    </div>


                    <?php
                }
                if ($k % 4 == 0) {
                    ?>
                    <div class="clearfix"></div>
                    <?php
                }
            }
        }
        ?>
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


<script>
    $(document).ready(function(){
        $('#vehicletowinginfo-customer_name').change(function(){
             $.ajax({
                        type: 'POST',
                        cache: false,
                        data: {customer: $(this).val()},
                        url: '<?= Yii::$app->homeUrl ?>masters/vehicle/customer-details',
                        success: function (data) {
                         var $data = JSON.parse(data);
                         $('#vehicletowinginfo-customers_id').val($data.customer_id);
                         $('#vehicletowinginfo-customer_address').val($data.customer_address);
                        }
                    });
        });
    });
    
    </script>