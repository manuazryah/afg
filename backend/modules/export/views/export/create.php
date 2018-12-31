<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Export */

$this->title = 'Create Export';
$this->params['breadcrumbs'][] = ['label' => 'Exports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

            </div>
            <div class="panel-body">
                <?= Html::a('<i class="fa fa-list"></i><span> Manage Export</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone link-btn']) ?>
                <div class="panel-body"><div class="export-create">
                        <?=
                        $this->render('_form', [
                            'model' => $model,
                            'cart' => $cart
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#export-ar_no').change(function () {
            var arno = $(this).val();
            $.ajax({
                type: 'POST',
                cache: false,
                data: {arno: arno, mode: 'create'},
                url: '<?= Yii::$app->homeUrl ?>export/export/check-arno',
                success: function (data) {
                    if (data == 1) {
                        $(".field-export-ar_no").append("<p class='username-error' style='color: #dd4b39;position: absolute;font-size: 12px;'>Username already exists, choose another one</p>");
                        $("#export-ar_no").css({"border-color": "#dd4b39"});
                    } else {
                        $("#export-ar_no").css({"border-color": "rgb(210, 214, 222)"});
                        $('.username-error').remove();
                    }
                }
            });
        });

       

    });
</script>