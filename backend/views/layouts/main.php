<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
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
        <title><?= Html::encode($this->title) ?></title>
        <script src="<?= Yii::$app->homeUrl; ?>js/jquery.min.js"></script>
        <script type="text/javascript">
            var homeUrl = '<?= Yii::$app->homeUrl; ?>';
        </script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <?php $this->head() ?>
    </head>
    <body class="skin-blue fixed sidebar-mini sidebar-mini-expand-feature sidebar-collapse">
        <?php $this->beginBody() ?>
        <header class="main-header">
            <a href="<?= yii::$app->homeUrl; ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>FG</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>AFG</b><span style="color:#fff;">SHIPPING</span></span>
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
                        <?= Html::a('<i class="fa fa-home"></i> <span>Home</span>', ['/site/index'], ['class' => '']) ?>
                    </li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-dashboard"></i>
                            <span>Administration</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> Access Powers', ['/admin/admin-posts/index'], ['class' => 'title']) ?>
                            </li>

                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> Admin Users', ['/admin/admin-users/index'], ['class' => 'title']) ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-users"></i> <span class="title">Customers</span>', ['/masters/customers/index'], ['class' => 'title']) ?>
                    </li>

                    <li>
                        <?= Html::a('<i class="fa fa-building"></i> <span class="title">Consignee</span>', ['/masters/consignee/index'], ['class' => 'title']) ?>
                    </li>
                    
                    <li>
                        <?= Html::a('<i class="fa fa-bus"></i> <span class="title">Vehicle</span>', ['/masters/vehicle/index'], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-th"></i> <span>Container</span>', ['/export/export/container'], ['class' => '']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-files-o"></i> <span class="title">Export</span>', ['/export/export/index'], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-credit-card"></i> <span>Payments</span>', ['/site/index'], ['class' => '']) ?>
                    </li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-file-text-o"></i>
                            <span>Invoices</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> <span>All Invoices</span>', ['/site/index'], ['class' => '']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> <span>Paid Invoices</span>', ['/site/index'], ['class' => '']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> <span>Partial Paid Invoices</span>', ['/site/index'], ['class' => '']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> <span>Un Paid Invoices</span>', ['/site/index'], ['class' => '']) ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-money"></i> <span>Prices</span>', ['/site/index'], ['class' => '']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-bullhorn"></i> <span>Notifications</span>', ['/site/index'], ['class' => '']) ?>
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
            <strong>Copyright &copy; 2017-2018 <a href="http://azryah.com/">AFG Shipping</a>.</strong> All rights
            reserved.
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
