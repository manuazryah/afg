<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppointmentWidget
 *
 * @author
 * JIthin Wails
 */

namespace common\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

class StepsWidget extends Widget {

        public $id;

        public function init() {
                parent::init();
                if ($this->id === null) {
                        return '';
                }
        }

        public function run() {
                $step1 = \common\models\Step1::findOne(1)->page_title;
                $step2 = \common\models\Step2::findOne(1)->page_title;
                $step3 = \common\models\Step3::findOne(1)->page_title;
                $step4 = \common\models\Step4::findOne(1)->page_title;
                $step5 = \common\models\Step5::findOne(1)->page_title;
                $step6 = \common\models\Step6::findOne(1)->page_title;
                $step7 = \common\models\Step7::findOne(1)->page_title;
                $step8 = \common\models\Step8::findOne(1)->page_title;
                $step9 = \common\models\Step9::findOne(1)->page_title;
                $step10 = \common\models\Step10::findOne(1)->page_title;

                return $this->render('steps_view', [
                            'step1' => $step1,
                            'step2' => $step2,
                            'step3' => $step3,
                            'step4' => $step4,
                            'step5' => $step5,
                            'step6' => $step6,
                            'step7' => $step7,
                            'step8' => $step8,
                            'step9' => $step9,
                            'step10' => $step10,
                ]);
        }

}

?>
