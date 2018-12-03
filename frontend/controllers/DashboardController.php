<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class DashboardController extends Controller {

        public $layout = '@app/views/layouts/dashboard';
        
        
         public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new \common\models\Customers();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
             return $this->redirect(array('dashboard/home'));
        } else {
            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

        public function actionHome() {
                return $this->render('home', [
                ]);
        }

        
}
