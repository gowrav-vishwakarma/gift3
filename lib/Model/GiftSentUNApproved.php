<?php

class Model_GiftSentUNApproved extends Model_GiftSent {
	function init(){
		parent::init();
		$this->addCondition('is_approved',false);
	}
}