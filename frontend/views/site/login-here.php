<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="login-logo">
        <img width="" class="img-responsive" src="<?= Yii::$app->homeUrl; ?>img/logo.png"/>
    </div>

    

    <div class="row">
        <div class="col-lg-6" style="text-align:center">
            <a class="btn btn-primary" href="<?=Yii::$app->homeUrl?>admin">Admin Login</a>
        </div>
        <div class="col-lg-6" style="text-align:center">
            <a class="btn btn-primary" href="<?= Yii::$app->homeUrl?>site/login">Customer Login</a>
        </div>
    </div>
</div>
