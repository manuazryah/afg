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
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Customers();
        //if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            $uploads = UploadedFile::getInstance($model, 'upload_documents');
            if (!empty($uploads)) {
                $model->upload_documents = $uploads->extension;
            }
            if ($model->validate() && $model->save()) {
                if (!empty($uploads))
                    $this->Upload($model, $uploads);
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

        if ($model->load(Yii::$app->request->post())) {
            $uploads = UploadedFile::getInstance($model, 'upload_documents');
            if (!empty($uploads)) {
                $model->upload_documents = $uploads->extension;
            } else {
                $model->upload_documents = $uploads_;
            }
            if ($model->validate() && $model->save()) {
                if (!empty($uploads))
                    $this->Upload($model, $uploads);
            }

            Yii::$app->getSession()->setFlash('success', "Updated Successfully");
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function Upload($model, $uploads) {
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

}
