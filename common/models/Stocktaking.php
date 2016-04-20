<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%stocktaking}}".
 *
 * @property integer $item_id
 * @property integer $size_id
 * @property integer $stock
 *
 * @property Sizes $size
 * @property Items $item
 */
class Stocktaking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%stocktaking}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'size_id', 'stock'], 'required'],
            [['item_id', 'size_id', 'stock'], 'integer'],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sizes::className(), 'targetAttribute' => ['size_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['item_id' => 'brand_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => Yii::t('common\brands', 'Item ID'),
            'size_id' => Yii::t('common\brands', 'Size ID'),
            'stock' => Yii::t('common\brands', 'Stock'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Sizes::className(), ['id' => 'size_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Items::className(), ['brand_id' => 'item_id']);
    }
}
