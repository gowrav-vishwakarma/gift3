<?php
class Model_Entry extends Model_Table {
	var $table="entry";
	function init(){
		parent::init();
		$this->hasOne('Member','member_id');
		$this->addField('can_receive')->type('boolean')->defaultValue(false);
		$this->addField('became_receiver_on')->defaultValue(null)->type('date');
		$this->addField('is_participent')->type('boolean')->defaultValue(true);
		$this->addField('Priority');

		$this->hasMany('GiftSent','from_id');
		$this->hasMany('GiftSentApproved','from_id');
		$this->hasMany('GiftRequestReceived','to_id');
		$this->hasMany('GiftReceivedApproved','to_id');

		$this->addExpression('name')->set(function ($m,$q){
			return $m->refSQL('member_id')->fieldQuery('name');
		});

		$this->addExpression('sent_count')->set(function($m,$q){
			return $m->refSQL('GiftSent')->count();
		});

		$this->addExpression('received_count')->set(function($m,$q){
			return $m->refSQL('GiftRequestReceived')->count();
		});

		$this->addHook('beforeSave',$this);
		$this->addHook('afterSave',$this);
	}

	function beforeSave(){
		if(!$this->loaded()){
			$this->memorize('is_new',true);
		}
	}

	function afterSave(){
		if($this->recall('is_new',false)){
			$config=$this->add("Model_Config");
			$config->loadBy('key',SEND_REQUEST_ON_JOINING_KEY);
			if($config['value']=='Yes'){
				// SEND THIS  GIFTERS REQUEST 
				$this->sendGiftRequest();
			}
		}
	}

	function sendGiftRequest($to="Auto"){
		if($to == "Auto"){
			$to=$this->getNextReceiver();
		}
		$gift=$this->add('Model_Gift');
		$gift['from_id']=$this->id;
		$gift['to_id']=$to;
		$gift->save();
	}

	function getNextReceiver(){
		return 1;
	}

	function getGiftRequestForAdminIDs(){
		return "This system is not implimented yet";
	}
}