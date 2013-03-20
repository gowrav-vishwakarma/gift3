<?php
class Model_Gifter extends Model_Table{
	var $table="gifter";
	function init(){
		parent::init();
		$this->hasOne('Member','member_id');
		$this->addField('can_receive')->type('boolean')->defaultValue(false);
		$this->addField('became_receiver_on')->defaultValue(null)->type('date');
		$this->addField('is_participent')->defaultValue(true);
	}
}