<?php

use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
               aria-controls="collapseOne">
                <?= Yii::t('backend/admin', 'Search Admins') ?>
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="backend-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <?= $form->field($model, 'idadmin') ?>

                <?= $form->field($model, 'username') ?>  

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('backend/admin', 'Search'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Yii::t('backend/admin', 'Reset'), ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>