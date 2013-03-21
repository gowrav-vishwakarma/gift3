<?php

class page_member_area_giftReceivedDetails extends Page {
	
	function page_index(){
		$c=$this->add('Columns');
		$c1=$c->addColumn(6);
		$c2=$c->addColumn(6);

		$form=$c1->add('Form');
		$form->add('View_Info')->set('Approve Gift');
		$form->addField('password','password');
		$form->addSubmit('Approve');
		$form2=$c2->add('Form');
		$form2->add('View_Error')->set('Reject Gift');
		$form2->addField('password','password');
		$form2->addSubmit('Reject');
	}
}