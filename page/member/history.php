<?php

class page_member_history extends page_member {
	function init(){
		parent::init();
		$member=$this->api->auth->model;

		if($_GET['auto_directed']){
			$this->add('View_Error')->set('You Do not have any Active Entry running, See your History or Topup Again to Participate');
		}

		$form=$this->add('Form');
		$form->addField('dropdown','for_entry')->setModel($member->ref('Entry'));
		$form->addSubmit('Get details');
		if($form->isSubmitted()){
			$form->js()->univ()->redirect($this->api->url(null,array('entry_selected'=>$form->get('for_entry'))))->execute();
		}
		// parent::init();
		if($_GET['entry_selected']){
			$entry=$this->add('Model_Entry')->load($_GET['entry_selected']);
		}else{
			return;
		}
		// if(!$entry->loaded()){
		// 	$this->api->redirect('member_history',array('auto_directed'=>1));
		// }
		$gift_sent = $entry->ref('GiftSent');//->addCondition('status','Pending');

		$gift_sent_approved=$entry->ref('GiftSentApproved')->tryLoadAny();
		$upper_view=$this->add('View');
		$upper_view->setStyle('padding','10px');
		if($gift_sent_approved->loaded()){
			$button=$this->add('Button');
			$button->addStyle('padding','10px');
			$button->addStyle('margin','auto');
			$button->addStyle('width','100%');
			$button->removeClass('ui-state-default');
			$button->setText('You Already Have Sent a Gift that is Approved, Show Your Sent Gift Details');
			$button->js('click',array($upper_view->js()->slideDown(),$button->js()->slideUp()));
			$this->js(true,$upper_view->js()->hide());
		}

		$upper_view->add('H3')->set('Send Gift To');
		$to_member=$gift_sent->join('member.id','to_id');
		$to_member->addField('mobile_no');
		$g=$upper_view->add('Grid');
		$g->setModel($gift_sent,array('request_date','to','mobile_no','status'));
		$g->addColumn('Expander','giftSendDetails','Details');

		if($entry['can_receive']){
			$this->add('H3')->set('Collect Gift From ');
			$gift_received=$entry->ref('GiftRequestReceived');

			$grid=$this->add('Grid');
			$grid->setModel($gift_received,array('from','request_date','image_thumb'));
			$grid->addFormatter('image_thumb','picture');

			$grid->addColumn('Expander','giftReceivedDetails','Details');
		}else{
			$this->add('View_Error')->set('Send A gift To some one else first, to get Gifts from Others');
		}


	
	}
}