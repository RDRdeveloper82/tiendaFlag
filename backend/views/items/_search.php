<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'item_name') ?>

    <?= $form->field($model, 'brand_id') ?>

    <?= $form->field($model, 'cat_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common/warehouse', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('common/warehouse', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
