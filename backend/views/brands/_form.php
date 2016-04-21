<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Brands */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brands-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common/warehouse', 'Create Brand') : Yii::t('common/warehouse', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
