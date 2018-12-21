<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?= Html::a('<i class="fa fa-list"></i><span> Create Customers</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                        </div>
                        <div class="col-md-8">
                            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                        </div>
                    </div>
                    <?= common\widgets\Alert::widget() ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            //=    'id',
                            'customer_id',
                            'name',
                            'email:email',
                            // 'trn_usa',
                            // 'address1:ntext',
                            // 'country',
                            // 'state',
                            // 'other_emails:ntext',
                            // 'upload_documents',
                            'company_name',
                            [
                                'attribute' => 'state',
                                'value' => function($model) {
                                    $location = common\models\Location::findOne($model->state);
                                    if (isset($location) && $location != '') {
                                        return $location->location;
                                    } else{
                                        return '';
                                    }
                                },
                            ],
                            // 'phone_usa',
                            // 'phone_uae',
                            // 'trn_uae',
                            // 'address2:ntext',
                            // 'city',
                            // 'zipcode',
                            // 'fax',
                            // 'notes:ntext',
                            // 'created_at',
                            // 'status',
                            // 'CB',
                            // 'UB',
                            // 'DOC',
                            // 'DOU',
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{view}{update}{delete}'],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


