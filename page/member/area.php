<?php

class page_member_area extends page_member {
	function page_index(){
		// parent::init();
		$member=$this->api->auth->model;
		$entry=$member->ref('ActiveEntry')->tryLoadAny();
		$gift_sent = $entry->ref('GiftSent')->addCOndition('is_approved',false)->addCondition('is_rejected',false)->tryLoadAny();

		$this->add('H3')->set('Send Gift To');
		$g=$this->add('Grid');
		$g->setModel($gift_sent,array('request_date','to'));
		$g->addColumn('Expander','giftSendDetails','Details');

		$this->add('H3')->set('Collect Gift From ');
		$gift_received=$entry->ref('GiftReceived');

		$grid=$this->add('Grid');
		$grid->setModel($gift_received);
		$grid->addFormatter('image','picture');

		$grid->addColumn('Expander','giftReceivedDetails','Details');

	}



}