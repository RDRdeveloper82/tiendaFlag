<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;


class Admin extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public static function findIdentity($id){	
		return static::findOne($id);	
	}

	public static function findIdentityByAccessToken($token, $type = null){	
		throw new NotSupportedException();
	}
	
	public function getId(){
		return $this->idadmin;	
	}
	public function getAuthKey(){	
		return $this->authkey;	
	}
	
	public function validateAuthKey($authKey){	
		return $this -> authkey === $authKey;
	}
	
	public static function findByUsername($username){
		return self::findOne(['username'=>$username]);
	}
	
	public function validatePassword($password){
		//return $this->authkey === Yii::$app->getSecurity()->generatePasswordHash($password);
		return Yii::$app->getSecurity()->validatePassword($password, $this->authkey);
	}
}
