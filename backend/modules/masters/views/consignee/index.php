<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ConsigneeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consignees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consignee-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= Html::a('<i class="fa fa-list"></i><span> Create Consignee</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    <?= common\widgets\Alert::widget() ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'customers_id',
                                'format' => 'raw',
                                'value' => function($model) {
                                    $customer = common\models\Customers::findOne($model->customers_id);
                                    return \yii\helpers\Html::a($customer->name, ['/masters/customers/view', 'id' => $model->customers_id], ['target' => '_blank']);
                                }
                            ],
                            'consignee_name',
//                            'consignee_id',
                            'address1',
                            'city',
                            // 'country',
                            // 'phone',
                            // 'address2',
                            // 'state',
                            // 'zipcode',
                            // 'customers_id',
                            // 'status',
                            // 'CB',
                            // 'UB',
                            // 'DOC',
                            // 'DOU',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view}{update}'
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


