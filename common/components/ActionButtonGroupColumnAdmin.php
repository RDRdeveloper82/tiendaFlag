<?php
namespace common\components;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Html;

class ActionButtonGroupColumnAdmin extends ActionColumn
{
    protected function initDefaultButtons()
    {
        $this->template = '<div class="btn-group">' . $this->template . '</div>';

        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, array_merge([
                    'title' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-primary btn-xs',
                ], $this->buttonOptions));
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, array_merge([
                    'title' => Yii::t('yii', 'Delete'),
                    'class' => 'btn btn-danger btn-xs',
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ], $this->buttonOptions));
            };
        }
    }
}