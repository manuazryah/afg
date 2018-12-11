<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!--<script src="<?= Yii::$app->homeUrl; ?>lib/jquery/jquery.min.js"></script>-->
        <?php $this->head() ?>
    </head>
    <body data-spy="scroll" data-target="#navbar-example">
        <?php $this->beginBody() ?>
        <div id="preloader"></div>
        <header>
            <?php if($this->context->action->id!='login'){ ?>
            <!-- header-area start -->
            <div id="sticker" class="header-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <!-- Navigation -->
                            <nav class="navbar navbar-default">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <!-- Brand -->
                                    <a class="navbar-brand page-scroll sticky-logo" href="<?= Yii::$app->homeUrl?>">
                                        <img width="" class="img-responsive" src="<?= Yii::$app->homeUrl; ?>img/logo.png" style="width: 150px"/>
                                        <!-- Uncomment below if you prefer to use an image logo -->
                                        <!-- <img src="img/logo.png" alt="" title=""> -->
                                    </a>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active">
                                            <a class="page-scroll" href="#home">Home</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="#about">About</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="#services">Services</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="#team">Team</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="#portfolio">Portfolio</a>
                                        </li>
                                        <!-- <li>
                                           <a class="page-scroll" href="#blog">Blog</a>
                                         </li>-->
                                        <li>
                                            <a class="page-scroll" href="#contact">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- navbar-collapse -->
                            </nav>
                            <!-- END: Navigation -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-area end -->
            <?php } ?>
        </header>
        <?= $content ?>
        <!-- Start Footer bottom Area -->
         <?php if($this->context->action->id!='login'){ ?>
        <footer>
            <div class="footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-content">
                                <div class="footer-head">
                                    <div class="footer-logo">
                                        <h2><span>AFG</span>Shipping</h2>
                                    </div>

                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                    <div class="footer-icons">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end single footer -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-content">
                                <div class="footer-head">
                                    <h4>information</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </p>
                                    <div class="footer-contacts">
                                        <p><span>Tel:</span> +123 456 789</p>
                                        <p><span>Email:</span> contact@example.com</p>
                                        <p><span>Working Hours:</span> 9am-5pm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end single footer -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-content">
                                <div class="footer-head">
                                    <h4>Instagram</h4>
                                    <div class="flicker-img">
                                        <a href="#"><img src="img/portfolio/1.jpg" alt=""></a>
                                        <a href="#"><img src="img/portfolio/2.jpg" alt=""></a>
                                        <a href="#"><img src="img/portfolio/3.jpg" alt=""></a>
                                        <a href="#"><img src="img/portfolio/4.jpg" alt=""></a>
                                        <a href="#"><img src="img/portfolio/5.jpg" alt=""></a>
                                        <a href="#"><img src="img/portfolio/6.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright text-center">
                                <p>
                                    &copy; Copyright <strong>AFG Shipping</strong>. All Rights Reserved
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
         <?php } ?>
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
