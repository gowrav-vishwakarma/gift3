<?php

class page_member_details extends Page{
	function init(){
		parent::init();
		$this->api->stickyGET('gift_id');
		$this->api->stickyGET('entry_id');
		$entry=$this->add('Model_Entry')->load($_GET['entry_id']);
		echo $_GET['gift_id'];
		$form=$this->add('Form');
		$form->setModel($this->add('Model_Gift')->load($_GET['gift_id']),array('image_id'));

	}
}