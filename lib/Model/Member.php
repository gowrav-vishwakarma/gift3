<?php
class Model_Member extends Model_Table{
	var $table="member";
	function init(){
		parent::init();

		$this->addField('name')->mandatory("Name is Must")->caption('Name *');
		$this->addField('username')->mandatory("This is a required field");
		$this->addField('password')->display(array('form'=>'password'))->mandatory("This is a required field");
		$this->addField('bank')->mandatory("This is a required field");
		$this->addField('bank_branch')->mandatory("This is a required field");
		$this->addField('bank_ifsc_code')->mandatory("This is a required field");
		$this->addField('bank_account_number')->mandatory("This is a required field");
		$this->addField('mobile_no')->mandatory("This is a required field");
		$this->addField('email_id')->mandatory("This is a required field");

		$this->hasMany('Entry','member_id');
		$this->hasMany('ActiveEntry','member_id');


		$this->addHook('beforeSave',$this);
		$this->addHook('afterSave',$this);
	}

	function beforeSave(){
		$member=$this->add('Model_Member');
		$member->addCondition('username',$this['username']);
		if($this->loaded())
			$member->addCondition('id','<>',$this->id);
		$member->tryLoadAny();

		if($member->loaded()){
			throw $this->exception('This Username is Allready Taken');
		}

		if(!$this->loaded()){
			$this->memorize('is_new',true);
		}
	}

	function afterSave(){
		if($this->recall('is_new',false)){
			// Add as New gifter also
			$gifter=$this->add('Model_Entry');
			$gifter['member_id'] = $this->id;
			$gifter->save();
		}
	}

}