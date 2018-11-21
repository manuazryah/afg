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
    public function actionIndex() {
        $searchModel = new ExportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
    public function actionCreate() {
        $model = new Export();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
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
            $files = UploadedFile::getInstances($model, 'container_images');
            if (!empty($files))
                $this->Upload($files, $model);
            $invoice = UploadedFile::getInstance($model, 'invoice');
            if (!empty($invoice)) {
                $model->invoice = $invoice->extension;
                $model->update();
                $this->UploadImages($model, $invoice);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
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
        if ($model->load(Yii::$app->request->post())) {
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
            $model->save();
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
     * This function upload invoice
     * return
     */

    public function UploadImages($model, $uploads) {
        $path = Yii::$app->basePath . '/../uploads/export/invoice/' . $model->id;
        FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
        if (!empty($uploads)) {
            $file = $path . '/' . $model->id . '.' . $model->invoice;
            if (file_exists($file)) {
                unlink($file);
            }
            $uploads->saveAs($file);
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

}
