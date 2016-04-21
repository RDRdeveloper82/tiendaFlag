<?php

namespace common\models;

use Yii;

class Items extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%items}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'cat_id', 'brand_id'], 'required'],
            [['cat_id', 'brand_id'], 'integer'],
            [['item_name'], 'string', 'max' => 30],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cat_id' => 'id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/warehouse', 'ID'),
            'item_name' => Yii::t('common/warehouse', 'Item Name'),
            'cat_id' => Yii::t('common/warehouse', 'Cat'),
            'brand_id' => Yii::t('common/warehouse', 'Brand'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocktakings()
    {
        return $this->hasMany(Stocktaking::className(), ['item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizes()
    {
        return $this->hasMany(Sizes::className(), ['id' => 'size_id'])->viaTable('{{%stocktaking}}', ['item_id' => 'id']);
    }
}
