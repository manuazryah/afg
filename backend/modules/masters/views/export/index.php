<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exports';
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
                                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                    <?=  Html::a('<i class="fa fa-list"></i><span> Create Export</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                                                            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                                    'id',
            'customer',
            'customer_id',
            'cust_address:ntext',
            'export_date',
            // 'loding_date',
            // 'broker_name',
            // 'booking_no',
            // 'ETA',
            // 'ar_no',
            // 'xtn_no',
            // 'seal_no',
            // 'container_no',
            // 'cut_off',
            // 'vessel',
            // 'voyage',
            // 'terminal',
            // 'stremship_line',
            // 'destination',
            // 'ITN',
            // 'contact_details:ntext',
            // 'special_instruction:ntext',
            // 'port_of_loading',
            // 'port_of_discharge',
            // 'bol_note',
            // 'bl_or_awb_number',
            // 'export_referance',
            // 'forwading_agent:ntext',
            // 'domestic_routing_instructions:ntext',
            // 'pre_carraiage_by',
            // 'place_of_recipt_by_pre_carrrier',
            // 'final_destintion',
            // 'loading_terminal',
            // 'container_type',
            // 'number_of_packages',
            // 'by',
            // 'exporting_carruer',
            // 'date',
            // 'auto_recieving_date',
            // 'auto_cut_off',
            // 'vessel_cut_off',
            // 'sale_date',
            // 'vehicle_location',
            // 'exporter_id',
            // 'exporter_type_issue',
            // 'transpotation_value',
            // 'exporter_dob',
            // 'ultimate_consignee_dob',
            // 'conignee_id',
            // 'notify_party',
            // 'menifest_consignee',
            // 'invoice',
            // 'status',
            // 'CB',
            // 'UB',
            // 'DOC',
            // 'DOU',

                        ['class' => 'yii\grid\ActionColumn'],
                        ],
                        ]); ?>
                                                        </div>
            </div>
        </div>
    </div>
</div>


