<?php

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

use kartik\widgets\DepDrop;

/* @var $this yii\web\View */
/* @var $model common\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">
	
	<?= Html::tag('h5', Html::encode(Yii::t('common/warehouse', 'Please, fill in all the data fields'))) ?>
	
	<?= Html::tag('br', Html::encode('')) ?>

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true, 'placeholder '=>Yii::t('common/warehouse', 'Enter the ITEM NAME')]) ?>
    
    <?php  $brandList=ArrayHelper::map(common\models\Brands::find()->all(), 'id', 'brand_name' );  ?>
    
    <?= $form->field($model, 'brand_id')->dropDownList($brandList, [
    		'prompt' => Yii::t('common/warehouse', 'Select a BRAND'),
    		'id'=>'id'
    ]); ?>
    
    <?php  $catList=ArrayHelper::map(common\models\Categories::find()->all(), 'id', 'category_name' );  ?>
    
    <?= $form->field($model, 'cat_id')->dropDownList($catList, [
    		'prompt' => Yii::t('common/warehouse', 'Select a CATEGORY'),
    		'id'=>'id'
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common/warehouse', 'Create Item') : Yii::t('common/warehouse', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
