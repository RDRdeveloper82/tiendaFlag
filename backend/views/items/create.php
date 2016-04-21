<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Items */

$this->title = Yii::t('common/warehouse', 'Create Items');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/warehouse', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-create">

    <h1><?= Html::encode(Yii::t('common/warehouse', 'Create a new ITEM into the WAREHOUSE')) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'modelStock' => $modelStock,
    ]) ?>

</div>
