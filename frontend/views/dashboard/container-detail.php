<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\StaffInfo;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if (!isset($title))
    $title = 'AFG';
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .th-background{
        background-color: #caf0ee;
        border-color: #caf0ee;
        color: #313534;
    }
</style>

<div class="service-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?= common\widgets\Alert::widget() ?>
                    <p>
                        <?= Html::a('<i class="fa fa-th"></i><span> My Containers</span>', ['containers'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    </p>
                    <div class="form-group">
                        
                        <?php
                        $path = Yii::getAlias('@paths') . '/vehicle/' . $vehicle->id;
                        if (count(glob("{$path}/*")) > 0) { ?>
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Vehicle Images</b></h3>
                        </div>
                          <?php  $k = 0;
                            foreach (glob("{$path}/*") as $file) {
                                $k++;
                                $arry = explode('/', $file);
                                $img_nmee = end($arry);

                                $img_nmees = explode('.', $img_nmee);
                                if ($img_nmees['1'] != '') {
                                    ?>
                                    <img class="col-lg-4" width="240" src="<?= Yii::$app->homeUrl . 'uploads/vehicle/' . $vehicle->id . '/' . end($arry) ?>" alt="1">
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <div style="clear:both"></div>

                    

                    <?php
                    $path = Yii::getAlias('@paths') . '/export/container/' . $container->id;
                    if (count(glob("{$path}/*")) > 0) { ?>
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Container Images</b></h3>
                    </div>
                     <?php   $k = 0;
                        foreach (glob("{$path}/*") as $file) {
                            $k++;
                            $arry = explode('/', $file);
                            $img_nmee = end($arry);
                            $img_nmees = explode('.', $img_nmee);
                            if ($img_nmees['1'] != '') {
                                ?>
                                <div class = "col-md-3 img-box" id="<?= $k; ?>">
                                    <div class="news-img">
                                        <img class="img-responsive" src="<?= Yii::$app->homeUrl . 'uploads/export/container/' . $container->id . '/' . end($arry) ?>">
                                    </div> 
                                </div>
                                <?php
                            }
                            if ($k % 4 == 0) {
                                ?>
                                <div class="clearfix"></div>
                                <?php
                            }
                        }
              }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

