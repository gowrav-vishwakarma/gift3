<?php
class Model_Entry extends Model_Table {
	var $table="entry";
	function init(){
		parent::init();
		$this->hasOne('Member','member_id');
		$this->addField('can_receive')->type('boolean')->defaultValue(false);
		$this->addField('became_receiver_on')->defaultValue(null)->type('date');
		$this->addField('is_participent')->defaultValue(true);
		$this->addField('Priority');

		$this->hasMany('GiftSent','from_id');
		$this->hasMany('GiftSentApproved','from_id');
		$this->hasMany('GiftReceived','to_id');
		$this->hasMany('GiftReceivedApproved','to_id');

		$this->addExpression('name')->set(function ($m,$q){
			return $m->refSQL('member_id')->fieldQuery('name');
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
			$config->loadBy('key','SendRequestOnJoining');
			if($config['value']=='Yes'){
				// SEND THIS  GIFTERS REQUEST 

			}
		}
	}

	function sendGiftRequest(){
		
	}
}