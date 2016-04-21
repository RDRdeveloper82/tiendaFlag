<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BrandsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common/warehouse', 'Brands');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brands-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('common/warehouse', 'Create Brands'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'brand_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
