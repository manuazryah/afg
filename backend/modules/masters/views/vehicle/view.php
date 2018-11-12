<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vehicle */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">

                <div class="panel-body"><div class="vehicle-view">
                        <p>
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Vehicle</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            
                        </p>

                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'model',
                                'make',
                                'hat',
                                'weight',
                                'value',
                                'buyer_no',
                                'towed_from',
                                'lot_no',
                                'towed_amount',
                                'storage_amount',
                                'cheque_no',
                                'add_chgs',
                                'vin',
                                'created_at',
                                'updated_at',
                                'created_by',
                                'status_id',
                                'year',
                            ],
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


