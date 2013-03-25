<?php

class page_member_profile extends page_member {
	function init(){
		parent::init();
		$this->add('H4')->set('Change Your Password Here');
		
		$form=$this->add('Form');


		if($_GET['updated']){
			$form->add('View_Info')->set('Information Updated, Logout and Log in Again to use your Updated Values');
		}
		
		$form->setModel($this->api->auth->model,array('password','bank','bank_branch','bank_ifsc_code','bank_account_number'));
		$repass_field=$form->addField('password','re_password');
		$form->add('Order')->move('re_password','after','password')->now();
		$form->addSubmit("Update");

		if($form->isSubmitted()){
			if($form->get('re_password') != $form->get('password')){
				$form->displayError('re_password',"Password must match");
			}
			$form->update();
			$form->js()->reload(array('updated'=>1))->execute();
		}
	}
}