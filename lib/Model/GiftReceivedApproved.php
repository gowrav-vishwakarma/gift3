<?php

class Model_GiftReceivedApproved extends Model_GiftRequestReceived {
	function init(){
		parent::init();
		$this->addCondition('status','Approved');
	}
}