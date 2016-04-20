<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Admin extends ActiveRecord implements \yii\web\IdentityInterface {
	
    /**
     * @inheritdoc
     */
	public $authkeyRepeat = null;
	
    public static function tableName() {
    	
        return '{{%admin}}';
        
    }

    /**
     * @inheritdoc
     */
    public function rules() {
    	
        return [
            [['username', 'authkey', 'authkeyRepeat'], 'required'],
            [['username', 'authkey', 'authkeyRepeat'], 'string', 'max' => 30],
        	[['authkey', 'authkeyRepeat'], 'string',  'min'=>6],
        	[['username'], 'unique'],
        	[['username'], 'email'],
        	['authkeyRepeat', 'compare', 'compareAttribute'=>'authkey', 'message'=>"Las Contraseñas no Coinciden" ],
        ];
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
    	
        return [
            'idadmin'   =>   Yii::t('common/admin', 'Idadmin'),
        	'username' => Yii::t('common/admin', 'Username'),
            'authkey' => Yii::t('common/admin', 'Password'),
        	'authkeyRepeat' => Yii::t('common/admin', 'RePassword'),
        ];
        
    }
   
    public function setPassword($password) {
    	
    	return Yii::$app->getSecurity()->generatePasswordHash($password);
    		
    }
    
    public function beforeSave($insert) {
    	
    	if (parent::beforeSave($insert)) {
    		$this->authkey=$this->setPassword($this->authkey);
    		return true;
    	}
    	else {
    		return false;
    	}
    	
    }
    
    public static function findIdentity($id) {
    	
    	return static::findOne($id);
    
    }
    
    public static function findIdentityByAccessToken($token, $type = null) {
    	
    	throw new NotSupportedException();
    	
    }
    
    public function getId() {
    	
    	return $this->idadmin;
    	
    }
    
    public function getAuthKey() {
    	
    	return $this->authkey;
    	
    }
    
    public function validateAuthKey($authKey) {
    	
    	return $this -> authkey === $authKey;
    	
    }
    
    public static function findByUsername($username) {
    	
    	return self::findOne(['username'=>$username]);
    	
    }
    
    public function validatePassword($password) {

    	return Yii::$app->getSecurity()->validatePassword($password, $this->authkey);
    	
    }
    
}
