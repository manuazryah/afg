<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Export */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Exports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">

                <div class="panel-body"><div class="export-view">
                        <p>
                            <?=  Html::a('<i class="fa fa-list"></i><span> Manage Export</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                            ],
                            ]) ?>
                        </p>

                        <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                                    'id',
            'customer',
            'customer_id',
            'cust_address:ntext',
            'export_date',
            'loding_date',
            'broker_name',
            'booking_no',
            'ETA',
            'ar_no',
            'xtn_no',
            'seal_no',
            'container_no',
            'cut_off',
            'vessel',
            'voyage',
            'terminal',
            'stremship_line',
            'destination',
            'ITN',
            'contact_details:ntext',
            'special_instruction:ntext',
            'port_of_loading',
            'port_of_discharge',
            'bol_note',
            'bl_or_awb_number',
            'export_referance',
            'forwading_agent:ntext',
            'domestic_routing_instructions:ntext',
            'pre_carraiage_by',
            'place_of_recipt_by_pre_carrrier',
            'final_destintion',
            'loading_terminal',
            'container_type',
            'number_of_packages',
            'by',
            'exporting_carruer',
            'date',
            'auto_recieving_date',
            'auto_cut_off',
            'vessel_cut_off',
            'sale_date',
            'vehicle_location',
            'exporter_id',
            'exporter_type_issue',
            'transpotation_value',
            'exporter_dob',
            'ultimate_consignee_dob',
            'conignee_id',
            'notify_party',
            'menifest_consignee',
            'invoice',
            'status',
            'CB',
            'UB',
            'DOC',
            'DOU',
                        ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


