<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Admin;


class LoginForm extends Model {
	
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules() {
    	
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
    	
        return [
            'username' => Yii::t('backend/login', 'Username'),
            'password' => Yii::t('backend/login', 'Password'),
            'rememberMe' => Yii::t('backend/login', 'Remember Me'),
        ];
        
    }

    public function validatePassword($attribute, $params) {
    	
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('backend/login', 'Incorrect username or password.'));
            }
        }
        
    }


    public function getUser() {
    	
        if ($this->_user === false) {
            $this->_user = Admin::findByUsername($this->username);
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
