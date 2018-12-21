<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppointmentWidget
 *
 * @author
 * JIthin Wails
 */

namespace common\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

class CarCountWidget extends Widget {

//    public $id;

    public function init() {
        parent::init();
        if (!isset(Yii::$app->user->identity->id)) {
            return '';
        }
    }

    public function run() {
        $export_vehicles = \common\models\Export::find()->where(['customer' => \Yii::$app->user->identity->id])->all();
        $la_on_way = $la_shipped = $la_on_hand = $la_on_hand_with_title = 0;
        $ga_on_way = $ga_shipped = $ga_on_hand = $ga_on_hand_with_title = 0;
        $ny_on_way = $ny_shipped = $ny_on_hand = $ny_on_hand_with_title = 0;
        $tx_on_way = $tx_shipped = $tx_on_hand = $tx_on_hand_with_title = 0;
        foreach ($export_vehicles as $export_vehicle) {
            $vehicles = explode(',', $export_vehicle->vehicle_id);
            foreach ($vehicles as $vehicle) {
                $vehicle_details = \common\models\Vehicle::findOne($vehicle);
                $vehicle_info_title = \common\models\VehicleTitleInfo::find()->where(['vehicle_id' => $vehicle])->one();
                if (isset($vehicle_details->location)) {
                    if ($vehicle_details->location == 1) {
                        $la = array();
                        if ($vehicle_details->status_id == 2) {
                            $la_on_way += 1;
                        } else if ($vehicle_details->status_id == 3) {
                            $la_shipped += 1;
                        } else if ($vehicle_details->status_id == 1) {
                            $la_on_hand += 1;
                        }
                        if ($vehicle_details->status_id == 1 && $vehicle_info_title->title == 1) {
                            $la_on_hand_with_title += 1;
                        }
                        $la['onway'] = $la_on_way;
                        $la['shipped'] = $la_shipped;
                        $la['onhand'] = $la_on_hand;
                        $la['onhand_with_title'] = $la_on_hand_with_title;
                    } else if ($vehicle_details->location == 2) {
                        $ga = array();
                        if ($vehicle_details->status_id == 2) {
                            $ga_on_way += 1;
                        } else if ($vehicle_details->status_id == 3) {
                            $ga_shipped += 1;
                        } else if ($vehicle_details->status_id == 1) {
                            $ga_on_hand += 1;
                        }
                        if ($vehicle_details->status_id == 1 && $vehicle_info_title->title == 1) {
                            $ga_on_hand_with_title += 1;
                        }
                        $ga['onway'] = $ga_on_way;
                        $ga['shipped'] = $ga_shipped;
                        $ga['onhand'] = $ga_on_hand;
                        $ga['onhand_with_title'] = $ga_on_hand_with_title;
                        
                    } else if ($vehicle_details->location == 3) {
                        $ny = array();
                        if ($vehicle_details->status_id == 2) {
                            $ny_on_way += 1;
                        } else if ($vehicle_details->status_id == 3) {
                            $ny_shipped += 1;
                        } else if ($vehicle_details->status_id == 1) {
                            $ny_on_hand += 1;
                        }
                        if ($vehicle_details->status_id == 1 && $vehicle_info_title->title == 1) {
                            $ny_on_hand_with_title += 1;
                        }
                        $ny['onway'] = $ny_on_way;
                        $ny['shipped'] = $ny_shipped;
                        $ny['onhand'] = $ny_on_hand;
                        $ny['onhand_with_title'] = $ny_on_hand_with_title;
                        
                    } else if ($vehicle_details->location == 4) {
                        $tx = array();
                        if ($vehicle_details->status_id == 2) {
                            $tx_on_way += 1;
                        } else if ($vehicle_details->status_id == 3) {
                            $tx_shipped += 1;
                        } else if ($vehicle_details->status_id == 1) {
                            $tx_on_hand += 1;
                        }
                        if ($vehicle_details->status_id == 1 && $vehicle_info_title->title == 1) {
                            $tx_on_hand_with_title += 1;
                        }
                        $tx['onway'] = $tx_on_way;
                        $tx['shipped'] = $tx_shipped;
                        $tx['onhand'] = $tx_on_hand;
                        $tx['onhand_with_title'] = $tx_on_hand_with_title;
                        
                    }
                    
                    $la['total_count'] = $la_on_way + $la_shipped + $la_on_hand;
                    $ga['total_count'] = $ga_on_way + $ga_shipped + $ga_on_hand;
                    $ny['total_count'] = $ny_on_way + $ny_shipped + $ny_on_hand;
                    $tx['total_count'] = $tx_on_way + $tx_shipped + $tx_on_hand;
                    
                }
            }
        }

        return $this->render('car_count', ['la' => $la, 'ga' => $ga, 'ny' => $ny, 'tx' => $tx]);
    }

}

?>
