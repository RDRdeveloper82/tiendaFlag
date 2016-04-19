<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use common\models\user;

$this->title = Yii::t('frontend/login', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="login-header"><?= $this->title ?></h1>


<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'authkey')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(
                Yii::t('frontend/login', 'Login'),
                ['class' => 'btn btn-primary', 'name' => 'login-button']
            ) ?>
            <?= Html::a(
            		Yii::t('frontend/login', 'SignUp'), 
            		['/site/register'], 
            		['class'=>'btn btn-primary']
            ) ?>
            
        </div>
      
        <?php ActiveForm::end(); ?>
    </div>
</div>

