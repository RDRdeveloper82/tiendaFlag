<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\sizes */

$this->title = Yii::t('common/warehouse', 'Create Sizes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/warehouse', 'Sizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sizes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
