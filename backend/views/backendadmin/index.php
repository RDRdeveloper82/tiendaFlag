<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = Yii::t('backend/admin', 'Admin');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="backendadmin-index">

    <h1 class="page-header">
        <?= $this->title ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'],
            ['class' => 'btn btn-success pull-right']) ?>
    </h1>
 
	<?= $this->render('_search', [
        'model' => $searchModel
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summaryOptions' => ['class' => 'alert alert-info'],
        'columns' => [
            'idadmin',
            'username',
        	['class' => 'common\components\ActionButtonGroupColumnAdmin'],
           ],
    ]); ?>
</div>