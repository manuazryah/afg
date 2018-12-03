<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <div class="panel-body"><div class="export-view">
                        <p>
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Customers</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                        </p>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>CUSTOMER NAME</th>
                                        <td><?= $model->name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>CUSTOMER Id</th>
                                        <td><?= $model->customer_id; ?></td>
                                    </tr>
                                    <tr>
                                        <th>COMPANY NAME</th>
                                        <td><?= $model->company_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>EMAIL</th>
                                        <td><?= $model->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ADDRESS 1</th>
                                        <td><?= $model->address1; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ADDRESS 2</th>
                                        <td><?= $model->address2; ?></td>
                                    </tr>
                                     <tr>
                                        <th>PHONE USA</th>
                                        <td><?= $model->phone_usa; ?></td>
                                    </tr>
                                    <tr>
                                        <th>PHONE UAE</th>
                                        <td><?= $model->phone_uae; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>CITY</th>
                                        <td><?= $model->city; ?></td>
                                    </tr>
                                    <tr>
                                        <th>STATE</th>
                                        <td><?= $model->state; ?></td>
                                    </tr>
                                    <tr>
                                        <th>COUNTRY</th>
                                        <td><?= $model->country; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ZIP CODE</th>
                                        <td><?= $model->zipcode; ?></td>
                                    </tr>
                                    <tr>
                                        <th>TRN UAE</th>
                                        <td><?= $model->trn_uae; ?></td>
                                    </tr>
                                    <tr>
                                        <th>TRN USA</th>
                                        <td><?= $model->trn_usa; ?></td>
                                    </tr>
                                    <tr>
                                        <th>OTHER EMAILS</th>
                                        <td><?= $model->other_emails; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>NOTE</th>
                                        <td><?= $model->notes; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


