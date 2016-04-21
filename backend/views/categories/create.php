<?php

use yii\helpers\Html;

$this->title = Yii::t('common/warehouse', 'Create Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/warehouse', 'Create Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
