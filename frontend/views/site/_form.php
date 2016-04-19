<?php

use kartik\widgets\ActiveForm;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

use kartik\widgets\DatePicker;

use kartik\widgets\DepDrop;

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder '=>'Introduce USUARIO']) ?>

    <?= $form->field($model, 'authkey')->passwordInput(['maxlength' => 255, 'value' => '', 'placeholder'=>'Introduce CONTRASEÑA']) ?>
    
    <?= $form->field($model, 'authkeyRepeat')->passwordInput(['maxlength' => 255, 'value' => '', 'placeholder'=>'Repite La CONTRASEÑA']) ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => 50, 'value' => '', 'placeholder'=>'Introduce NOMBRE completo']) ?>
     
    <?= $form->field($model, 'dir')->textInput(['maxlength' => 255, 'value' => '', 'placeholder'=>'Introduce la DIRECCION completa']) ?>
    
    <?= $form->field($model, 'city')->textInput(['maxlength' => 255, 'value' => '', 'placeholder'=>'Introduce la CIUDAD']) ?>
   
    <?php  $catList=ArrayHelper::map(common\models\countries::find()->all(), 'id', 'country_name' );  ?>
    
    <?= $form->field($model, 'country')->dropDownList($catList, [
    		'prompt' => Yii::t('frontend/user', 'Select a country'),
    		'id'=>'id'
    ]); ?>
    
  	<?= $form->field($model, 'state')->widget(DepDrop::classname(), [
		    'options'=>['id'=>'states'],
  			'value' => '',
		    'pluginOptions'=>[
		        'depends'=>['id'],
		        'placeholder'=>Yii::t('frontend/user', 'Select a state'),
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
        
    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 9, 'value' => '', 'placeholder'=>'Introduce el TELEFONO']) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => 30, 'value' => '', 'placeholder'=>'Introduce el EMAIL']) ?>
    
    <div class="form-group">
    
     <?= Html::submitButton(Yii::t('frontend/user', 'Create'), ['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>