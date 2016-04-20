<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property integer $id
 * @property string $article_name
 * @property integer $brand_id
 * @property integer $cat_id
 *
 * @property Categories $cat
 * @property Brands $brand
 * @property Stocktaking[] $stocktakings
 * @property Sizes[] $sizes
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'article_name', 'brand_id', 'cat_id'], 'required'],
            [['id', 'brand_id', 'cat_id'], 'integer'],
            [['article_name'], 'string', 'max' => 30],
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
            'id' => Yii::t('common\items', 'ID'),
            'article_name' => Yii::t('common\items', 'Article Name'),
            'brand_id' => Yii::t('common\items', 'Brand ID'),
            'cat_id' => Yii::t('common\items', 'Cat ID'),
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
        return $this->hasMany(Stocktaking::className(), ['item_id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizes()
    {
        return $this->hasMany(Sizes::className(), ['id' => 'size_id'])->viaTable('stocktaking', ['item_id' => 'brand_id']);
    }
}
