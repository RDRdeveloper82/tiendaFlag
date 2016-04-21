<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%brands}}".
 *
 * @property integer $id
 * @property string $brand_name
 *
 * @property Items[] $items
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%brands}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_name'], 'required'],
            [['brand_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common\warehouse', 'ID'),
            'brand_name' => Yii::t('common\warehouse', 'Brand Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['brand_id' => 'id']);
    }
}
