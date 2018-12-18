<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\ForgotPasswordTokens;
use common\models\AdminUsers;
use common\models\AdminPosts;
use kartik\mpdf\Pdf;

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
                        'actions' => ['login', 'error', 'index', 'home', 'forgot', 'new-password', 'inventory-content', 'inventory-report', 'inventory-export', 'vehicle-status-report', 'vehicle-status-report-pdf', 'vehicle-status-report-export'],
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
        $model = new AdminUsers();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login() && $this->setSession()) {

            return $this->redirect(array('site/home'));
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function setSession() {
        $post = AdminPosts::findOne(Yii::$app->user->identity->post_id);
        if (!empty($post)) {
            Yii::$app->session['post'] = $post->attributes;
            Yii::$app->session['encrypted_user_id'] = Yii::$app->EncryptDecrypt->Encrypt('encrypt', Yii::$app->user->identity->post_id);
            return true;
        } else {
            return FALSE;
        }
    }

    public function actionHome() {
        $searchModel = new \common\models\VehicleSearch();
        $dataProvider = '';
        if (isset(Yii::$app->request->queryParams['VehicleSearch']) && Yii::$app->request->queryParams['VehicleSearch'] != '') {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            if (Yii::$app->user->identity->post_id != '1') {
                $dataProvider->query->andWhere(['location' => Yii::$app->user->identity->location]);
            }
        }
        if (isset(Yii::$app->user->identity->id)) {
            if (Yii::$app->user->identity->post_id == '1') {
                $onway = \common\models\Vehicle::find()->where(['status_id' => 2])->count();
                $shipped = \common\models\Vehicle::find()->where(['status_id' => 3])->count();
                $onhand = \common\models\Vehicle::find()->where(['status_id' => 1])->count();
                $manifest = \common\models\Vehicle::find()->where(['status_id' => 5])->count();
                $pickedup = \common\models\Vehicle::find()->where(['status_id' => 4])->count();
            } else {
                $onway = \common\models\Vehicle::find()->where(['status_id' => 2, 'location' => Yii::$app->user->identity->location])->count();
                $shipped = \common\models\Vehicle::find()->where(['status_id' => 3, 'location' => Yii::$app->user->identity->location])->count();
                $onhand = \common\models\Vehicle::find()->where(['status_id' => 1, 'location' => Yii::$app->user->identity->location])->count();
                $manifest = \common\models\Vehicle::find()->where(['status_id' => 5, 'location' => Yii::$app->user->identity->location])->count();
                $pickedup = \common\models\Vehicle::find()->where(['status_id' => 4, 'location' => Yii::$app->user->identity->location])->count();
            }
            if (Yii::$app->user->isGuest) {
                return $this->redirect(array('site/index'));
            }
            return $this->render('index', [
                        'onway' => $onway,
                        'shipped' => $shipped,
                        'onhand' => $onhand,
                        'manifest' => $manifest,
                        'pickedup' => $pickedup,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
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
        $model = new AdminUsers();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login() && $this->setSession()) {

            return $this->redirect(array('site/home'));
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

    public function actionForgot() {
        $this->layout = 'login';
        $model = new AdminUsers();
        if ($model->load(Yii::$app->request->post())) {
            $check_exists = AdminUsers::find()->where("user_name = '" . $model->user_name . "' OR email = '" . $model->user_name . "'")->one();

            if (!empty($check_exists)) {
                $token_value = $this->tokenGenerator();
                $token = $check_exists->id . '_' . $token_value;
                //$val = base64_encode($token);
                $val = Yii::$app->EncryptDecrypt->Encrypt('encrypt', $token);

                $token_model = new ForgotPasswordTokens();
                $token_model->user_id = $check_exists->id;
                $token_model->token = $token_value;
                $token_model->save();

                $this->sendMail($val, $check_exists);
                Yii::$app->getSession()->setFlash('success', 'A mail has been sent');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Invalid username');
            }
            return $this->render('forgot-password', [
                        'model' => $model,
            ]);
        } else {
            return $this->render('forgot-password', [
                        'model' => $model,
            ]);
        }
    }

    public function tokenGenerator() {



        $length = rand(1, 1000);
        $chars = array_merge(range(0, 9));
        shuffle($chars);
        $token = implode(array_slice($chars, 0, $length));
        return $token;
    }

    public function sendMail($val, $model) {

        $to = $model->email;
        $subject = 'Change password';
        $message = $this->renderPartial('forgot_mail', ['model' => $model, 'val' => $val]);
//        echo $message;
//        exit;
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <info@afg.com>' . "\r\n";
        mail($to, $subject, $message, $headers);
        return TRUE;
    }

    public function actionNewPassword($token) {
        $this->layout = 'login';
        $data = Yii::$app->EncryptDecrypt->Encrypt('decrypt', $token);

        $values = explode('_', $data);
        $token_exist = ForgotPasswordTokens::find()->where("user_id = " . $values[0] . " AND token = " . $values[1])->one();
        if (!empty($token_exist)) {
            $model = AdminUsers::find()->where("id = " . $token_exist->user_id)->one();
            if (Yii::$app->request->post()) {
                if (Yii::$app->request->post('new-password') == Yii::$app->request->post('confirm-password')) {
                    Yii::$app->getSession()->setFlash('success', 'password changed successfully');
                    $model->password = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('confirm-password'));
                    $model->update();
                    $token_exist->delete();
                    $this->redirect('index');
                } else {
                    Yii::$app->getSession()->setFlash('error', 'password mismatch  ');
                }
            }
            return $this->render('new-password', [
            ]);
        } else {
            
        }
    }

    public function actionInventoryContent() {
        if (Yii::$app->user->identity->post_id == '1') {
            $customers = \common\models\Customers::find()->where(['status' => 1])->all();
        } else {
            $customers = \common\models\Customers::find()->where(['status' => 1, 'state' => Yii::$app->user->identity->location])->all();
        }
        if (Yii::$app->request->isAjax) {
            $report = $this->renderPartial('inventory_content', [
                'customers' => $customers
            ]);
            $report_content = array('report' => $report);
            $data['result'] = $report_content;
            return json_encode($data);
        }
    }

    public function actionInventoryReport() {
        if (Yii::$app->user->identity->post_id == '1') {
            $customers = \common\models\Customers::find()->where(['status' => 1])->all();
        } else {
            $customers = \common\models\Customers::find()->where(['status' => 1, 'state' => Yii::$app->user->identity->location])->all();
        }
        $content = $this->renderPartial('report', [
            'customers' => $customers
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

    public function actionInventoryExport() {
        if (Yii::$app->user->identity->post_id == '1') {
            $customers = \common\models\Customers::find()->where(['status' => 1])->all();
        } else {
            $customers = \common\models\Customers::find()->where(['status' => 1, 'state' => Yii::$app->user->identity->location])->all();
        }
        $content = $this->renderPartial('report', ['customers' => $customers]);
        $file = "daily-report.xls";
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        return $content;
    }

    public function actionVehicleStatusReport() {
        if (Yii::$app->request->isAjax) {
            if (Yii::$app->user->identity->post_id == '1') {
                $vehicles = \common\models\Vehicle::find()->where(['status_id' => $_POST['type']])->all();
            } else {
                $vehicles = \common\models\Vehicle::find()->where(['status_id' => $_POST['type'], 'location' => Yii::$app->user->identity->location])->all();
            }
            $report = $this->renderPartial('vehicle_status_report', [
                'vehicles' => $vehicles,
                'type' => $_POST['type']
            ]);
            $report_content = array('report' => $report);
            $data['result'] = $report_content;
            return json_encode($data);
        }
    }

    public function actionVehicleStatusReportPdf($type) {
        if (Yii::$app->user->identity->post_id == '1') {
            $vehicles = \common\models\Vehicle::find()->where(['status_id' => $type])->all();
        } else {
            $vehicles = \common\models\Vehicle::find()->where(['status_id' => $type, 'location' => Yii::$app->user->identity->location])->all();
        }
        $content = $this->renderPartial('vehicle_status_report_pdf', [
            'vehicles' => $vehicles,
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

    public function actionVehicleStatusReportExport($type) {
        if (Yii::$app->user->identity->post_id == '1') {
            $vehicles = \common\models\Vehicle::find()->where(['status_id' => $type])->all();
        } else {
            $vehicles = \common\models\Vehicle::find()->where(['status_id' => $type, 'location' => Yii::$app->user->identity->location])->all();
        }
        $content = $this->renderPartial('vehicle_status_report_pdf', ['vehicles' => $vehicles,]);
        $file = "vehicle-status-export.xls";
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        return $content;
    }

}
