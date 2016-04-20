<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\user;

class LoginFormFrontend extends Model {
	
    public $username;
    public $authkey;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules() {
    	
        return [
            // username and password are both required
            [['username', 'authkey'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['authkey', 'validatePassword'],
        ];
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
    	
        return [
            'username' => Yii::t('frontend/login', 'Username'),
            'authkey' => Yii::t('frontend/login', 'Password'),
            'rememberMe' => Yii::t('frontend/login', 'Remember Me'),
        ];
        
    }

    public function validatePassword($attribute, $params) {
    	
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->authkey)) {
                $this->addError($attribute, Yii::t('frontend/login', 'Incorrect username or password.'));
            }
        }
        
    }


    public function getUser() {
    	
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
        
    }


    public function login() {
    	
    	if ($this->validate()) {
    		return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
    	} else {
    		return false;
    	}
    	
    }
    
}