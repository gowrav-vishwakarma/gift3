<?php
class Model_GiftRequest extends Model_Table{
	var $table="gift_send_request";
	function init(){
		parent::init();

		$this->hasOne('GiftSender','from_id');
		$this->hasOne('GiftReceiver','to_id');
		$this->addField('is_approved')->type('boolean');
		$this->addField('request_date')->defaultValue(date('Y-m-d'))->type('date');
		$this->addField('approved_date')->defaultValue(date('Y-m-d'))->type('date');

	}
}