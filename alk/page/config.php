<?php
class page_config extends Page{
	function init(){
	parent::init();
	$crud=$this->add('CRUD',array('allow_add'=>false,"allow_del"=>false));
	$conf=$this->add('Model_Config');
	$conf->addCondition('is_forclient',true);
	$crud->setModel($conf);
	}
}