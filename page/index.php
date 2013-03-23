<?php

class page_index extends Page {
	function init(){
		parent::init();	
		$this->add('View_Info')->setHTML("<h1>Launching Soon...</h1>");		
	}
}