<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sizes}}".
 *
 * @property integer $id
 * @property string $size_name
 *
 * @property Stocktaking[] $stocktakings
 * @property Items[] $items
 */
class Sizes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sizes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size_name'], 'required'],
            [['size_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common\warehouse', 'ID'),
            'size_name' => Yii::t('common\warehouse', 'Size'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocktakings()
    {
        return $this->hasMany(Stocktaking::className(), ['size_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['id' => 'item_id'])->viaTable('{{%stocktaking}}', ['size_id' => 'id']);
    }
}
