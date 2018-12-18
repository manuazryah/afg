<?php

namespace backend\modules\masters\controllers;

use Yii;
use common\models\Customers;
use common\models\CustomersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use kartik\mpdf\Pdf;

/**
 * CustomersController implements the CRUD actions for Customers model.
 */
class CustomersController extends Controller {

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
     * Lists all Customers models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CustomersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->user->identity->post_id != '1') {
            $dataProvider->query->andWhere(['state' => Yii::$app->user->identity->location]);
        }

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customers model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        $customer_vehicles = \common\models\VehicleTowingInfo::find()->where(['customers_id' => $id])->all();
        $vehicle_id = array();
        foreach ($customer_vehicles as $vehicle) {
            $vehicle_id[] = $vehicle->vehicle_id;
        }
        $consignees= \common\models\Consignee::find()->where(['customers_id'=>$id])->all();
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'vehicle_id' => $vehicle_id,
                    'consignees' => $consignees,
        ]);
    }

    /**
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Customers();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $model->save()) {
            $files = UploadedFile::getInstances($model, 'upload_documents');
            $model->password = Yii::$app->security->generatePasswordHash($model->password);
            if (!empty($uploads)) {
                $model->upload_documents = $uploads->extension;
            }
            if ($model->validate() && $model->save()) {
                if (!empty($files))
                    $this->Upload($files, $model);
            }

            Yii::$app->getSession()->setFlash('success', "Create Successfully");
            return $this->redirect(['index']);
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Customers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $uploads_ = $model->upload_documents;

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $files = UploadedFile::getInstances($model, 'upload_documents');
            if (!empty($uploads)) {
                $model->upload_documents = $uploads->extension;
            } else {
                $model->upload_documents = $uploads_;
            }
            if ($model->validate() && $model->save()) {
                if (!empty($files))
                    $this->Upload($files, $model);
            }

            Yii::$app->getSession()->setFlash('success', "Updated Successfully");
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function Uploads($model, $uploads) {
        $path = Yii::$app->basePath . '/../uploads/customers/' . $model->id;
        FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
        if (!empty($uploads)) {
            $file = $path . '/' . $model->id . '.' . $model->upload_documents;
            if (file_exists($file)) {
                unlink($file);
            }
            $uploads->saveAs($file);
        }

        return TRUE;
    }

    public function Upload($files, $model) {
        if ($files != '' && $model != '') {
            $paths = Yii::$app->basePath . '/../uploads/customers/' . $model->id . '/';
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
        $path = Yii::$app->basePath . '/../uploads/customers/' . $id . '/' . $file;
        if (file_exists($path)) {
            unlink($path);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Deletes an existing Customers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Customers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Customers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Customers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChangePassword() {
        $model = new \common\models\ChangePassword();
        $id = Yii::$app->user->identity->id;
        $user = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('success', 'Password changed successfully.');
            $model = new \common\models\ChangePassword();
        }
        return $this->render('change_password', [
                    'model' => $model,
                    'user' => $user,
        ]);
    }

    public function actionReport($id, $status) {
        $customer = Customers::findOne($id);
        $customer_vehicles = \common\models\VehicleTowingInfo::find()->where(['customers_id' => $id])->all();
        $vehicle_id = array();
        foreach ($customer_vehicles as $vehicle) {
            $vehicle_details = \common\models\Vehicle::findOne($vehicle->vehicle_id);
            if ($vehicle_details->status_id == $status)
                $vehicle_id[] = $vehicle->vehicle_id;
        }
        return $this->renderAjax('report', [
                    'vehicle_id' => $vehicle_id,
                    'customer' => $customer,
                    'status' => $status,
        ]);
    }

    public function actionReportPdf($id, $status) {
        $customer = Customers::findOne($id);
        $customer_vehicles = \common\models\VehicleTowingInfo::find()->where(['customers_id' => $id])->all();
        $vehicle_id = array();
        foreach ($customer_vehicles as $vehicle) {
            $vehicle_details = \common\models\Vehicle::findOne($vehicle->vehicle_id);
            if ($vehicle_details->status_id == $status)
                $vehicle_id[] = $vehicle->vehicle_id;
        }
        $content = $this->renderPartial('report_pdf', [
            'vehicle_id' => $vehicle_id,
            'customer' => $customer,
            'status' => $status,
        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'content' => $content,
            'options' => [
                'title' => 'Privacy Policy - Krajee.com',
                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'methods' => [
                'SetHeader' => ['Generated By: AFG Shipping||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }

}
