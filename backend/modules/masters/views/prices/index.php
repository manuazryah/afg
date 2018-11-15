<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PricesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prices-index">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= Html::a('<i class="fa fa-list"></i><span> Create Prices</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                            'id',
                            [
                                'attribute' => 'file',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->file))
                                        $img = '<img width="120px" src="' . Yii::$app->homeUrl . 'img/pdf-download.gif"/>';
                                 return  Html::a($img, ['/../uploads/prices/'.$data->id.'/price.'.$data->file],['target'=>'_blank']);
                                },
                            ],
                            'month',
//                            'pricing_type',
                            [
                                'attribute' => 'pricing_type',
                                'value' => function($model, $key, $index, $column) {
                                    if ($model->pricing_type == '1') {
                                        return 'Towing Price';
                                    } elseif ($model->pricing_type == '2') {
                                        return 'Ocean Freight Price';
                                    }
                                },
                                'filter' => [1 => 'Towing Price', 2 => 'Ocean Freight Price'],
                            ],
                            [
                                'attribute' => 'status',
                                'value' => function($model, $key, $index, $column) {
                                    if ($model->status == '1') {
                                        return 'Active';
                                    } elseif ($model->status == '2') {
                                        return 'In Active';
                                    }
                                },
                                'filter' => [1 => 'Active', 2 => 'In Active'],
                            ],
                            //'description:ntext',
                            //'CB',
                            //'UB',
                            //'DOC',
                            //'DOU',
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{update}{delete}',
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
