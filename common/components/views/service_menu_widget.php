<?php

use yii\helpers\Html;

$param_link = Yii::$app->getRequest()->getQueryParam('service');
$service_data_links = common\models\Services::find()->where(['status' => 1])->all();
?>
<aside class="sidebar-services">
    <h3 class="heading">OUR SERVICES</h3>
    <ul class="tab-service">
        <li><?= Html::a('All', ['/site/services'], ['class' => '']) ?></li>
        <?php
        if (!empty($service_data_links)) {
            foreach ($service_data_links as $service_data_link) {
                if (!empty($service_data_link)) {
                    ?>
                    <li class="<?= $param_link == $service_data_link->canonical_name ? 'active' : '' ?>">
                        <?= Html::a($service_data_link->service_name, ['/site/service-details', 'service' => $service_data_link->canonical_name], ['class' => '']) ?>
                    </li>
                    <?php
                }
            }
        }
        ?>
    </ul>
</aside>