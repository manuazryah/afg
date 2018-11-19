<?php

namespace backend\modules\masters\controllers;

use Yii;
use common\models\Vehicle;
use common\models\VehicleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\VehiceCheckOptions;
use common\models\VehicleCondition;
use common\models\VehicleTitleInfo;
use common\models\VehicleTowingInfo;
use yii\web\UploadedFile;

/**
 * VehicleController implements the CRUD actions for Vehicle model.
 */
class VehicleController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Vehicle models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new VehicleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vehicle model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Vehicle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Vehicle();
        $vehicle_check_options = new VehiceCheckOptions();
        $vehicle_condition = new VehicleCondition();
        $vehicle_title = new VehicleTitleInfo();
        $vehicle_towing = new VehicleTowingInfo();

        if ($model->load(Yii::$app->request->post()) && $vehicle_check_options->load(Yii::$app->request->post()) && $vehicle_condition->load(Yii::$app->request->post()) && $vehicle_title->load(Yii::$app->request->post()) && $vehicle_towing->load(Yii::$app->request->post())) {
            $transaction = Vehicle::getDb()->beginTransaction();
            try {
                if ($model->save()) {
                    $vehicle_check_options->vehicle_id = $model->id;
                    $vehicle_condition->vehicle_id = $model->id;
                    $vehicle_title->vehicle_id = $model->id;
                    $vehicle_towing->vehicle_id = $model->id;
                    $vehicle_towing->customers_id = $vehicle_towing->customer_name;
                    $vehicle_title->towing_request_date = date('Y-m-d', strtotime($vehicle_title->towing_request_date));
                    $vehicle_title->deliver_date = date('Y-m-d', strtotime($vehicle_title->deliver_date));
                    $vehicle_title->title_received = date('Y-m-d', strtotime($vehicle_title->title_received));
                    $vehicle_check_options->save();
                    $vehicle_condition->save();
                    $vehicle_title->save();
                    $vehicle_towing->save();
                    $transaction->commit();
                    $files = UploadedFile::getInstances($model, 'attachments');
                    if (!empty($files))
                        $this->Upload($files, $model);
                    return $this->redirect(['index']);
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'vehicle_check_options' => $vehicle_check_options,
                        'vehicle_condition' => $vehicle_condition,
                        'vehicle_title' => $vehicle_title,
                        'vehicle_towing' => $vehicle_towing,
            ]);
        }
    }

    /**
     * Updates an existing Vehicle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $vehicle_check_options = VehiceCheckOptions::find()->where(['vehicle_id' => $id])->one();
        $vehicle_condition = VehicleCondition::find()->where(['vehicle_id' => $id])->one();
        $vehicle_title = VehicleTitleInfo::find()->where(['vehicle_id' => $id])->one();
        $vehicle_towing = VehicleTowingInfo::find()->where(['vehicle_id' => $id])->one();

        if ($model->load(Yii::$app->request->post()) && $vehicle_check_options->load(Yii::$app->request->post()) && $vehicle_condition->load(Yii::$app->request->post()) && $vehicle_title->load(Yii::$app->request->post()) && $vehicle_towing->load(Yii::$app->request->post())) {
            $vehicle_towing->customers_id = $vehicle_towing->customer_name;
            $vehicle_title->towing_request_date = date('Y-m-d', strtotime($vehicle_title->towing_request_date));
            $vehicle_title->deliver_date = date('Y-m-d', strtotime($vehicle_title->deliver_date));
            $vehicle_title->title_received = date('Y-m-d', strtotime($vehicle_title->title_received));
            if ($model->save() && $vehicle_check_options->save() && $vehicle_condition->save() && $vehicle_title->save() && $vehicle_towing->save()) {
                $files = UploadedFile::getInstances($model, 'attachments');
                if (!empty($files))
                    $this->Upload($files, $model);
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'vehicle_check_options' => $vehicle_check_options,
                        'vehicle_condition' => $vehicle_condition,
                        'vehicle_title' => $vehicle_title,
                        'vehicle_towing' => $vehicle_towing,
            ]);
        }
    }

    public function Upload($files, $model) {
        if ($files != '' && $model != '') {
            $paths = Yii::$app->basePath . '/../uploads/vehicle/' . $model->id . '/';
            $path = $this->CheckPath($paths);
            foreach ($files as $file) {
                $name = $this->fileExists($path, $file->baseName . '.' . $file->extension, $file, 1);
                $file->saveAs($path . '/' . $name);
            }
            return true;
        } else {
            return false;
        }
    }

    public function CheckPath($paths) {
        if (!is_dir($paths)) {
            mkdir($paths);
        }
        return $paths;
    }

    public function fileExists($path, $name, $file, $sufix) {
        if (file_exists($path . '/' . $name)) {

            $name = basename($path . '/' . $file->baseName, '.' . $file->extension) . '_' . $sufix . '.' . $file->extension;
            return $this->fileExists($path, $name, $file, $sufix + 1);
        } else {
            return $name;
        }
    }

    public function actionRemove($file, $id) {
        $path = Yii::$app->basePath . '/../uploads/vehicle/' . $id . '/' . $file;
        if (file_exists($path)) {
            unlink($path);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Deletes an existing Vehicle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $vehicle_check_options = VehiceCheckOptions::find()->where(['vehicle_id' => $id])->one();
        $vehicle_condition = VehicleCondition::find()->where(['vehicle_id' => $id])->one();
        $vehicle_title = VehicleTitleInfo::find()->where(['vehicle_id' => $id])->one();
        $vehicle_towing = VehicleTowingInfo::find()->where(['vehicle_id' => $id])->one();
        $transaction = Vehicle::getDb()->beginTransaction();
        try {
            if (!empty($vehicle_check_options)) {
                $vehicle_check_options->delete();
            }
            if (!empty($vehicle_condition)) {
                $vehicle_condition->delete();
            }
            if (!empty($vehicle_title)) {
                $vehicle_title->delete();
            }
            if (!empty($vehicle_towing)) {
                $vehicle_towing->delete();
            }
            if (!empty($model)) {
                $model->delete();
            }

            $transaction->commit();
            $directory = Yii::$app->basePath . '/../uploads/vehicle/' . $model->id;
            foreach (glob("{$directory}/*") as $file) {
                if (!is_dir($file)) {
                    unlink($file);
                }
            }
            \yii\helpers\FileHelper::removeDirectory($directory);
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
        Yii::$app->getSession()->setFlash('success', 'Deleted successfully');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vehicle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vehicle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Vehicle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCustomerDetails() {
        $customer = $_POST['customer'];
        $customer_details = \common\models\Customers::findOne($customer);
        return json_encode(array('customer_id' => $customer_details->customer_id, 'customer_address' => $customer_details->address1));
    }

    public function actionVehicleDetails() {
        $vin = $_POST['vin'];
        $row = "";
        if ($vin) {
            foreach ($vin as $v) {
                $vehicle = Vehicle::findOne($v);
                $row .= '<tr><td>' . $vehicle->year . '</td><td>' . $vehicle->make . '</td><td>' . $vehicle->model . '</td>
                <td>' . $vehicle->color . '</td><td>' . $vehicle->vin . '</td><td>' . $vehicle->status_id . '</td>
                    </tr>';
            }
        }
        $msg = !empty($row) ? 'success' : 'failed';
        return json_encode(array('msg' => $msg, 'row' => $row));
    }

}
