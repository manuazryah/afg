<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Consignee */

$this->title = $model->consignee_name;
$this->params['breadcrumbs'][] = ['label' => 'Consignees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">
                <div class="panel-body"><div class="consignee-view">
                        <p>
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Consignee</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                        </p>

                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                    [
                                    'attribute' => 'customers_id',
                                    'value' => function($model) {
                                        if (!empty($model->customers_id)) {
                                            $customers = \common\models\Customers::findOne($model->customers_id);
                                            if (!empty($customers))
                                                return $customers->name;
                                        }
                                    }
                                ],
                                    [
                                    'attribute' => 'consignee_id',
                                    'value' => function($model) {
                                        if (!empty($model->consignee_id)) {
                                            $consignee = \common\models\Consignee::findOne($model->consignee_id);
                                            if (!empty($consignee))
                                                return $consignee->consignee_name;
                                        }
                                    }
                                ],
                                'consignee_name',
                                'consignee_id',
                                'address1',
                                'city',
                                'country',
                                'phone',
                                'address2',
                                'state',
                                'zipcode',
                            ],
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


