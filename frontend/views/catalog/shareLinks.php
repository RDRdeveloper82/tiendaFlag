<?php
use ijackua\sharelinks\ShareLinks;
use kartik\icons\Icon;
use yii\helpers\Html;

/* @var $this yii\web\View */
?>

<div class="socialShareBlock">
    <?= Html::a(Icon::show('facebook'),
        $this->context->shareUrl(ShareLinks::SOCIAL_FACEBOOK),
        [
            'title' => Yii::t('frontend/catalog', 'Share on Facebook'),
            'class' => 'btn btn-xs btn-default',
        ]
    ) ?>
    <?= Html::a(Icon::show('twitter'),
        $this->context->shareUrl(ShareLinks::SOCIAL_TWITTER),
        [
            'title' => Yii::t('frontend/catalog', 'Share on Twitter'),
            'class' => 'btn btn-xs btn-default',
        ]
    ) ?>
    <?= Html::a(Icon::show('google-plus'),
        $this->context->shareUrl(ShareLinks::SOCIAL_GPLUS),
        [
            'title' => Yii::t('frontend/catalog', 'Share on Google Plus'),
            'class' => 'btn btn-xs btn-default',
        ]
    ) ?>

</div>