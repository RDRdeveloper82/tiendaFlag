<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Countries extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public static function findIdentity($id){
		return static::findOne($id);
	}

	public static function findIdentityByAccessToken($token, $type = null){
		throw new NotSupportedException();
	}

	public function getId(){
		return $this->id;
	}
	public function getAuthKey(){
		throw new NotSupportedException();
	}

	public function validateAuthKey($authKey){
		throw new NotSupportedException();
	}

}