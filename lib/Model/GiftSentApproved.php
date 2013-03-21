<?php

class Model_GiftSentApproved extends Model_GiftSent {
	function init(){
		parent::init();
		$this->addCondition('is_approved',true);
	}
}