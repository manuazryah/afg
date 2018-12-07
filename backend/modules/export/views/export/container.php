<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auto Container';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="export-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="panel-body">

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'rowOptions' => function($model) {
                            return ['id' => $model->id];
                        },
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'loding_date',
                            'export_date',
                            'ETA',
                            'booking_no',
                            'ar_no',
                            'terminal',
                            'vessel',
                            'destination',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-eye-open gridview-accordn" type="' . $model->id . '" title="View Details"></span>', '#', ['data-pjax' => 0, 'target' => "_blank"]);
                                    },
                                ],
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(document).on('click', '.gridview-accordn', function (e) {
            e.preventDefault();
            var val = $(this).attr('type');
            $(this).removeClass('gridview-accordn');
            $(this).addClass('gridview-remove');
            $.ajax({
                type: 'POST',
                url: homeUrl + 'export/export/vehicle-deatil',
                data: {val: val},
                success: function (data) {
                    $("#" + val).after(data);
                }
            });

           

        });


        $(document).on('click', '.gridview-remove', function (e) {
            e.preventDefault();
            var val = $(this).attr('type');
            $(this).removeClass('gridview-remove');
            $(this).addClass('gridview-accordn');
            $('#append_' + val).hide();

        });

    });
</script>

<style>
    .append-table th{
        font-size: 12px;
        background: #3ec1d5;
    color: #fff !important;
    }
</style>