<?php

class page_member extends Page {
	function init(){
		parent::init();
		$m=$this->add('Menu');
		$m->addMenuItem('member_area','Home (Current Entry Details)');
		$m->addMenuItem('member_history','History (All Topups Details)');
		$m->addMenuItem('member_details','Profile Details');
		$m->addMenuItem('member_profile','Update Your Profile');
	}
	function render(){
		$this->api->template->del('header');
		parent::render();
	}
}