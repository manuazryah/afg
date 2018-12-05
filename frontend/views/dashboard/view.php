<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\StaffInfo;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if (!isset($title))
    $title = 'AFG';
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .th-background{
        background-color: #caf0ee;
        border-color: #caf0ee;
        color: #313534;
    }
</style>

<div class="service-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?= common\widgets\Alert::widget()?>
                    <p>
                        <?= Html::a('<i class="fa fa-list"></i><span> Manage Inventory</span>', ['home'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    </p>
                    <!--<div class="table-responsive" >-->
                    <div class="form-group">
                        <?php
                        $path = Yii::getAlias('@paths') . '/vehicle/' . $model->id;
                        if (count(glob("{$path}/*")) > 0) {
                            $k = 0;
                            foreach (glob("{$path}/*") as $file) {
                                $k++;
                                $arry = explode('/', $file);
                                $img_nmee = end($arry);

                                $img_nmees = explode('.', $img_nmee);
                                if ($img_nmees['1'] != '') {
                                    ?>
                                    <img class="col-lg-4" width="240" src="<?= Yii::$app->homeUrl . 'uploads/vehicle/' . $model->id . '/' . end($arry) ?>" alt="1">
                                    <?php
                                }
                            }
                        }
                        ?>

                    </div>
                    <div style="clear:both"></div>
                    <table width="59%" class="riyti table" style="margin-top:20px">

                        <tbody>
                            <tr>
                                <th class="ui-widget-header style-primary-bright small-padding th-background" colspan="2">Vehicle Info</th>
                                <th class="ui-widget-header style-primary-light small-padding th-background" colspan="2">Title Info</th>
                            </tr>

                            <tr>
                                <td><b>Year</b></td>   
                                <td><?= $model->year ?></td>  
                                <td><b>Title Received</b></td>   
                                <td>Yes</td> 
                            </tr>

                            <tr>
                                <td><b>Make</b></td>   
                                <td><?= $model->make ?></td>  
                                <td><b>Title Received Date</b></td>   
                                <td><?= date('Y-m-d', strtotime($model->titleInfos->title_received)) ?></td> 
                            </tr>

                            <tr>
                                <td><b>Model</b></td>   
                                <td><?= $model->model ?></td>  
                                <td><b>Title Number</b></td>   
                                <td><?= $model->titleInfos->title_no ?></td> 
                            </tr>

                            <tr>
                                <td><b>Color</b></td>   
                                <td><?= $model->color ?></td>  
                                <td><b>Title State</b></td>   
                                <td><?= $model->titleInfos->title_state ?></td> 
                            </tr>

                            <tr>
                                <td><b>VIN</b></td>   
                                <td><?= $model->vin ?></td>  
                                <th class="ui-widget-header style-primary-bright th-background" colspan="2">Tow Info</th>   
                            </tr>

                            <tr>
                                <td><b>Date Received</b></td>   
                                <td>2017-12-28</td>  
                                <td>Towed</td>   
                                <td><?= $model->towingInfos->towed ?></td> 
                            </tr>

                            <tr>
                                <td><b>Age</b></td>   
                                <td></td>  
                                <td><b>Towed From</b></td>   
                                <td><?= $model->towed_from ?></td>  
                            </tr>

                            <tr>
                                <th class="ui-widget-header style-primary-bright small-padding th-background" colspan="2"> Charges</th>   
                                <td><b>Tow Amount</b></td>   
                                <td><?= $model->towed_amount ?></td>  
                            </tr>

                            <tr>
                                <td><b> Storage</b></td>   
                                <td><?= $model->storage_amount ?></td>  
                                <td><b>Tow Storage</b></td>   
                                <td><?= $model->title_amount ?></td> 
                            </tr>

                            <tr>
                                <td><b>Additional Charges</b></td>   
                                <td><?= $model->add_chgs ?></td>  
                                <td><b>Lot Number</b></td>   
                                <td><?= $model->lot_no ?></td> 
                            </tr>

                            <tr>
                                <th class="ui-widget-header style-primary-bright small-padding th-background" colspan="2">Short Export Info</th>   
                                <th class="ui-widget-header style-primary-light small-padding th-background" colspan="2">Vehicle Condition</th>   
                            </tr>

                            <tr>
                                <td><b>Status</b></td>   
                                <td><?php
                                    if ($model->status_id == 1) {
                                        echo 'ON HAND';
                                    } else if ($model->status_id == 2) {
                                        echo 'ON THE WAY';
                                    } else if ($model->status_id == 3) {
                                        echo 'SHIPPED';
                                    } else if ($model->status_id == 4) {
                                        echo 'PICKED UP';
                                    }
                                    ?></td>  
                                <td><b>Damage</b></td>   
                                <td><?= $model->towingInfos->damaged ?></td> 
                            </tr>

                            <tr>
                                <td><b>Export Date</b></td>   
                                <td>2017-02-13</td>  
                                <td><b>Condition</b></td>   
                                <td><?= $model->towingInfos->condition ?></td> 
                            </tr>

                            <tr>
                                <td><b>Destination</b></td>   
                                <td>JEBEL ALI, UAE</td>  
                                <td><b>Keys</b></td>   
                                <td><?= $model->towingInfos->keys ?></td> 
                            </tr>

                            <tr>
                                <td><b>Container Number</b></td>   
                                <td>MRKU5245247</td>  
                                <td><b>Location</b></td>   
                                <td></td> 
                            </tr>

                        </tbody>
                    </table>

                    <div class="row"> 
                        <div class="col-md-12">
                            <a target="_blank" href="<?= Yii::$app->homeUrl ?>dashboard/vehicle-condition-reportpdf?id=<?= $model->id ?>"><span class="btn btn-primary dow_c"><i class="fa fa-download"></i> Download Condition Report</span></a> 
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-md-12">
                            <?php $form = ActiveForm::begin(); ?>
                            <?= $form->field($customer_notes, 'vehicle_id')->hiddenInput(['value' => $model->id])->label(false); ?>
                            <?=
                            $form->field($customer_notes, 'notes', ['options' => ['class' => 'form-group']])->widget(CKEditor::className(), [
                                'options' => ['rows' => 2],
                                'preset' => 'custom',
                            ])
                            ?>
                            <?= Html::submitButton('Save Notes', ['class' => 'btn btn-success']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</div>

