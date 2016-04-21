<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\sizes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sizes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'size_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common/warehouse', 'Create') : Yii::t('common/warehouse', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
