<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
	public $authkeyRepeat = null;
	public $captcha;

    public static function tableName() {
    	
        return '{{%user}}';
        
    }

    /**
     * @inheritdoc
     */
    public function rules() {
    	
        return [
            [['username', 'authkey', 'authkeyRepeat', 'name', 'country', 'state', 'city', 'dir', 'telefono', 'email', 'fechaNac'], 'required'],
        	[['username', 'authkey', 'authkeyRepeat', 'email', 'city'], 'string', 'max' => 30],
        	[['authkey', 'authkeyRepeat', 'username'], 'string',  'min'=>6],
        	[['username', 'email'], 'unique'],
        	[['email'], 'email'],
        	['fechaNac', 'date', 'format' => 'yyyy-mm-dd'],
        	['telefono', 'match', 'pattern' => '/^[9|6|7][0-9]{8}$/', 'message'=>Yii::t('common/user','A telephone number is required')],
        	['authkeyRepeat', 'compare', 'compareAttribute'=>'authkey', 'message'=>"Las Contraseñas no Coinciden" ],
       		['captcha', 'required'],
       		['captcha', 'captcha'],
        ];
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
    	
        return [
            'idadmin'   =>   Yii::t('common/user', 'Idadmin'),
        	'username' => Yii::t('common/user', 'Username'),
            'authkey' => Yii::t('common/user', 'Password'),
        	'authkeyRepeat' => Yii::t('common/user', 'RePassword'),
        	'name' => Yii::t('common/user', 'Name'),
        	'dir' => Yii::t('common/user', 'Address'),
        	'city' => Yii::t('common/user', 'City'),
        	'state' => Yii::t('common/user', 'State'),
        	'country' => Yii::t('common/user', 'Country'),
        	'email' => Yii::t('common/user', 'Email'),
        	'telefono' => Yii::t('common/user', 'Telephone'),
        	'fechaNac' => Yii::t('common/user', 'Date'),
        	'captcha' => Yii::t('common/user', 'Captcha. Click on image for refresh'),
        ];
        
    }
   
    public function setPassword($password) {
    	
    		return Yii::$app->getSecurity()->generatePasswordHash($password);
    		
    }
    
    public function beforeSave($insert) {
    	
    	if(parent::beforeSave($insert)) {
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
    	
    	return $this->iduser;
    	
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