<?php
class Model_Config extends Model_Table{
	var $table="config";
	function init(){
		parent::init();
		$this->addField('key');
		$this->addField('value');
		$this->addField('is_forclient')->type('boolean')->defaultValue(false);
	}
}