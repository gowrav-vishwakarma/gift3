<?php
class Model_Gift extends Model_Table{
	var $table="gift";
	function init(){
		parent::init();

		$this->hasOne('Entry','from_id');
		$this->hasOne('Entry','to_id');
		$this->addField('is_approved')->type('boolean')->defaultValue(false);
		$this->addField('is_rejected')->type('boolean')->defaultValue(false);
		$this->addField('request_date')->defaultValue(date('Y-m-d'))->type('date');
		$this->addField('approved_date')->defaultValue(null)->type('date');
		$this->add('filestore/Field_Image','image_id')->type('image');//->display(array('grid'=>'picture','form'=>'image'));//->setMode('plain');

		$this->addExpression('to_name')->set(function ($m,$q){
			return $m->refSQL('to_id')->fieldQuery('name');
		});

		$this->addExpression('from_name')->set(function ($m,$q){
			return $m->refSQL('from_id')->fieldQuery('name');
		});
	}

	function acceptRequest(){

	}

	function rejectRequest(){
		
	}
}