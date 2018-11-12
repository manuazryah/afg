<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;

$this->title = 'Forgot Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-layout">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                <div class="login-logo">
                    <h1><span>AFG</span>Shipping</h1>
                </div>
                <div class="forgot-title">
                    <h4>Forgot Your Password ?</h4>
                    <p>Let us help you</p>
                    <p>Type your username / email ID in the field below to receive your validation code by email:</p>
                </div>
                <?= Alert::widget() ?>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'user_name')->textInput(['class' => 'form-control'])->label('Email/Username') ?>

                <?php // $form->field($model, 'rememberMe')->checkbox() ?>
                <div>
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-default submit', 'name' => 'login-button']) ?>
                </div>
                <div class="clearfix"></div>
                <div class="separator" style="margin-top: 30px;">

                    <p class="change_link">
                        <a href="<?= Yii::$app->homeUrl; ?>site/index" class="to_register">Login to your account?</a>
                    </p>
                    <div class="clearfix"></div>
                </div>
                <?php ActiveForm::end(); ?>
                <!-- form -->
            </section>
            <!-- content -->
        </div>
    </div>
    <div style="clear:both"></div>
</div>