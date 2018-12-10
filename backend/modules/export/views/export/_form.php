<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\Consignee;
use common\models\Vehicle;

/* @var $this yii\web\View */
/* @var $model common\models\Export */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="export-form form-inline">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?php
            $vehicles = ArrayHelper::map(Vehicle::find()->all(), 'id', 'vin');
            if (!$model->isNewRecord) {
                $model->vehicle_id = explode(',', $model->vehicle_id);
            }
            ?>
            <?php
            echo $form->field($model, 'vehicle_id')->widget(Select2::classname(), [
                'data' => $vehicles,
                'language' => 'en',
                'options' => ['placeholder' => 'Choose Vehicle Vin', 'multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <table class="table table-bordered<?= $model->isNewRecord ? 'hide' : '' ?>" id="body_vehicle">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Color</th>
                        <th>VIN</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$model->isNewRecord) {
                        foreach ($model->vehicle_id as $vh) {
                            $vehicle_detail = Vehicle::findone($vh);
                            if ($vehicle_detail) {
                                ?>
                                <tr>
                                    <td><?= $vehicle_detail->year ?></td>
                                    <td><?= $vehicle_detail->make ?></td>
                                    <td><?= $vehicle_detail->model ?></td>
                                    <td><?= $vehicle_detail->color ?></td>
                                    <td><?= $vehicle_detail->vin ?></td>
                                    <td><?= $vehicle_detail->status_id ?></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

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
            <?= $form->field($model, 'customer_id')->textInput(['readonly' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'cust_address')->textInput(['readonly' => true]) ?>
        </div>
    </div>
    <hr class="horizontal-line">
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
            <?= $form->field($model, 'oti_no')->textInput(['maxlength' => true]) ?>
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
    <hr class="horizontal-line">
    <div class="row">
        <h4 class="frm-sub-title">Additional Info </h4>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'special_instruction')->textarea(['rows' => 4]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'additional_info_container_type')->dropDownList(['' => '--Select--', '1' => "1 X 20'HC DRY VAN", '2' => "1 X 45'HC DRY VAN", '3' => "1 X 40'HC DRY VAN"]) ?>
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
    <hr class="horizontal-line">
    <div class="row">
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
    <hr class="horizontal-line">
    <div class="row">
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
            <?php
            if (!$model->isNewRecord) {
                $model->exporter_dob = date('d-m-Y', strtotime($model->exporter_dob));
            } else {
                $model->exporter_dob = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'exporter_dob')->widget(DatePicker::classname(), [
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
                $model->ultimate_consignee_dob = date('d-m-Y', strtotime($model->ultimate_consignee_dob));
            } else {
                $model->ultimate_consignee_dob = date('d-m-Y');
            }
            ?>
            <?=
            $form->field($model, 'ultimate_consignee_dob')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php $consignee = ArrayHelper::map(common\models\Consignee::findAll(['status' => 1]), 'id', 'consignee_name'); ?>
            <?php
            echo $form->field($model, 'conignee_id')->widget(Select2::classname(), [
                'data' => $consignee,
                'language' => 'en',
                'options' => ['placeholder' => 'Choose Consignee'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php $notifyconsignee = ArrayHelper::map(common\models\Consignee::findAll(['status' => 1]), 'id', 'consignee_name'); ?>
            <?php
            echo $form->field($model, 'notify_party')->widget(Select2::classname(), [
                'data' => $notifyconsignee,
                'language' => 'en',
                'options' => ['placeholder' => 'Choose Consignee'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php $menifest_consignee = ArrayHelper::map(common\models\Consignee::findAll(['status' => 1]), 'id', 'consignee_name'); ?>
            <?php
            echo $form->field($model, 'menifest_consignee')->widget(Select2::classname(), [
                'data' => $menifest_consignee,
                'language' => 'en',
                'options' => ['placeholder' => 'Choose Consignee'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
    <hr class="horizontal-line">
    <div class="row">
        <h4 class="frm-sub-title">Container Images</h4>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'invoice')->fileInput() ?>
            <?php
            if (isset($model->invoice) && $model->invoice != '') {
                if ($model->invoice != 'pdf') {
                    ?>
                    <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/export/invoice/' . $model->id . '/' . $model->id . '.' . $model->invoice ?>" width="200" >
                <?php } else { ?>
                    <a target="_blank" href="<?= Yii::$app->homeUrl . '../uploads/export/invoice/' . $model->id . '/' . $model->id . '.' . $model->invoice ?>">Click here to view invoice</a>  

                    <?php
                }
            }
            ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'container_images[]')->fileInput(['multiple' => true]) ?>
        </div>
    </div>

    <div class="row">
        <?php
        $path = Yii::getAlias('@paths') . '/export/container/' . $model->id;
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
                            <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/export/container/' . $model->id . '/' . end($arry) ?>">
                            <?= Html::a('<i class="fa fa-remove"></i>', ['/export/export/remove', 'file' => end($arry), 'id' => $model->id], ['class' => 'gal-img-remove']) ?>
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
    $(document).ready(function () {
        $('#export-vehicle_id').change(function () {
            var vin = $(this).val();
            $("#body_vehicle tbody").empty();
            $.ajax({
                type: 'POST',
                cache: false,
                data: {vin: vin},
                url: '<?= Yii::$app->homeUrl ?>masters/vehicle/vehicle-details',
                success: function (data) {
                    var $data = JSON.parse(data);
                    if ($data.msg === 'success') {
                        $("#body_vehicle tbody").append($data.row);
                        $('#body_vehicle').removeClass('hide');
                    } else {
                        $('#body_vehicle').addClass('hide');
                    }
                }
            });
        });
        $('#export-customer').change(function () {
            $.ajax({
                type: 'POST',
                cache: false,
                data: {customer: $(this).val()},
                url: '<?= Yii::$app->homeUrl ?>masters/vehicle/customer-details',
                success: function (data) {
                    var $data = JSON.parse(data);
                    $('#export-customer_id').val($data.customer_id);
                    $('#export-cust_address').val($data.customer_address);
                }
            });
        });
    });

</script>