<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VehicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= Html::a('<i class="fa fa-list"></i><span> Create Vehicle</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'hat',
                            [
                                'attribute' => 'requested_date',
                                // 'value' => 'titleInfos.towing_request_date',
                                'value' => function($model) {
                                    return date('Y-m-d', strtotime($model->titleInfos->towing_request_date));
                                }
                            ],
                            [
                                'attribute' => 'dely_date',
                                'value' => function($model) {
                                    return date('Y-m-d', strtotime($model->titleInfos->deliver_date));
                                }
                            ],
                            'year',
                            'make',
                            'model',
                            'vin',
                            [
                                'attribute' => 'keys',
                                'value' => function($model) {
                                    return $model->towingInfos->keys;
                                }
                            ],
                            'lot_no',
                            [
                                'attribute' => 'status_id',
                                'value' => function($model) {
                                    if($model->status_id==1){
                                        return 'ON HAND';
                                    } else if($model->status_id==2){
                                        return 'ON THE WAY';
                                    }else if($model->status_id==3){
                                        return 'SHIPPED';
                                    }else if($model->status_id==4){
                                        return 'PICKED UP';
                                    }
                                }
                            ],
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{update}',
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


