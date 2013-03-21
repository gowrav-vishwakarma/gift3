<?php

class page_member_history extends page_member {
	function init(){
		parent::init();
		if($_GET['auto_directed']){
			$this->add('View_Error')->set('You Do not have any Active Entry running, See your History or Topup Again to Participate');
		}
	}
}