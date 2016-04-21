<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\sizes */

$this->title = Yii::t('common/warehouse', 'Update {modelClass}: ', [
    'modelClass' => 'Sizes',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/warehouse', 'Sizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common/warehouse', 'Update');
?>
<div class="sizes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
