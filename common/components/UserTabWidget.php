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

class UserTabWidget extends Widget {

  
    public $step;

    public function init() {
        parent::init();
    }

    public function run() {
        return $this->render('user_tab', [
                    'step' => $this->step,
        ]);
    }

}

?>
