<?php

$this->title = Yii::t('backend/admin', 'Create Admin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/admin', 'Administrators'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">

    <h1 class="admin-header"><?= $this->title ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

