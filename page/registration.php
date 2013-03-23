<?php

class page_registration extends Page {
	function init(){
		parent::init();
		$this->add('H1')->set("Registration");
		$form=$this->add('Form');

		if($_GET['new_username']){
			$m=$form->add('Model_Member');
			$m->loadBy('username',$_GET['new_username']);

			$v=$form->add('View');
			$v=$v->add('View_Info');
			$v->add('H4')->set('New User Registered Sucessfully');
			$v->add('H3')->set("Registered Username :" . $m['username']);
			$v->add('H3')->set("Password :".$m['password']);
		}

		// $this->add('P')->set("hi there <br/> my name is gowrav");

		$submit_btn=$form->addSubmit('Register');
		// $submit_btn->js('click',$submit_btn->js()->hide());
		$form->setModel('Member');
		$re_pass_field=$form->addField('password','re_password');

		// $personal_info=$form->add('View_Info')->set('Enter Your Personal and Login Details');
		$bank_info=$form->add('View_Error')->set('BANK DETAILS CANNOT BE EDITED AFTER WORDS, KINDLY SUBMIT WITH CAUTION');

		$form->getElement('email_id')->validateField(
        'filter_var($this->get(), FILTER_VALIDATE_EMAIL)');

		$form->add('Order')
				->move('re_password','after','password')
				->move($bank_info,'before','bank')
				// ->move($personal_info,'before','name')
				->now();
		// $this->api->template->tryDel('aside');
		// $form->getElement('bank')->setFieldHint("Non Editable Field, Kindly Submit with care");
		// $form->getElement('bank_branch')->setFieldHint("Non Editable Field, Kindly Submit with care");
		// $form->getElement('bank_ifsc_code')->setFieldHint("Non Editable Field, Kindly Submit with care");
		// $form->getElement('bank_account_number')->setFieldHint("Non Editable Field, Kindly Submit with care");
		if($form->isSubmitted()){


			if($form->get('password')!=$form->get('re_password'))
				$form->displayError('re_password','Password does not Match');

			$user_check=$this->add('Model_Member');
			$user_check->addCondition('username',$form->get('username'));
			$user_check->tryLoadAny();

			if($user_check->loaded()){
				$form->displayError('username','User Name is already taken');
			}
			
			$bank_check=$this->add('Model_Member');
			$bank_check->addCondition('bank_account_number',$form->get('bank_account_number'));
			if($bank_check->count()->getOne() >= 3 ){
				$form->displayError('bank_account_number','This Bank Account number is already used three times');
			}

			$mobile_check=$this->add('Model_Member');
			$mobile_check->addCondition('mobile_no',$form->get('mobile_no'));
			if($mobile_check->count()->getOne() >= 3 ){
				$form->displayError('mobile_no','This Mobile Number is already used three times');
			}

			// Doing Entry in DataBase
			$form->update();

			// Sending Mail
			$tm=$this->add('TMail');
			
			$msg=$this->add('SMLite');
			$msg->loadTemplate('mail/mymail');
			$msg->trySet('name', $form->model['name']);
			$msg->trySet('username', $form->model['username']);
			$msg->trySet('password', $form->model['password']);
			$msg->trySet('bank', $form->model['bank']);
			$msg->trySet('bank_branch', $form->model['bank_branch']);
			$msg->trySet('bank_ifsc_code', $form->model['bank_ifsc_code']);
			$msg->trySet('bank_account_number', $form->model['bank_account_number']);
			
			$tm->set('subject','Welcome to Gift3');
			$tm->setHTML($msg->render());
			if(!$e=$tm->send($form->model['email_id'])){
				$this->add('View_Error')->set("Error");
			}

			// SMS ing

			// $submit_url = "http://google.com";
			// $ch = curl_init();
			// curl_setopt($ch, CURLOPT_URL, $submit_url);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_POST, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
			// $result = curl_exec($ch);
			// curl_close($ch);

			$form->js()->reload(array('new_username'=>$form->model['username']))->execute();
		}

	}
}