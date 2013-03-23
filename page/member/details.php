<?php

class page_member_details extends page_member{
	function init(){
		parent::init();
		
		$this->add('View_Info')->set('Your Personal Details');
		$c= $this->add("Columns");
		$c1=$c->addColumn(6);
		$c2=$c->addColumn(6);
		
		$c1->add('H3')->set($this->api->auth->model['name']);
		$c1->add('H5')->set('Your Registered Name');

		$c2->add('H3')->set($this->api->auth->model['username']);
		$c2->add('H5')->set('Your Registered UserName');

		$c1->add('H3')->set($this->api->auth->model['bank']);
		$c1->add('H5')->set('Your Registered Bank');

		$c2->add('H3')->set($this->api->auth->model['bank_branch']);
		$c2->add('H5')->set('Your Registered Bank');

		$c1->add('H3')->set($this->api->auth->model['bank_ifsc_code']);
		$c1->add('H5')->set('Your Registered Bank Ifsc Code');


		$c2->add('H3')->set($this->api->auth->model['bank_account_number']);
		$c2->add('H5')->set('Your Registered Bank Account Number');



		$c1->add('H3')->set($this->api->auth->model['city']);
		$c1->add('H5')->set('Your Registered City');

		$c2->add('H3')->set($this->api->auth->model['state']);
		$c2->add('H5')->set('Your Registered State');


		$c1->add('H3')->set($this->api->auth->model['mobile_no']);
		$c1->add('H5')->set('Your Registered Mobile Number');


		$c2->add('H3')->set($this->api->auth->model['email_id']);
		$c2->add('H5')->set('Your Registered Email ID');




	}
}