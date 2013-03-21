<?php

class page_member_area_giftReceivedDetails extends Page {
	
	function page_index(){
		$this->api->stickyGET('gift_id');

		$gift_chk=$this->add('Model_Gift')->load($_GET['gift_id']);

		if($gift_chk['status']=='Approved'){
			$this->add('View_Info')->set('This Gift is alreay Accepted');
		}elseif($gift_chk['status'] == 'Rejected'){
			$this->add('View_Error')->set('This Gift is alreay Rejected');
		}else{
			$c=$this->add('Columns');
			$c1=$c->addColumn(6);
			$c2=$c->addColumn(6);

			$approve_form=$c1->add('Form');
			$approve_form->add('View_Info')->set('Approve Gift');
			$approve_form->addField('password','password');
			$approve_form->addSubmit('Approve');
			
			$reject_form=$c2->add('Form');
			$reject_form->add('View_Error')->set('Reject Gift');
			$reject_form->addField('password','password');
			$reject_form->addSubmit('Reject');

			if($approve_form->isSubmitted()){
				$u=$this->add('Model_Member')->load($this->api->auth->model->id);
				if($approve_form->get('password') != $u['password'])
					$approve_form->displayError('password','Password is not correct');
				$gift=$this->add('Model_Gift')->load($_GET['gift_id']);
				$gift->approve();
				$approve_form->js()->univ()->closeExpander()->successMessage("Gift is marked as Approved")->execute();
			}

			if($reject_form->isSubmitted()){
				$u=$this->add('Model_Member')->load($this->api->auth->model->id);
				if($reject_form->get('password') != $u['password'])
					$reject_form->displayError('password','Password is not correct');
				$gift=$this->add('Model_Gift')->load($_GET['gift_id']);
				$gift->reject();
				$reject_form->js()->univ()->closeExpander()->successMessage("Gift is marked as Rejected")->execute();
			}	
		}
	}

	
}