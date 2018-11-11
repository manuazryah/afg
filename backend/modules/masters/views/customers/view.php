<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">
                <div class="panel-body"><div class="customers-view">
                        <p>
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Customers</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                        </p>

                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'customer_id',
                                'name',
                                'email:email',
                                'company_name',
                                'phone_usa',
                                'phone_uae',
                                'trn_usa',
                                'trn_uae',
                                'fax',
                                'address1:ntext',
                                'address2:ntext',
                                'country',
                                'city',
                                'state',
                                'zipcode',
                                'other_emails:ntext',
                                'notes:ntext',
                            ],
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


