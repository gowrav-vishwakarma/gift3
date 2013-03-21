<?php

class page_reset extends Page {
	function init(){
		paernt::init();
		
	}

	function query($q) {
        $this->api->db->dsql()->expr($q)->execute();
    }
}