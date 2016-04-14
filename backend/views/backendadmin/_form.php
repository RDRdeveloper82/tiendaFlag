<?php

use kartik\widgets\ActiveForm;

use yii\helpers\Html;

?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder '=>'Introduce Usuario']) ?>

    <?= $form->field($model, 'authkey')->passwordInput(['maxlength' => 255, 'value' => '', 'placeholder'=>'Introduce Contraseña']) ?>
    
    <?= $form->field($model, 'authkeyRepeat')->passwordInput(['maxlength' => 255, 'value' => '', 'placeholder'=>'Repite La Contraseña']) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend/admin', 'Create') : Yii::t('backend/admin',
            'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>