<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use common\models\Vehicle;
use common\models\VehicleSearch;
use kartik\mpdf\Pdf;
use common\models\Export;

class DashboardController extends Controller {

    public $layout = '@app/views/layouts/dashboard';

    public function actionHome($status = null) {
        $customer_vehicles = \common\models\VehicleTowingInfo::find()->where(['customers_id' => \Yii::$app->user->identity->id])->all();
        $vehicle_id = array();
        foreach ($customer_vehicles as $vehicle) {
            $vehicle_id[] = $vehicle->vehicle_id;
        }
        $searchModel = new VehicleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (isset($status)) {
            if ($status == 6) {
                $vehicle_titles = \common\models\VehicleTitleInfo::find()->where(['title' => 0])->all();
                $vehicle_title_id = array();
                foreach ($vehicle_titles as $vehicle_title) {
                    $vehicle_title_id[] = $vehicle_title->vehicle_id;
                }
                $dataProvider->query->andWhere(['IN', 'vehicle.id', $vehicle_title_id]);
            } else if ($status == 7) {
                $vehicle_titles = \common\models\VehicleTitleInfo::find()->where(['title' => 1])->all();
                $vehicle_title_id = array();
                foreach ($vehicle_titles as $vehicle_title) {
                    $vehicle_title_id[] = $vehicle_title->vehicle_id;
                }
                $dataProvider->query->andWhere(['IN', 'vehicle.id', $vehicle_title_id]);
            } else {
                $dataProvider->query->andWhere(['status_id' => $status]);
            }
        }
        $dataProvider->query->andWhere(['IN', 'vehicle.id', $vehicle_id]);


        return $this->render('home', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'status' => $status,
        ]);
    }

    public function actionView($id) {
        $model = Vehicle::findOne($id);
        $customer_notes = \common\models\CustomerNotes::find()->where(['customer_id' => \Yii::$app->user->identity->id, 'vehicle_id' => $id])->one();
        if (empty($customer_notes))
            $customer_notes = new \common\models\CustomerNotes();

        if ($customer_notes->load(\Yii::$app->request->post())) {
            $customer_notes->customer_id = \Yii::$app->user->identity->id;
            $customer_notes->save();
            Yii::$app->getSession()->setFlash('success', "Notes added successfully");
        }

        return $this->render('view', [
                    'model' => $model,
                    'customer_notes' => $customer_notes,
        ]);
    }

    public function actionVehicleConditionReportpdf($id) {
        $content = $this->renderPartial('vehicle-condition-report_pdf', ['model' => Vehicle::findOne($id),
        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/vehicle_condition_report.css',

            'methods' => [
                'SetHeader' => ['Generated By: AFG Shipping||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }

    public function actionContainers() {
        $exports= Export::find()->where(['customer' => Yii::$app->user->identity->id])->all();
        return $this->render('containers', [
                    'exports' => $exports,
        ]);
    }
    
    public function actionContainerDetail($id,$vehicle) {
        $container= Export::findOne($id);
        $vehicle= Vehicle::findOne($vehicle);
 
        return $this->render('container-detail', [
                    'container' => $container,
                    'vehicle' => $vehicle,
        ]);
    }

}
