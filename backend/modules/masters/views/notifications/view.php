<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Notifications */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($model->subject) ?></h3>


            </div>
            <div class="panel-body">

                <div class="panel-body"><div class="notifications-view">
                        <p>
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Notifications</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                           
                        </p>

                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
//                                'id',
                                'subject',
                                'message:ntext',
                                'expire_date',
//                                'CB',
//                                'DOC',
//                                'status',
                            ],
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


