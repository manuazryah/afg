<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['login', 'error', 'index', 'home', 'forgot', 'new-password'],
                        'allow' => true,
                    ],
                        [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(array('site/home'));
        }

        $this->layout = 'login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login() && $this->setSession()) {

            return $this->redirect(array('site/home'));
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function setSession() {
        Yii::$app->session['encrypted_user_id'] = Yii::$app->EncryptDecrypt->Encrypt('encrypt', Yii::$app->user->identity->id);
        return true;
    }

    public function actionHome() {
        if (isset(Yii::$app->user->identity->id)) {
            if (Yii::$app->user->isGuest) {
                return $this->redirect(array('site/index'));
            }
            return $this->render('index', [
            ]);
        } else {
            throw new \yii\web\HttpException(2000, 'Session Expired.');
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
