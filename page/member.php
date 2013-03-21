<?php

class page_member extends Page {
	function init(){
		parent::init();
		$m=$this->add('Menu');
		$m->addMenuItem('member_area','Home');
		$m->addMenuItem('member_history','History');
		$m->addMenuItem('member_profile','Profile');
	}
}