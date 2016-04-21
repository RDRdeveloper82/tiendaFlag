<?php

namespace common\models;

use Yii;

class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
            [['category_name'], 'required'],
            [['category_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        	'id' => Yii::t('common/warehouse', 'ID'),
        	'category_name' => Yii::t('common/warehouse', 'Category'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['cat_id' => 'id']);
    }
}
