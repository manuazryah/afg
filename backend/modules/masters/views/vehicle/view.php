<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
//use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Vehicle */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
Modal::begin([
    'header' => '',
    'id' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div id = 'modalContent'></div>";
Modal::end();
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">

                <div class="panel-body"><div class="export-view">
                        <p>
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Vehicle</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::button('Vehicle Condition Report', ['value' => Url::to(['vehicle-condition-report', 'id' => $model->id]), 'class' => 'btn btn-warning  btn-icon btn-icon-standalone modalButton']); ?>
                            <?= Html::a('Add New', ['create'], ['class' => 'btn btn-primary']) ?>
                        </p>

                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <h4>Vehicle Informtion</h4>
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>COMPANY NAME</th>
                                        <?php $company = \common\models\Customers::findOne($model->towingInfos->customers_id); ?>
                                        <td><?= $company->name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>HAT</th>
                                        <td><?= $model->hat ?></td>
                                    </tr>
                                    <tr>
                                        <th>YEAR</th>
                                        <td><?= $model->year ?></td>
                                    </tr>
                                    <tr>
                                        <th>MAKE</th>
                                        <td><?= $model->make ?></td>
                                    </tr>
                                    <tr>
                                        <th>MODEL</th>
                                        <td><?= $model->model ?></td>
                                    </tr>
                                    <tr>
                                        <th>VIN</th>
                                        <td><?= $model->vin ?></td>
                                    </tr>
                                    <tr>
                                        <th>COLOR</th>
                                        <td><?= $model->color ?></td>
                                    </tr>
                                    <tr>
                                        <th>KEYS</th>
                                        <td><?= $model->towingInfos->keys ?></td>
                                    </tr>
                                    <tr>
                                        <th>WEIGHT</th>
                                        <td><?= $model->weight ?></td>
                                    </tr>
                                    <tr>
                                        <th>VALUE</th>
                                        <td><?= $model->value ?></td>
                                    </tr>
                                    <tr>
                                        <th>BUYER NO</th>
                                        <td><?= $model->buyer_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>LOT NUMBER</th>
                                        <td><?= $model->lot_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>STORAGE AMOUNT</th>
                                        <td><?= $model->storage_amount ?></td>
                                    </tr>
                                    <tr>
                                        <th>CHECK NO</th>
                                        <td><?= $model->cheque_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>ADD. CHGS</th>
                                        <td><?= $model->add_chgs ?></td>
                                    </tr>


                                </table>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <h4>Towing Request Informtion</h4>
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>CONDITION</th>
                                        <td><?= $model->towingInfos->condition ?></td>
                                    </tr>
                                    <tr>
                                        <th>DAMAGED</th>
                                        <td><?= $model->towingInfos->damaged ?></td>
                                    </tr>
                                    <tr>
                                        <th>PICTURES</th>
                                        <td><?= $model->towingInfos->pictures ?></td>
                                    </tr>
                                    <tr>
                                        <th>TOWED</th>
                                        <td><?= $model->towingInfos->towed ?></td>
                                    </tr>

                                    <tr>
                                        <th>TOWED AMOUNT</th>
                                        <td><?= $model->towed_amount ?></td>
                                    </tr>
                                    <tr>
                                        <th>TOWING REQUEST DATE</th>
                                        <td><?= date('Y-m-d', strtotime($model->titleInfos->towing_request_date)) ?></td>
                                    </tr>

                                    <tr>
                                        <th>DELIVER DATE</th>
                                        <td><?= date('Y-m-d', strtotime($model->titleInfos->deliver_date)) ?></td>
                                    </tr>
                                    <tr>
                                        <th>NOTE</th>
                                        <td><?= $model->titleInfos->note ?></td>
                                    </tr>


                                </table>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <h4>Title Informtion</h4>
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>TITLE TYPE</th>

                                        <td><?php
                                        if ($model->titleInfos->title_type == 1) {
                                            echo 'EXPORTABLE';
                                        } else if ($model->titleInfos->title_type == 2) {
                                            echo 'PENDING';
                                        } else if ($model->titleInfos->title_type == 3) {
                                            echo 'BOS';
                                        } else if ($model->titleInfos->title_type == 4) {
                                            echo 'LIEN';
                                        }
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <th>TITLE</th>
                                        <td>
                                            <?php
                                            if ($model->titleInfos->title == 1) {
                                                echo 'Yes';
                                            } else if ($model->titleInfos->title == 2) {
                                                echo 'No';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>TITLE AMOUNT</th>
                                        <td><?= $model->title_amount ?></td>
                                    </tr>
                                    <tr>
                                        <th>TITLE RECEIVED DATE</th>
                                        <td><?= date('Y-m-d', strtotime($model->titleInfos->title_received)) ?></td>
                                    </tr>
                                    <tr>
                                        <th>TITLE NO</th>
                                        <td><?= $model->titleInfos->title_no ?></td>
                                    </tr>
                                    <tr>
                                        <th>TITLE STATE</th>
                                        <td><?= $model->titleInfos->title_state ?></td>
                                    </tr>

                                </table>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4>Vehicle Images Gallery</h4>
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

                                            <div class = "col-md-3 img-box" id="<?= $k; ?>">
                                                <div class="news-img">
                                                    <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/vehicle/' . $model->id . '/' . end($arry) ?>">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.modalButton', function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr("value"));
    });
</script>

