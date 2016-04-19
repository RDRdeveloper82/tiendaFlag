<?php

use yii\db\Schema;
use yii\db\Migration;

class m160414_122450_create_admin extends Migration
{
    public function safeUp()
    {
     	$tableOptions = null;
    	if ($this->db->driverName === 'mysql'){
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    	}
    	
    	$this->createTable('{{%admin}}', [
    			'idadmin' => Schema::TYPE_PK,
    			'username' => Schema::TYPE_STRING . ' NOT NULL',
    			'authkey' => Schema::TYPE_STRING . ' NOT NULL',
    	], $tableOptions);
    }
    
    public function safeDown(){
    	$this->dropTable('{{%admin}}');
    }
    
}
