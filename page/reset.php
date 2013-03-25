<?php

class page_reset extends Page {
	function init(){
		parent::init();

		
		$submit_url = "http://enterprise.smsgupshup.com/GatewayAPI/rest?method=SendMessage&send_to=9783807100&msg=HIThere&msg_type=TEXT&userid=2000059879&auth_scheme=plain&password=ant55&v=1.1&format=text";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $submit_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		$this->add('Text')->set($result);
	}

	function query($q) {
        $this->api->db->dsql()->expr($q)->execute();
    }
}