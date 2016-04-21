<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\sizes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/warehouse', 'Sizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sizes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common/warehouse', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common/warehouse', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common/warehouse', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'size_name',
        ],
    ]) ?>

</div>
