<?php

use yii\helpers\Html;
?>
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="<?= $step == 1 ? 'active' : '' ?>">
		<?= Html::a('Bio graphical Info', ['biographical'], ['class' => 'step-links']) ?>
	</li>
	
	<li role="presentation" class="<?= $step == 2 ? 'active' : '' ?>">
		<?= Html::a('Family Info', ['family'], ['class' => 'step-links']) ?>
	</li>
	<li role="presentation" class="<?= $step == 3 ? 'active' : '' ?>">
		<?= Html::a('Childrens Info', ['childrens'], ['class' => 'step-links']) ?>
	</li>
        
        <li role="presentation" class="<?= $step == 4 ? 'active' : '' ?>">
		<?= Html::a('Contact Info', ['contact'], ['class' => 'step-links']) ?>
	</li>
	
</ul>