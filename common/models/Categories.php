<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property integer $id
 * @property string $category_name
 *
 * @property Items[] $items
 */
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
            [['id', 'category_name'], 'required'],
            [['id'], 'integer'],
            [['category_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common\brands', 'ID'),
            'category_name' => Yii::t('common\brands', 'Category Name'),
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
