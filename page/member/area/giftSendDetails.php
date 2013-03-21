<?php

class page_member_area_giftSendDetails extends Page{
	function page_index(){
		// parent::init();

		$this->api->stickyGET('gift_id');
		$gift=$this->add('Model_Gift');
		$gift->load($_GET['gift_id']);
		
		
		$c=$this->add('Columns');
		$c->addClass('ui-widget ui-widget-content ui-corner-all');
		$c1=$c->addColumn(6);
		$c2=$c->addColumn(6);

		$c1->add('H3')->set($gift['to_name']);
		$c1->add('H5')->set('Person Name ');
		$c2->add('H3')->set($gift->ref('to_id')->ref('member_id')->get('bank'));
		$c2->add('H5')->set('Bank Name ');
		$c1->add('H3')->set($gift->ref('to_id')->ref('member_id')->get('bank_branch'));
		$c1->add('H5')->set('Bank Branch ');
		$c2->add('H3')->set($gift->ref('to_id')->ref('member_id')->get('bank_account_number'));
		$c2->add('H5')->set('Acc No ');
		$c1->add('H3')->set($gift->ref('to_id')->ref('member_id')->get('bank_ifsc_code'));
		$c1->add('H5')->set('Bank IFSC ');
		
		if($gift['status']=='Pending'){
			$c2->add('H3')->set('Your Bank Receipt');
			$form=$c2->add('Form');
			$form->setModel($gift,array('image_id'));
			$form->addSubmit('Finalize My Upload');
			if($gift['image_id']){
				$img=$form->add('HtmlElement')->setElement('img');
				$img->setAttr('src',$gift['image_thumb']);
				$img->js('click',
						$img->js()->univ()->frameURL('FullImage',$this->api->url('./showImage',array('gift_id'=>$gift->id)))
					);
			}
			if($form->isSubmitted()){
				$form->update();
				$form->js()->reload()->execute();
			}
		}else{
			$c2->add('H3')->set('Your Bank Receipt');
			$img=$c2->add('HtmlElement')->setElement('img');
			$img->setAttr('src',$gift['image_thumb']);
			$img->js('click',
					$img->js()->univ()->frameURL('FullImage',$this->api->url('./showImage',array('gift_id'=>$gift->id)))
				);
		}
	}

	function page_showImage(){
		$gift=$this->add('Model_Gift')->load($_GET['gift_id']);
		$img=$this->add('HtmlElement')->setElement('img');
			$img->setAttr('src',$gift['image']);
	}
}