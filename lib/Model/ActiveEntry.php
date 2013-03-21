<?php

class Model_ActiveEntry extends Model_Entry{
	function init(){
		parent::init();
		$this->addCondition('is_participent',true);
	}
}