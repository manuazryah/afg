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

    /**
     * Deletes an existing Export model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

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
