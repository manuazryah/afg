<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div id="" class="about-area area-padding user-login">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <div class="" style="border: 1px solid #6d696929;width:50%;margin: 0 auto;margin-top: 10px">
                        <h3>Login</h3>
                        <p>Please fill out the following fields to login:</p>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'user_name')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                       
                        <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>