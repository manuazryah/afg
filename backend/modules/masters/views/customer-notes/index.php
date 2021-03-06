<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustomerNotesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Notes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-notes-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                    <?=  Html::a('<i class="fa fa-list"></i><span> Create Customer Notes</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                                                            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                                    'id',
            'customer_id',
            'vehicle_id',
            'notes:ntext',
            'status',
            // 'CB',
            // 'UB',
            // 'DOC',
            // 'DOU',

                        ['class' => 'yii\grid\ActionColumn'],
                        ],
                        ]); ?>
                                                        </div>
            </div>
        </div>
    </div>
</div>


