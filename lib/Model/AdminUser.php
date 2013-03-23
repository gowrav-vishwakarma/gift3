<?php

class Model_AdminUser extends Model_Table {
	var $table='admin_user';
	function init(){
		parent::init();
		$this->addField('name');
		$this->addField('password')->type('password');
		$this->addField('email_id');
	}
}