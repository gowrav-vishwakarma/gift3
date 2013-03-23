<?php

class page_member extends Page {
	function page_index(){

		$entry=$this->add('Model_Entry');
		$entry->getField('name')->system(true);
		$entry->getField('Priority')->system(true);
		
		$member=$entry->join('member.id','member_id');
		$member->addField('mobile_no');
		$member->addField('bank');
		$member->addField('bank_account_number');
		$member->addField('city');
		$member->addField('state');

		$grid=$this->add('Grid');
		$grid->setModel($entry);
		$grid->addPaginator(5);

		$grid->addColumn('Button','get_request_to_admin');

		if($_GET['get_request_to_admin']){
			$e=$this->add('Model_Entry')->load($_GET['get_request_to_admin']);
			if(($e_ret=$e->getGiftRequestForAdminIDs()) !== true){
				$this->js()->univ()->errorMessage($e_ret)->execute();
			}
			$grid->js(null,$grid->js()->reload())->univ()->successMessage()->execute();
			
		}

	}
}