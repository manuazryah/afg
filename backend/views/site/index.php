<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>150</h3>

                <p>ON THE WAY</p>
            </div>
            <div class="icon">
                <img class="car-img" src="<?= yii::$app->homeUrl; ?>img/trailer.png" alt="car image">
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>ON HAND</p>
            </div>
            <div class="icon">
                <img class="car-img" src="<?= yii::$app->homeUrl; ?>img/car-repair.png" alt="car image">
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>44</h3>

                <p>MANIFEST</p>
            </div>
            <div class="icon">
                <img class="car-img" src="<?= yii::$app->homeUrl; ?>img/notebook.png" alt="car image">
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>65</h3>

                <p>SHIPPED</p>
            </div>
            <div class="icon">
                <img class="car-img" src="<?= yii::$app->homeUrl; ?>img/cruise.png" alt="car image">
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>
