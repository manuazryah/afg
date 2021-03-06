<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

\frontend\assets\DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= Yii::$app->homeUrl; ?>img/favicon.png" rel="icon">
        <?= Html::csrfMetaTags() ?>
       <title>AFG Global Shipper LLC</title>
        <script src="<?= Yii::$app->homeUrl; ?>js/jquery.min.js"></script>
        <script type="text/javascript">
            var homeUrl = '<?= Yii::$app->homeUrl; ?>';
        </script>
        <?php $this->head() ?>
    </head>
    <body class="skin-blue sidebar-mini sidebar-collapse">
        <?php $this->beginBody() ?>
        <header class="main-header">
            <a href="<?= yii::$app->homeUrl; ?>dashboard/home" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <img width="" class="img-responsive" src="<?= Yii::$app->homeUrl; ?>img/favicon.png"/>
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <img width="" class="img-responsive" src="<?= Yii::$app->homeUrl; ?>img/logo.png"/>
                </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown user user-menu">
                            <?php
                            echo ''
                            . Html::beginForm(['/site/logout'], 'post', ['style' => '']) . '<a>'
                            . Html::submitButton(
                                    '<i class="fa fa-sign-out" aria-hidden="true"></i> Sign out', ['class' => 'signout-btn', 'style' => '']
                            ) . '</a>'
                            . Html::endForm()
                            . '';
                            ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= Yii::$app->homeUrl; ?>img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= Yii::$app->user->identity->user_name ?></p>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <?= Html::a('<i class="fa fa-home"></i> <span>Home</span>', ['/dashboard/home'], ['class' => '']) ?>
                    </li>
                    
                    
                    
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <?= $content ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2017-2018 <a href="http://azryah.com/">AFG GLOBAL SHIPPER LLC</a>.</strong> All rights
            reserved.
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

