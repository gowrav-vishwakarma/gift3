<?php

class Model_GiftReceivedApproved extends Model_GiftReceived {
	function init(){
		parent::init();
		$this->addCondition('is_approved',true);
	}
}