<?php
class page_config extends Page{
	function init(){
	parent::init();
	$crud=$this->add('CRUD');
	$crud->setModel('Config');
	}
}