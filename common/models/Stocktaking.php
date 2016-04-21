<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%stocktaking}}".
 *
 * @property integer $item_id
 * @property integer $size_id
 * @property string $stock
 *
 * @property Items $item
 * @property Sizes $size
 */
class Stocktaking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $id = null;
	
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
            [['item_id', 'size_id'], 'integer'],
        	[['stock'], 'number', 'min' => 0],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sizes::className(), 'targetAttribute' => ['size_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => Yii::t('common\warehouse', 'Item'),
            'size_id' => Yii::t('common\warehouse', 'Size'),
            'stock' => Yii::t('common\warehouse', 'Stock'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Items::className(), ['id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Sizes::className(), ['id' => 'size_id']);
    }
}
