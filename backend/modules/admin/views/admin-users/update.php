<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdminUsers */

$this->title = 'Update  User: ';
$this->params['breadcrumbs'][] = ['label' => ' Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?><span class="title_span"><?= Html::encode($model->name) ?></span></h3>


            </div>
            <div class="panel-body">
                <?= Html::a('<i class="fa fa-list"></i><span> Manage  Users</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone link-btn']) ?>
                <?=
                Html::a('<i class="fa fa-pencil-square-o"></i><span> Change password</span>', ['change-password', 'data' => Yii::$app->EncryptDecrypt->Encrypt('encrypt', Yii::$app->user->identity->id)], ['class' => 'btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right change-pwd']);
                ?>
                <div class="panel-body"><div class="admin-users-create">
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
