<?php

class page_member_area_giftSendDetails extends Page{
	function init(){
		parent::init();

		$this->api->stickyGET('gift_id');
		$gift=$this->add('Model_Gift');
		$gift->load($_GET['gift_id']);
		
		
		$c=$this->add('Columns');
		$c->addClass('intro');
		$c1=$c->addColumn(6);
		$c2=$c->addColumn(6);

		$c1->add('H3')->set('Person Name ');
		$c1->add('H5')->set($gift['to_name']);
		$c2->add('H3')->set('Bank Name ');
		$c2->add('H5')->set($gift->ref('to_id')->ref('member_id')->get('bank'));
		$c1->add('H3')->set('Bank Branch ');
		$c1->add('H5')->set($gift->ref('to_id')->ref('member_id')->get('bank_branch'));
		$c2->add('H3')->set('Acc No ');
		$c2->add('H5')->set($gift->ref('to_id')->ref('member_id')->get('bank_account_number'));
		$c1->add('H3')->set('Bank IFSC ');
		$c1->add('H5')->set($gift->ref('to_id')->ref('member_id')->get('bank_ifsc_code'));
		
		if(false){
			$c2->add('H3')->set('Your Bank Receipt');
			$form=$c2->add('Form');
			$form->setModel($gift,array('image_id'));
			$form->addSubmit('Save');
			if($form->isSubmitted()){
				$form->update();
				$form->js()->reload()->execute();
			}
		}else{
			$c2->add('H3')->set('Your Bank Receipt');
			$c2->add('HtmlElement')->setElement('img')->setAttr('src',$gift['image']);
		}

	}
}