<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\StaffInfo;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->user->identity->name;
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .tab-content{
        background: #f9f9f9 !important;
    }
    .nav.nav-tabs>li>a {
        background-color: #f9f9f9;
    }
    .nav.nav-tabs>li {
        background: #f9f9f9;
    }
    .nav.nav-tabs>li.active>a {
        background-color: #f9f9f9 !important;
    }
    .nav.nav-tabs.nav-tabs-justified, .nav-tabs-justified .nav.nav-tabs {
        background: #f9f9f9;
    }
    .nav.nav-tabs>li>a:hover {
        background-color: #f9f9f9;
    }
    .nav-tabs {
        border-bottom: 1px solid #f9f9f9 !important;
    }
    .hidden-xs{
        padding-left: 5px;
    }
    .admin_status_field{
        padding: 0px 0px !important;
    }
</style>
<div class="customers-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="<?= $status == '' ? 'active' : '' ?>">
                            <?= Html::a('<span class="visible-xs"><i class="fa-home"></i></span><i class="fa fa-th-list" aria-hidden="true"></i><span class="hidden-xs">All </span>', ['home'], ['class' => '']) ?>
                        </li>
                        <li class="<?= $status == '1' ? 'active' : '' ?>">
                            <?= Html::a('<span class="visible-xs"><i class="fa-home"></i></span><i class="fa fa-th-list" aria-hidden="true"></i><span class="hidden-xs">ON HAND</span>', ['home', 'status' => 1], ['class' => '']) ?>
                        </li>
                        <li class="<?= $status == '6' ? 'active' : '' ?>">
                            <?= Html::a('<span class="visible-xs"><i class="fa-home"></i></span><i class="fa fa-th-list" aria-hidden="true"></i><span class="hidden-xs">NO TITLE</span>', ['home', 'status' => 6], ['class' => '']) ?>
                        </li>
                        <li class="<?= $status == '7' ? 'active' : '' ?>">
                            <?= Html::a('<span class="visible-xs"><i class="fa-home"></i></span><i class="fa fa-th-list" aria-hidden="true"></i><span class="hidden-xs">WITH TITLE</span>', ['home', 'status' => 7], ['class' => '']) ?>
                        </li>
                        <li class="<?= $status == '3' ? 'active' : '' ?>">
                            <?= Html::a('<span class="visible-xs"><i class="fa-home"></i></span><i class="fa fa-th-list" aria-hidden="true"></i><span class="hidden-xs">SHIPPED</span>', ['home', 'status' => 3], ['class' => '']) ?>
                        </li>
                        <li class="<?= $status == '4' ? 'active' : '' ?>">
                            <?= Html::a('<span class="visible-xs"><i class="fa-home"></i></span><i class="fa fa-th-list" aria-hidden="true"></i><span class="hidden-xs">PICKED UP</span>', ['home', 'status' => 4], ['class' => '']) ?>
                        </li>

                    </ul>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'lot_no',
                            'year',
                            'make',
                            'model',
                            'color',
                            'vin',
                            [
                                'attribute' => 'status_id',
                                'value' => function($model) {
                                    if ($model->status_id == 1) {
                                        return 'ON HAND';
                                    } else if ($model->status_id == 2) {
                                        return 'ON THE WAY';
                                    } else if ($model->status_id == 3) {
                                        return 'SHIPPED';
                                    } else if ($model->status_id == 4) {
                                        return 'PICKED UP';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'title',
                                'value' => function($model) {
                                    if ($model->titleInfos->title == 1) {
                                        return 'Yes';
                                    } else if ($model->titleInfos->title == 2) {
                                        return 'No';
                                    } else {
                                        return '';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'title_received',
                                'value' => function($model) {
                                    return date('Y-m-d', strtotime($model->titleInfos->title_received));
                                }
                            ],
                            [
                                'attribute' => 'requested_date',
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
                       
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view}',
                            ]
                        ],
                    ]);
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>



