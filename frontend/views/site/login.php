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

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= \common\widgets\Alert::widget()?>
            <?php
            $fieldOptions2 = [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
            ];
            ?>
            <?= $form->field($model, 'user_name', $fieldOptions2)->label('User Name')->textInput() ?>
            <?php
            $fieldOptions3 = [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
            ];
            ?>
            <?= $form->field($model, 'password', $fieldOptions3)->label('Password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
                <p class="change_link">
                    <a href="<?= Yii::$app->homeUrl; ?>site/forgot" class="to_register">Forgot your password?</a>
                </p>
                <div class="clearfix"></div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
