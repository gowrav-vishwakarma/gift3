<?php

class View_GiftSent extends View {
	function init(){
		parent::init();

	}

	function setModel($model){
		parent::setModel($model);
		$button=$this->add('Button')->setText("Click Here For Details");
		$button->js('click',
				$this->js()->univ()->frameURL("Bank Details",$this->api->url('member_details',array("entry_id"=>$this->model['to_id'],'gift_id'=>$this->model->id)))
			);
	}

	function defaultTemplate(){
		return array('view/giftsent');
	}
}