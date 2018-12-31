<?php

namespace backend\modules\export\controllers;

use Yii;
use common\models\Export;
use common\models\ExportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use kartik\mpdf\Pdf;

/**
 * ExportController implements the CRUD actions for Export model.
 */
class ExportController extends Controller {

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

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
     * Lists all Export models.
     * @return mixed
     */
    public function actionIndex($customer = null) {
        $searchModel = new ExportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (isset($customer))
            $dataProvider->query->andWhere(['customer' => $customer]);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Export models.
     * @return mixed
     */
    public function actionContainer() {
        $searchModel = new ExportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->user->identity->post_id != '1') {
            $customers = \common\models\Customers::find()->where(['state' => Yii::$app->user->identity->location])->all();
            $customer_id = array();
            foreach ($customers as $customer) {
                $customer_id[] = $customer->id;
            }
            $dataProvider->query->andWhere(['IN', 'export.customer', $customer_id]);
        }
        return $this->render('container', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Export model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Export model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($cart = null) {
        $model = new Export();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $model->validate()) {
            $model->vehicle_id = implode(',', $model->vehicle_id);
            $model->export_date = date('Y-m-d', strtotime($model->export_date));
            $model->loding_date = date('Y-m-d', strtotime($model->loding_date));
            $model->ETA = date('Y-m-d', strtotime($model->ETA));
            $model->cut_off = date('Y-m-d', strtotime($model->cut_off));
            $model->date = date('Y-m-d', strtotime($model->date));
            $model->auto_recieving_date = date('Y-m-d', strtotime($model->auto_recieving_date));
            $model->auto_cut_off = date('Y-m-d', strtotime($model->auto_cut_off));
            $model->vessel_cut_off = date('Y-m-d', strtotime($model->vessel_cut_off));
            $model->sale_date = date('Y-m-d', strtotime($model->sale_date));
            $model->exporter_dob = date('Y-m-d', strtotime($model->exporter_dob));
            $model->ultimate_consignee_dob = date('Y-m-d', strtotime($model->ultimate_consignee_dob));
            $model->save();
            $this->Setstatus($model);
            $files = UploadedFile::getInstances($model, 'container_images');
            if (!empty($files))
                $this->Upload($files, $model);
            $invoice = UploadedFile::getInstance($model, 'invoice');
            if (!empty($invoice)) {
                $model->invoice = $invoice->extension;
                $model->update();
                $this->UploadImages($model, $invoice, 1);
            }
            $title = UploadedFile::getInstance($model, 'titles');
            if (!empty($title)) {
                $model->titles = $title->extension;
                $model->update();
                $this->UploadImages($model, $title, 2);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'cart' => $cart
            ]);
        }
    }

    /**
     * Updates an existing Export model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $invoice_ = $model->invoice;
        $titles_ = $model->titles;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->vehicle_id = implode(',', $model->vehicle_id);
            $model->export_date = date('Y-m-d', strtotime($model->export_date));
            $model->loding_date = date('Y-m-d', strtotime($model->loding_date));
            $model->ETA = date('Y-m-d', strtotime($model->ETA));
            $model->cut_off = date('Y-m-d', strtotime($model->cut_off));
            $model->date = date('Y-m-d', strtotime($model->date));
            $model->auto_recieving_date = date('Y-m-d', strtotime($model->auto_recieving_date));
            $model->auto_cut_off = date('Y-m-d', strtotime($model->auto_cut_off));
            $model->vessel_cut_off = date('Y-m-d', strtotime($model->vessel_cut_off));
            $model->sale_date = date('Y-m-d', strtotime($model->sale_date));
            $model->exporter_dob = date('Y-m-d', strtotime($model->exporter_dob));
            $model->ultimate_consignee_dob = date('Y-m-d', strtotime($model->ultimate_consignee_dob));
            $invoice = UploadedFile::getInstance($model, 'invoice');
            if (!empty($invoice)) {
                $model->invoice = $invoice->extension;
                $this->UploadImages($model, $invoice);
            } else {
                $model->invoice = $invoice_;
            }

            $title = UploadedFile::getInstance($model, 'titles');
            if (!empty($title)) {
                $model->titles = $title->extension;
                $this->UploadImages($model, $title, 2);
            } else {
                $model->titles = $titles_;
            }
            $model->save();
            $this->Setstatus($model);
            $files = UploadedFile::getInstances($model, 'container_images');
            if (!empty($files))
                $this->Upload($files, $model);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /*
     * This function is to set vehicle status
     */

