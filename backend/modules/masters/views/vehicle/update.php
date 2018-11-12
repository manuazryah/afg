<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vehicle */

$this->title = 'Update Vehicle: ' . $model->model;
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">
                <?= Html::a('<i class="fa fa-list"></i><span> Manage Vehicle</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone link-btn']) ?>
                <div class="panel-body"><div class="vehicle-create">
                        <?=
                        $this->render('_form', [
                            'model' => $model,
                            'vehicle_check_options' => $vehicle_check_options,
                            'vehicle_condition' => $vehicle_condition,
                            'vehicle_title' => $vehicle_title,
                            'vehicle_towing' => $vehicle_towing,
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
