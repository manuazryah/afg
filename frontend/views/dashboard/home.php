<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\StaffInfo;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'AFG';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
        <div class="col-sm-3">
                <div class="xe-widget xe-counter xe-counter-blue" >
                        <div class="xe-icon">
                                <i class="fa fa-money"></i>
                        </div>
                        <div class="xe-label">
                                <strong class="num">10000</strong>
                                <span>Due Amount</span>
                        </div>
                </div>
        </div>
</div>

<style>
        .summary{
                display: none;
        } .filters{
                display: none;
        }
</style>
