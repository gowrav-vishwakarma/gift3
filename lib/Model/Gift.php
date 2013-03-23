<?php
class Model_Gift extends Model_Table{
	var $table="gift";
	function init(){
		parent::init();

		$this->hasOne('Entry','from_id');
		$this->hasOne('Entry','to_id');
		$this->addField('status')->enum(array('Pending','Approved','Rejected'))->defaultValue('Pending');
		$this->addField('request_date')->defaultValue(date('Y-m-d'))->type('date');
		$this->addField('approved_date')->defaultValue(null)->type('date');
		$this->add('filestore/Field_Image','image_id')->type('image')->addThumb();//->display(array('grid'=>'picture','form'=>'image'));//->setMode('plain');

		$this->addExpression('to_name')->set(function ($m,$q){
			return $m->refSQL('to_id')->fieldQuery('name');
		});

		$this->addExpression('from_name')->set(function ($m,$q){
			return $m->refSQL('from_id')->fieldQuery('name');
		});


	}

	function approve(){
		$this['status']='Approved';
		$this['approved_date']=date('Y-m-d');
		$this->save();
		
		$sender=$this->ref('from_id');
		$sender['can_receive']=true;
		$sender['became_receiver_on']=date('Y-m-d');
		$sender->save();

		$receiver = $this->ref('to_id');
		$config=$this->add('Model_Config')->loadBy('key',MAX_GIFT_ALLOWED_KEY);
		if($receiver->ref('GiftReceivedApproved')->count()->getOne() >= $config['value']){
			$receiver['is_participent']=0;
			$receiver->save();
		}
	}

	function reject(){
		$this['status']='Rejected';
		$this->save();
	}
}