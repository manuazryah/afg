<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Prices */

$this->title = 'Create Prices';
$this->params['breadcrumbs'][] = ['label' => 'Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

            </div>
            <div class="panel-body">
                <?= Html::a('<i class="fa fa-list"></i><span> Manage Prices</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone link-btn']) ?>
                <div class="panel-body"><div class="consignee-create">
                        <?=
                        $this->render('_form', [
                            'model' => $model,
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