    public function Setstatus($model) {
        if ($model->container_no != '' && $model->seal_no != '' && $model->booking_no != '') {
            $status = 3;
        } else if ($model->container_no == '' && $model->seal_no == '') {
            $status = 5;
        }
        if (isset($status) && $status != '') {
            $vehicles= explode(',', $model->vehicle_id);
            foreach ($vehicles as $vehicle) {
              $vehicle_detail= \common\models\Vehicle::findOne($vehicle);
              $vehicle_detail->status_id=$status;
              $vehicle_detail->save(FALSE);
            }
        }
    }

    /*
     * This function upload invoice
     * return
     */

    public function UploadImages($model, $uploads, $type = null) {
        if ($type == 1) {
            $path = Yii::$app->basePath . '/../uploads/export/invoice/' . $model->id;
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            if (!empty($uploads)) {
                $file = $path . '/' . $model->id . '.' . $model->invoice;
                if (file_exists($file)) {
                    unlink($file);
                }
                $uploads->saveAs($file);
            }
        } else if ($type == 2) {
            $path = Yii::$app->basePath . '/../uploads/export/titles/' . $model->id;
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            if (!empty($uploads)) {
                $file = $path . '/' . $model->id . '.' . $model->titles;
                if (file_exists($file)) {
                    unlink($file);
                }
                $uploads->saveAs($file);
            }
        }
    }

    /*
     * This function upload container images
     * return
     */

    public function Upload($files, $model) {
        if ($files != '' && $model != '') {
            $paths = Yii::$app->basePath . '/../uploads/export/container/' . $model->id . '/';
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
        $path = Yii::$app->basePath . '/../uploads/export/container/' . $id . '/' . $file;
        if (file_exists($path)) {
            unlink($path);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDockexport($id) {

        return $this->renderAjax('docexport', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionHoustonCoverLetter($id) {

        return $this->renderAjax('houston_cover_letter', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionCustomCoverLetter($id) {

        return $this->renderAjax('custom_cover_letter', [
        ]);
    }

    public function actionManifest($id) {

        return $this->renderAjax('manifest', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionBillOfLading($id) {
        return $this->renderAjax('bill_of_lading', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionNonHaz($id) {
        return $this->renderAjax('non_haz', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionDockpdf($id) {
        $content = $this->renderPartial('dockpdf', ['model' => $this->findModel($id),
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

    public function actionManifestpdf($id, $mail = NULL) {
        $content = $this->renderPartial('manifestpdf', ['model' => $this->findModel($id),
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
        if (empty($mail)) {
            return $pdf->render();
        } else {
            return $pdf->render(); //temporary
        }
    }

    public function actionLandingpdf($id, $mail = NULL) {
        $content = $this->renderPartial('landingpdf', ['model' => $this->findModel($id),
        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/bill_of_lading.css',
            'options' => [
                'title' => 'Privacy Policy - Krajee.com',
                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'methods' => [
                'SetHeader' => ['Generated By: AFG Shipping||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        if (empty($mail)) {
            return $pdf->render();
        } else {
            return $pdf->render(); //temporary
        }
    }

    /**
     * Deletes an existing Export model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if ($this->findModel($id)->delete()) {
            $directory = Yii::$app->basePath . '/../uploads/export/container/' . $id;
            if (is_dir($directory)) {
                foreach (glob("{$directory}/*") as $file) {
                    if (!is_dir($file)) {
                        unlink($file);
                    }
                }
                rmdir($directory);
            }
            $directory1 = Yii::$app->basePath . '/../uploads/export/invoice/' . $id;
            if (is_dir($directory1)) {
                foreach (glob("{$directory1}/*") as $file) {
                    if (!is_dir($file)) {
                        unlink($file);
                    }
                }
                rmdir($directory1);
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Export model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Export the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Export::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionVehicleDeatil() {

        $container = $this->findModel($_POST['val']);
        $view = $this->renderPartial('container-vehicles', ['val' => $_POST['val'], 'container' => $container]);
        return $view;
    }

    public function actionCartData() {
        if (Yii::$app->request->isAjax) {
            if (isset(Yii::$app->session['cart'])) {
                $report_content = array('cart_val' => Yii::$app->session['cart']);
                $data['result'] = $report_content;
                return json_encode($data);
            }
        }
    }

    public function actionCheckArno() {
        if (Yii::$app->request->isAjax) {
            $arno = $_POST['arno'];
            $mode = $_POST['mode'];
            if ($mode === "create") {
                $user_exists = Export::find()->where(['ar_no' => $arno])->exists();
            } else {
                $user_exists = Export::find()->where(['ar_no' => $arno])->andWhere(['<>', 'id', $mode])->exists();
            }
            if ($user_exists) {
                $error = 1;
            } else {
                $error = 0;
            }
            return $error;
        }
    }

}
