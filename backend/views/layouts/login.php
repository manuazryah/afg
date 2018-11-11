<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAssetLogin;
use yii\helpers\Html;
use common\widgets\Alert;

AppAssetLogin::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition login-page">
        <?php $this->beginBody() ?>
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="login-box-body">
                <?= Alert::widget() ?>
                <?= $content ?>

            </div>
            <!-- /.login-box-body -->
        </div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
