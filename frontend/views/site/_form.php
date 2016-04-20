<?php

use kartik\widgets\ActiveForm;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

use kartik\widgets\DatePicker;

use kartik\widgets\DepDrop;

use yii\captcha\Captcha;

?>

<div class="user-form">
	
	<?= Html::tag('h1', Html::encode(Yii::t('frontend/register', 'Sign Up your tiendaFlag account')), ['class' => 'username']) ?>
	
	<?= Html::tag('h5', Html::encode(Yii::t('frontend/register', 'Please, fill in all the data fields')), ['class' => 'username']) ?>
	
	<?= Html::tag('br', Html::encode(''), ['class' => 'username']) ?>
	
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder '=>Yii::t('frontend/register', 'Enter an USER name for your account')]) ?>

    <?= $form->field($model, 'authkey')->passwordInput(['maxlength' => 255, 'value' => '', 'placeholder'=>Yii::t('frontend/register', 'Enter your PASSWORD')]) ?>
    
    <?= $form->field($model, 'authkeyRepeat')->passwordInput(['maxlength' => 255, 'value' => '', 'placeholder'=>Yii::t('frontend/register', 'Repeat your PASSWORD')]) ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => 50, 'value' => '', 'placeholder'=>Yii::t('frontend/register', 'Enter your NAME')]) ?>
     
    <?= $form->field($model, 'dir')->textInput(['maxlength' => 255, 'value' => '', 'placeholder'=>Yii::t('frontend/register', 'Enter your ADDRESS')]) ?>
    
    <?= $form->field($model, 'city')->textInput(['maxlength' => 255, 'value' => '', 'placeholder'=>Yii::t('frontend/register', 'Enter your CITY')]) ?>
   
    <?php  $catList=ArrayHelper::map(common\models\countries::find()->all(), 'id', 'country_name' );  ?>
    
    <?= $form->field($model, 'country')->dropDownList($catList, [
    		'prompt' => Yii::t('frontend/register', 'Select a COUNTRY'),
    		'id'=>'id'
    ]); ?>
    
  	<?= $form->field($model, 'state')->widget(DepDrop::classname(), [
		    'options'=>['id'=>'states'],
  			'value' => '',
		    'pluginOptions'=>[
		        'depends'=>['id'],
		        'placeholder'=>Yii::t('frontend/register', 'Select a STATE'),
		        'url'=>\yii\helpers\Url::to(['/site/states'])
		    ]
  			
		]);
  	?>	
  	
        
  	<?= $form->field($model, 'fechaNac')->widget(\kartik\widgets\DatePicker::classname(),[
    	'name' => 'dp_2',
    	'type' => DatePicker::TYPE_COMPONENT_PREPEND,
    	'value' => '',
    	'pluginOptions' =>[
        	'autoclose'=>true,
    		'todayHighlight' => true,
        	'format' => 'yyyy-mm-dd',
    		'endDate' => '+0d',
    		]	
  		])
  	?>
        
    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 9, 'value' => '', 'placeholder'=>Yii::t('frontend/register', 'Enter your PHONE')]) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => 30, 'value' => '', 'placeholder'=>Yii::t('frontend/register', 'Enter your EMAIL')]) ?>
    
    <?= $form->field($model, 'captcha')->widget(Captcha::classname(), [		

		]);
    ?>
    
    <div class="form-group">
    
     <?= Html::submitButton(Yii::t('frontend/register', 'Create'), ['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>