<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\categories */

$this->title = Yii::t('common/warehouse', 'Update {modelClass}: ', [
    'modelClass' => 'Categories',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/warehouse', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common/warehouse', 'Create Update');
?>
<div class="categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
