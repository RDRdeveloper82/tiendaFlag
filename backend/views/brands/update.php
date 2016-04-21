<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Brands */

$this->title = Yii::t('common/warehouse', 'Update {modelClass}: ', [
    'modelClass' => 'Brands',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/warehouse', 'Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common/warehouse', 'Update');
?>
<div class="brands-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
