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
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Export</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                        </p>

                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                [
                                    'attribute' => 'vehicle_id',
                                    'value' => function($model) {
                                        $vehicles = explode(',', $model->vehicle_id);
                                        foreach ($vehicles as $value) {
                                            $vehicle_detail = \common\models\Vehicle::findOne($value);
                                            if (!empty($vehicle_detail))
                                                return $vehicle_detail->vin . ',';
                                        }
                                    }
                                ],
                                [
                                    'attribute' => 'customer',
                                    'value' => function($model) {
                                        $customer = common\models\Customers::findOne($model->customer);
                                        if (!empty($customer))
                                            return $customer->name;
                                        else
                                            return '';
                                    }
                                ],
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
                                [
                                    'attribute' => 'additional_info_container_type',
                                    'value' => function($model) {
                                        if ($model->additional_info_container_type == 1) {
                                            return "1 X 20'HC DRY VAN";
                                        } else if ($model->additional_info_container_type == 2) {
                                            return "1 X 45'HC DRY VAN";
                                        } else if ($model->additional_info_container_type == 3) {
                                            return "1 X 40'HC DRY VAN";
                                        }
                                    }
                                ],
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
                                [
                                    'attribute' => 'conignee_id',
                                    'value' => function($model) {
                                        $consignee = common\models\Consignee::findOne($model->conignee_id);
                                        if (!empty($consignee))
                                            return $consignee->consignee_name;
                                        else
                                            return '';
                                    }
                                ],
                                [
                                    'attribute' => 'notify_party',
                                    'value' => function($model) {
                                        $notify = common\models\Consignee::findOne($model->notify_party);
                                        if (!empty($notify))
                                            return $notify->consignee_name;
                                        else
                                            return '';
                                    }
                                ],
                                [
                                    'attribute' => 'menifest_consignee',
                                    'value' => function($model) {
                                        $menifest_consignee = common\models\Consignee::findOne($model->menifest_consignee);
                                        if (!empty($menifest_consignee))
                                            return $menifest_consignee->consignee_name;
                                        else
                                            return '';
                                    }
                                ],
                            ],
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


