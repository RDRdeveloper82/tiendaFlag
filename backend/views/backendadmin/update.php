<?php

$this->title = Yii::t('backend/admin', 'Update Admin: ') . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/admin', 'Administrators'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username];
$this->params['breadcrumbs'][] = Yii::t('backend/admin', 'Update');
?>
<div class="admin-update">

    <h1><?= $this->title ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
