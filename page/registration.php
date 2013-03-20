<?php

class page_registration extends Page {
	function init(){
		parent::init();
		$this->add('H1')->set("Registration");
		// $this->add('P')->set("hi there <br/> my name is gowrav");
		$form=$this->add('Form');

		$form->addSubmit('Register');
		$form->setModel('Member');
		$re_pass_field=$form->addField('password','re_password');

		$form->add('Order')->move('re_password','after','password')->now();
		// $this->api->template->tryDel('aside');
	if($form->isSubmitted()){

			if($form->get('password')!=$form->get('re_password'))
				$form->displayError('re_password','Password does not Match');
			
			$form->update()->js()->reload()->execute();

		}

	}
}